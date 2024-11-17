<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController; // Import the AuthController
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
})->name('Home');

Route::get('/login', function () {
    return view('Login');
})->name('login');

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/purchase', function () {
    return view('purchase');
})->name('purchase');

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
// Remove this line:
Route::get('/checkout', [CarController::class, 'showCheckoutPage'])->name('checkoutPage');

// Keep the route pointing to the CarController's checkout method
Route::post('/checkout', [CarController::class, 'checkout'])->name('checkout');

// Route for the payment page (you can change this to your actual checkout route)
Route::get('/payment', function () {
    $selectedCars = session('selectedCars');
    $totalPrice = session('totalPrice');
    return view('carselected', compact('selectedCars', 'totalPrice'));
})->name('paymentPage');


Route::post('/remove-car-from-session', [CarController::class, 'removeCarFromSession'])->name('removeCarFromSession');
//Route::get('/shop', [CarController::class, 'indexShop'])->name('shop');
Route::get('/shop', function () {
    $availablecar = App\Models\Car::all(); // Example: Fetch cars from the database
    return view('shop', compact('availablecar'));
});
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
Route::middleware(['auth'])->get('/shop', [CarController::class, 'indexShop'])->name('shop');

// Route for the login page (authenticated users are redirected to the shop)
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Sign-Up Routes (Only accessible to guests)
Route::get('/signup', [AuthController::class, 'signupPage'])->middleware('guest')->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->middleware('guest');

// If user is unauthenticated, they will be redirected to login page with a message
Route::get('/login', function () {
    return view('Login')->with('alert', 'Please log in or sign up to access the shop.');
})->name('login');
// Admin Cars:
// This will protect the /shop route
Route::middleware(['auth'])->get('/shop', [CarController::class, 'indexShop'])->name('shop');
Route::get('/admin/cars', [CarController::class, 'index'])->name('admin.cars');
Route::post('/admin/cars', [CarController::class, 'store'])->name('admin.addCar');
Route::get('/admin/cars/{id}/edit', [CarController::class, 'edit'])->name('admin.editCar');
Route::put('/admin/cars/{id}', [CarController::class, 'update'])->name('admin.updateCar');
Route::delete('/admin/cars/{id}', [CarController::class, 'destroy'])->name('admin.deleteCar');

// Discount Routes
Route::resource('discounts', DiscountController::class);

// employee Routes
Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');

// User actions (if required for the employee to manage them)
Route::get('/employee/edit-user/{id}', [EmployeeController::class, 'editUser'])->name('employee.editUser');
Route::delete('/employee/delete-user/{id}', [EmployeeController::class, 'deleteUser'])->name('employee.deleteUser');
Route::get('/employee/shop', [ShopController::class, 'shopDashboard'])->name('employee.shop');