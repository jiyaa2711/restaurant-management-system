<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    // 1. Cart Page (Database se data lana)
    public function index()
    {
        // Logged-in user ka cart data fetch karein
        $cartItems = Cart::where('user_id', Auth::id())
                         ->with('meal') // Meal model ke saath relationship honi chahiye
                         ->get();

        return view('user.cart', compact('cartItems'));
    }

    // 2. Add to Cart (Database mein save karna)
    public function addToCart(Request $request, $id)
    {
        // Pehle check karein user login hai ya nahi
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items!');
        }

        $meal = Meal::findOrFail($id);
        $quantity = (int) $request->query('quantity', 1);
        $userId = Auth::id();

        // Check karein ki ye product pehle se cart mein hai ya nahi
        $existingCartItem = Cart::where('user_id', $userId)
                                ->where('meal_id', $id)
                                ->first();

        if ($existingCartItem) {
            // Agar hai, toh sirf quantity update karein
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();
        } else {
            // Agar naya hai, toh database mein entry create karein
            Cart::create([
                'user_id'  => $userId,
                'meal_id'  => $id,
                'quantity' => $quantity,
                'price'    => $meal->price // Optional: Agar table mein price field hai
            ]);
        }

       return redirect()->route('cart')->with('success', 'Meal added to your plate!');
    }

    // 3. Remove from Cart (Database se delete)
    public function remove($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('id', $id)->first();
        
        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->back()->with('success', 'Item removed!');
    }
}