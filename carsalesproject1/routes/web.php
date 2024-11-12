<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController; // Import the AuthController
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('Home');
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



Route::get('/shop', [CarController::class, 'indexShop'])->name('shop');

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'index'])->middleware([RoleMiddleware::class . ':admin'])->name('admin.dashboard');
    Route::post('/admin/register-user', [AuthController::class, 'registerUser'])->name('admin.registerUser');
});

// Route to edit a user
Route::get('/admin/edit-user/{id}', [AuthController::class, 'editUser'])->name('admin.editUser');

// Route to update the user after editing
Route::put('/admin/update-user/{id}', [AuthController::class, 'updateUser'])->name('admin.updateUser');

// Route to delete a user
Route::delete('/admin/delete-user/{id}', [AuthController::class, 'deleteUser'])->name('admin.deleteUser');

// Admin Cars:

Route::get('/admin/cars', [CarController::class, 'index'])->name('admin.cars');
Route::post('/admin/cars', [CarController::class, 'store'])->name('admin.addCar');
Route::get('/admin/cars/{id}/edit', [CarController::class, 'edit'])->name('admin.editCar');
Route::put('/admin/cars/{id}', [CarController::class, 'update'])->name('admin.updateCar');
Route::delete('/admin/cars/{id}', [CarController::class, 'destroy'])->name('admin.deleteCar');
