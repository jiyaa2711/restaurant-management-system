<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Booking;
use App\Models\Order;
class AdminDashboard extends Controller
{
    public function dashboard()
    {
        $data = [
            'users_count'    => User::where('role', 'user')->count(),
            'admin_count'    => User::where('role', 'admin')->count(),
            'feedback_count' => Feedback::count(),
            'category_count' => Category::count(),
            'meals_count'    => Meal::count(),
            'booking_count'  => Booking::count(),
            'order_count'    => Order::count()       ];

        return view('admin.dashboard', $data);
    }

    public function users()
    {
        $users = User::where('role', 'user')->get(); 
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully!');
        }
        return redirect()->back()->with('error', 'User not found!');
    }
    
}