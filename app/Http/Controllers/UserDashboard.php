<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Meal;     
use App\Models\Contact; 
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
    public function dashboard()
    {
        $categories = Category::all(); 
        $famous_meals = Meal::latest()->take(4)->get(); 

        // Cart count check (Optional: for debugging or specific view logic)
        $cartCount = \App\Models\Cart::where('user_id', Auth::id())->sum('quantity');

        return view('user.dashboard', compact('categories', 'famous_meals')); 
    }

    // Cart mein item add karne ka logic (Agar aapne alag se nahi banaya)
    public function addToCart($id)
    {
        $meal = Meal::findOrFail($id);
        $cartKey = 'cart_' . Auth::id();
        $cart = session()->get($cartKey, []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $meal->name,
                "quantity" => 1,
                "price" => $meal->price,
                "image" => $meal->image
            ];
        }

        session()->put($cartKey, $cart);
        return redirect()->back()->with('success', 'Meal added to cart!');
    }

    public function show($id)
    {
        $meal = Meal::findOrFail($id);
        return view('user.meal_details', compact('meal'));
    }

    public function meals(Request $request)
    {
        $categories = Category::all();
        $query = Meal::query();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $meals = $query->get();

        if (!$request->has('search') && !$request->has('category')) {
            $meals = collect(); 
        }

        return view('user.meals', compact('meals', 'categories'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Thank you! Your inquiry has been sent.');
    }

    public function contact()
    {
        return view('user.contact');
    }
    
    public function book_table()
    {
        return view('user.book_table');
    }

    public function myOrders() 
    {
        $orders = \App\Models\Order::where('user_id', \Illuminate\Support\Facades\Auth::id())
                                ->orderBy('created_at', 'desc')
                                ->get();

        return view('user.my_orders', compact('orders'));
    }
}