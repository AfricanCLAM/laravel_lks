@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-900 text-white">
    <div class="w-96 p-8 bg-gray-800 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-center text-white mb-6">Sign Up</h2>

        <!-- Login Form -->
        <form action="/register" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm text-gray-300">Username</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="w-full mt-2 px-4 py-2 bg-gray-700 text-white rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-300">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="w-full mt-2 px-4 py-2 bg-gray-700 text-white rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm text-gray-300">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full mt-2 px-4 py-2 bg-gray-700 text-white rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                Sign Up
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-400">Already have an account? <a href="/login" class="text-blue-400 hover:text-blue-500">Sign In</a></p>
        </div>
    </div>
</div>
@endsection