<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Authentication routes
Route::get('register', [RegisterController::class, 'show'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');
Route::get('login', [LoginController::class, 'show'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('blogs', BlogController::class);
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BlogController;
// use App\Http\Controllers\UserController;

// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\LoginController;

// Route::get('register', [RegisterController::class, 'show'])->name('register');
// Route::post('register', [RegisterController::class, 'register'])->name('register.post');

// Route::get('login', [LoginController::class, 'show'])->name('login');
// Route::post('login', [LoginController::class, 'login'])->name('login.post');
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::get('/users', [UserController::class, 'index'])->name('users.index');
//     Route::resource('blogs', BlogController::class);
// });
// Route::get('dashboard', function () {
//     return view('dashboard');
// })->middleware('auth')->name('dashboard');
// Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');