<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerprocess(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.unique'       => 'This email address is already registered with us.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min'       => 'The password must be at least 6 characters long.',
        ]);

        // Manually 'user' role enter ho raha hai
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), 
            'role'     => 'user', 
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginprocess(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Role check logic
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } 
            
            // Agar role 'user' hai (jo aapne manually enter karaya hai)
            if ($user->role === 'user') {
                return redirect()->intended('/user/dashboard');
            }

            // Default fallback agar role match na ho
            return redirect('/');
        }

        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}