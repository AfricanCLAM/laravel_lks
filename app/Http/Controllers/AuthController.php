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

    public function register()
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
        return redirect('/')->with('success', 'successfully registered!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => "required|string|max:255",
            'password' => 'required'
        ]);

        // Attempt to find the user by email
        $user = User::where('email', $request->email)->first();

        // print("user password :". $user->password);
        // print(" inputted password :". bcrypt($request->password));
        // dd();

        // Check if user exists and password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('isLoggedIn', 'true');
            return redirect('/dashboard');
        }

        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate(); // Clears session
        $request->session()->regenerateToken(); // Prevent CSRF issues

        return redirect('/')->with('success', 'Logged out successfully!');
    }
}
