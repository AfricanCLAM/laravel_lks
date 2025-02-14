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

    <!-- Notification -->
    @if(Session::has('success') || session::has('error'))
    <!-- Modal backdrop -->
    <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 lg:w-1/3">
            <!-- Modal header -->
            <div class="flex justify-between items-center mb-4  {{ Session::has('success') ? 'bg-green-600' : 'bg-red-600' }} p-3 rounded-t-lg">
                <h3 class="text-xl font-semibold text-gray-900"> {{ Session::has('success') ? 'Sucess': 'error'}}</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="mb-4 p-6">
                <p class="text-gray-900"> {{ Session::get('success') ?? Session::get('error') }}.</p>
            </div>

            <!-- Modal footer -->
            <div class="flex justify-end m-2">
                <button onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Close
                </button>
            </div>
        </div>
    </div>

    <script>
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('modalBackdrop').classList.add('hidden');
        }

        // Close modal when clicking outside of it
        document.getElementById('modalBackdrop').addEventListener('click', closeModal);
    </script>
    @endif

    <!-- Navigation Bar -->
    <div class="bg-gray-800 text-white">
        <header class="flex justify-between items-center py-4 px-6">
            <a href="/">
                <h1 class="text-center py-6 text-3xl font-semibold text-gray-300">LARAVEL LKS</h1>
            </a>
            <nav class="space-x-6 flex items-center">
                @if (!request()->is('/'))
                <a href="/" class="text-gray-300 hover:text-white transition-colors duration-300 px-4 py-2 rounded-md text-lg">Home</a>
                @endif
                @if (session()->exists('isLoggedIn'))
                @if (!request()->is('dashboard'))
                <a href="/dashboard" class="text-gray-300 hover:text-white transition-colors duration-300 px-4 py-2 rounded-md text-lg">Dashboard</a>
                @endif

                <form action="/logout" method="post" class="m-0">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:text-white transition-colors duration-300 px-4 py-2 rounded-md text-lg">Log Out</button>
                </form>
                @else

                @if (!request()->is('login'))
                <a href="{{ url('/login') }}" class="text-gray-300 hover:text-white transition-colors duration-300 px-4 py-2 rounded-md text-lg">Sign in</a>
                @endif

                @if (!request()->is('register'))
                <a href="/register" class="text-gray-300 hover:text-white transition-colors duration-300 px-4 py-2 rounded-md text-lg">Sign Up</a>
                @endif
                @endif
            </nav>
        </header>
    </div>

    <!-- Main Content with Sidebar -->
    <div class="flex">
        <!-- Sidebar -->
        @if (session()->exists('isLoggedIn'))
        <div class="bg-gray-700 text-white w-64 min-h-screen py-4">
            <div class="px-4 py-2">
                <h2 class="text-2xl font-semibold">Dashboard</h2>
            </div>
            <nav class="mt-6">
                <a href="/dashboard" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">Home</a>
                <a href="/kelas" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">Kelas</a>
                <a href="/jurusan" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">Jurusan</a>
            </nav>
        </div>
        @endif

        <!-- Main Content -->
        <div class="flex-1 container max-w-screen-xl mx-auto px-4 py-6">
            @yield('content')
        </div>
    </div>

    <footer class="bg-gray-800 text-center py-4  text-gray-400">
        <p>&copy; 2025 LARAVEL LKS. All rights reserved.</p>
    </footer>
</body>

</html>