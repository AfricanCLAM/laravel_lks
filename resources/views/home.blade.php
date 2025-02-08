@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-900 text-white">
    <div class="grid grid-cols-2">
        <div>
            <h1 class="text-center py-6 text-3xl font-bold text-gray-300">LARAVEL LKS</h1>
            <p class="text-2xl font-semibold text-gray-300">Website dummy untuk belajar Laravel sebagai persiapan LKS</p>
        </div>
        <div>
            <img src="assets/hero.png" alt="programmer vector">
        </div>
    </div>
</div>
@endsection