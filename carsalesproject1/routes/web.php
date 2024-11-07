<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/admin', function () {
    return view('admin');
});

