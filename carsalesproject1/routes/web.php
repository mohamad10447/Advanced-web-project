<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home',function(){
    return view('home');
});

Route::get('/warranty',function(){
    return view('warranty');
});