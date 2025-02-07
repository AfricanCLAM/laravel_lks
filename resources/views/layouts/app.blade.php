<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-900 text-white">
    <!-- Navigation Bar -->
    <div class="bg-gray-900 text-white">
        <header class="flex justify-between items-center py-4 px-6">
            <h1 class="text-center py-6 text-3xl font-semibold text-gray-300">LARAVEL LKS</h1>
            <nav class="space-x-6">
                @if (session()->exists('isLoggedIn'))
                <form action="/logout" method="post">
                    @csrf
                     <button type="submit" class="text-gray-300 hover:text-white transition-colors duration-300 px-4 py-2 rounded-md text-lg">Log Out</button>
                </form>
                @else
                <a href="/login" class="text-gray-300 hover:text-white transition-colors duration-300 px-4 py-2 rounded-md text-lg">Sign in</a>
                <a href="/register" class="text-gray-300 hover:text-white transition-colors duration-300 px-4 py-2 rounded-md text-lg">Sign Up</a>
                @endif
            </nav>
        </header>
    </div>

    <!-- Main Content -->
    <div class="container max-w-screen-xl mx-auto px-4 py-6">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-center py-4 mt-8 text-gray-400">
        <p>&copy; 2025 LARAVEL LKS. All rights reserved.</p>
    </footer>
</body>

</html>