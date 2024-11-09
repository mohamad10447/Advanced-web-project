<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController; // Import the AuthController

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('Login');
})->name('login');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/warranty', function () {
    return view('warranty');
});

// Sign-Up Routes (Only accessible to guests)
Route::get('/signup', [AuthController::class, 'signupPage'])->middleware('guest')->name('signup'); // Show Sign-Up form
Route::post('/signup', [AuthController::class, 'signup'])->middleware('guest'); // Handle Sign-Up form submission



Route::get('/shop', [CarController::class, 'index'])->name('shop');
