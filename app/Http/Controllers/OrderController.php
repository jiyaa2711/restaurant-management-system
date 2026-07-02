<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller 
{
    // Note: Laravel 12 mein middleware routes/web.php mein handle hote hain.

    public function placeOrder(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->with('meal')->get();

        if($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Aapka cart khali hai!');
        }

        $total = 0;
        foreach($cartItems as $item) { 
            $total += $item->price * $item->quantity; 
        }

        // Database mein entry (Hamesha small 'pending' save hoga)
        $order = Order::create([
            'user_id' => $userId, 
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total_amount' => $total,
            'status' => 'pending' 
        ]);

        foreach($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'meal_name' => $item->meal->name ?? 'Meal Removed',
                'quantity' => $item->quantity,
                'price' => $item->price
            ]);
        }

        Cart::where('user_id', $userId)->delete();
        return redirect()->route('order.thankyou');
    }

    public function myOrders() 
    {
        // Logout ke baad bhi yahan se data aayega
        $orders = Order::where('user_id', Auth::id())
                       ->orderBy('created_at', 'desc')
                       ->get();

        return view('user.my_orders', compact('orders'));
    }

    public function thankYou() {
        return view('user.thank_you'); 
    }
}