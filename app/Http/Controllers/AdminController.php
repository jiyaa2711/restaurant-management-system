<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller 
{
    public function viewOrders() 
    {
        // Saare orders fetch karna items ke saath
        $orders = Order::with('items')->orderBy('created_at', 'desc')->get();
        return view('admin.order', compact('orders'));
    }

    public function updateStatus($id, $status) 
    {
        $order = Order::findOrFail($id);
        // Status ko small letters mein save karein: 'accepted' ya 'rejected'
        $order->status = strtolower($status); 
        $order->save();

        return redirect()->back()->with('success', 'Order status updated to ' . $status);
    }

    /**
     * Naye orders check karne ke liye (AJAX Polling)
     * Yeh function SweetAlert notification trigger karega
     */
    public function checkNewOrders()
    {
        // Check karein ki pichle 12 seconds mein koi naya 'pending' order aaya hai?
        $newOrder = Order::where('status', 'pending')
                         ->where('created_at', '>=', now()->subSeconds(12))
                         ->latest()
                         ->first();

        if ($newOrder) {
            return response()->json([
                'new_order' => true,
                'order_id'  => $newOrder->id,
                'customer'  => $newOrder->name
            ]);
        }

        return response()->json(['new_order' => false]);
    }
}