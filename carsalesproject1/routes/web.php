<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('Home');
})->name('Home');
Route::get('/purchase', function () {
    return view('purchase');
})->name('purchase');
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

Route::post('/removeCarFromSession', [CheckoutController::class, 'removeCarFromSession'])->name('removeCarFromSession');
Route::post('/purchase', [CheckoutController::class, 'updatedb'])->name('purchase');

// Sign-Up Routes (Only accessible to guests)
Route::get('/signup', [AuthController::class, 'signupPage'])->middleware('guest')->name('signup'); // Show Sign-Up form
Route::post('/signup', [AuthController::class, 'signup'])->middleware('guest'); // Handle Sign-Up form submission
// Remove this line:
Route::get('/checkout', [CarController::class, 'showCheckoutPage'])->name('checkoutPage');
Route::post('/purchase', [CarController::class, 'updatedb'])->name('purchase');

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

Route::middleware((['auth', RoleMiddleware::class . ':admin']))->group(function () {
    Route::get('/admin/cars', [CarController::class, 'index'])->name('admin.cars');
    Route::post('/admin/cars', [CarController::class, 'store'])->name('admin.addCar');
    Route::get('/admin/cars/{id}/edit', [CarController::class, 'edit'])->name('admin.editCar');
    Route::put('/admin/cars/{id}', [CarController::class, 'update'])->name('admin.updateCar');
    Route::delete('/admin/cars/{id}', [CarController::class, 'destroy'])->name('admin.deleteCar');

    // Discount Routes
    Route::resource('discounts', DiscountController::class);

    // Users Management Routes
    Route::get('/admin/users', [AdminController::class, 'registeredUsers'])->name('admin.registeredUsers');
    Route::get('/admin/users/register', [AdminController::class, 'showRegisterUserForm'])->name('admin.showRegisterUserForm');
    Route::post('/admin/users/register', [AdminController::class, 'registerUser'])->name('admin.registerUser');
});



// roubeel 
Route::middleware((['auth', RoleMiddleware::class . ':employee']))->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/employee/register-user', [EmployeeController::class, 'showRegisterUserForm1'])->name('employee.registeredUsers');
    Route::get('/employee/cars', [EmployeeController::class, 'index2'])->name('employee.cars');
    Route::post('/employee/cars', [EmployeeController::class, 'store1'])->name('employee.addCar');
    Route::get('/employee/cars/{id}/edit', [EmployeeController::class, 'edit1'])->name('employee.editCar');
    Route::put('/employee/cars/{id}', [EmployeeController::class, 'update1'])->name('employee.updateCar');
    Route::delete('/employee/cars/{id}', [EmployeeController::class, 'destroy1'])->name('employee.deleteCar');
});



// 
Route::get('/admin/sales-dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.salesDashboard')
    ->middleware(['auth', RoleMiddleware::class . ':admin']);


// Reset Password
Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('/forget-password', [AuthController::class, 'sendResetLink'])->name('forget.password.send');

// Manual reset route (this is what you need)
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset.password.update');

// Email

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/send-test-email', function () {
    $name = 'Mohamed Tarhine';  // You can customize the name here
    Mail::to('mohamedtarhine@gmail.com')->send(new TestEmail($name));  // Pass the name as a parameter
    return 'Test email sent!';
});
// Login With GOOGLE

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    // Check if the user already exists in your database
    $user = User::where('email', $googleUser->getEmail())->first();

    if (!$user) {
        // If user doesn't exist, create a new one
        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'google_id' => $googleUser->getId(),
            'role' => 'client', // Default role for new users
            'password' => bcrypt('password'), // Dummy password
        ]);
    }

    // Log the user in
    Auth::login($user);

    // Redirect based on role
    if ($user->role === 'admin') {
        return redirect('/admin/dashboard'); // Admin dashboard
    } elseif ($user->role === 'employee') {
        return redirect('/employee/dashboard'); // Employee dashboard
    } else {
        return redirect('/home'); // Default client dashboard
    }
});
