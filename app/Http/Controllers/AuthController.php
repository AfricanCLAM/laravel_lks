<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name must not exceed 255 characters',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'email.max' => 'The name must not exceed 255 characters',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
        ]);

        // If validation fails, redirect back with errors and old input
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator) // Pass validation errors
                ->withInput(); // Retain old input
        }

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
