<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Middleware\hasLoggedIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('/home');
})->name('home');

// Register route
Route::get('/register', [AuthController::class, 'register_view']);
Route::post('/register', [AuthController::class, 'store']);

// Login Route
Route::get('/login', [AuthController::class, 'login_view'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout Route
Route::post('/logout', [AuthController::class, 'logout']);

// Dashboard
Route::get('/dashboard', function () {
    return view('/guru/dashboard');
})->name('dashboard')->middleware(hasLoggedIn::class);

//Kelas Route
Route::resource('kelas', KelasController::class)
    ->missing(function (Request $request) {
        return Redirect::route('kelas.index');
    })
    ->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);

Route::resource('jurusan', JurusanController::class)
    ->missing(function (Request $request) {
        return Redirect::route('jurusan.index');
    })
    ->except([
        'show'
    ]);
