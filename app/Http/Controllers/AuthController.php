<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login_view()
    {
        return view('auth.login');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|string|max:255",
            'email' => "required|string|max:255",
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Redirect to a page with a success message
        session()->flash('success', 'succesfully Signed Up!');
        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => "required|string|max:255",
            'password' => 'required'
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists and password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // if true,add 'HasLoggedIn' session and redirect to '/dashboard'
            $request->session()->put('isLoggedIn', true);
            session([
                'username' => $user->name, 
                'email' => $user->email
            ]);
            session()->flash('success', 'Succesfully Signed In!');
            return redirect('/dashboard');
        }

        // email or password incorrect
        session()->flash('error', 'Email or password is incorrect!');
        return redirect('/login')->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate(); // Clears session
        $request->session()->regenerateToken(); // Prevent CSRF issues

        session()->flash('success', 'Logged out successfully!');
        return redirect('/');
    }
}
