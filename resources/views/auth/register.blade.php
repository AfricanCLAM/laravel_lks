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
                @error('name')
                <span class="text-red-500 text-sm italic block">{{ $message }}</span>
                @enderror
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    class="w-full mt-2 px-4 py-2 bg-gray-700 text-white rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-300">Email</label>
                @error('email')
                <span class="text-red-500 text-sm italic block">{{ $message }}</span>
                @enderror
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    class="w-full mt-2 px-4 py-2 bg-gray-700 text-white rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-6 relative">
                <label for="password" class="block text-sm text-gray-300">Password</label>
                @error('password')
                <span class="text-red-500 text-sm italic block">{{ $message }}</span>
                @enderror
                <input
                    type="password"
                    name="password"
                    id="password"
                    value="{{ old('password') }}"
                    class="w-full mt-2 px-4 py-2 bg-gray-700 text-white rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <span id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer mt-7">
                    <!-- Closed eye icon (when input type is password) -->
                    <svg id="closedEye" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                    </svg>
                    <!-- Open eye icon (when input type is text) -->
                    <svg id="openEye" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hidden" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                        <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.064 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                    </svg>
                </span>
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

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const closedEye = document.getElementById('closedEye');
        const openEye = document.getElementById('openEye');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            closedEye.classList.add('hidden');
            openEye.classList.remove('hidden');
        } else {
            passwordInput.type = 'password';
            openEye.classList.add('hidden');
            closedEye.classList.remove('hidden');
        }
    });
</script>
@endsection