<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Carbon\Carbon; // Date ke liye zaroori hai

class FeedbackController extends Controller
{
    // ================= USER SIDE (Feedback Form) =================
    
    public function index() 
    {
        // Jab user 'Feedbacks' par click karega, use form dikhega
        return view('user.feedback'); 
    }

    public function store(Request $request) 
    {
        $request->validate([
            'user_name' => 'required',
            'message' => 'required'
        ]);

        Feedback::create([
            'user_name' => $request->user_name,
            'message' => $request->message,
            'date' => Carbon::now()->format('Y-m-d')
        ]);

        return redirect()->back()->with('success', 'Thank you! Feedback submitted.');
    }

    // ================= ADMIN SIDE (Feedback List Table) =================

    public function adminIndex() 
    {
        // Admin ke liye table wala view load hoga
        $feedbacks = Feedback::latest()->get(); 
        return view('admin.feedback_list', compact('feedbacks'));
    }
}