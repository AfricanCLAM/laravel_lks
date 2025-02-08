<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\hasLoggedIn;

Route::get('/', function () {
    return view('/home');
})->name('home');

// Register route
Route::get('/register', [AuthController::class, 'register_view']);
Route::post('/register', [AuthController::class, 'store']);

// Login Route
Route::get('/login', [AuthController::class, 'login_view']);
Route::post('/login', [AuthController::class, 'login']);

// Logout Route
Route::post('/logout', [AuthController::class, 'logout']);

// Dashboard
Route::get('/dashboard', function() {
    return view('/dashboard');
})->name('dashboard')->middleware(hasLoggedIn::class);
