<?php

namespace App\Http\Controllers;

use App\Models\Car;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users from the database
        $userCount = User::count(); // Get the total number of users
        $carCount = Car::count(); // Get the total number of cars in inventory

        // Get total revenue from all cars that have been sold (i.e., have a non-null purchase_date_time)
        $totalRevenue = Car::whereNotNull('purchase_date_time')->sum('price');

        return view('admin', compact('users', 'userCount', 'carCount', 'totalRevenue')); // Pass users, userCount, carCount, and totalRevenue to the view
    }



    public function editUser($id)
    {
        $user = User::findOrFail($id);  // Get user by ID
        return view('editUser', compact('user'));  // Return to edit user form with user data
    }
    public function updateUser(Request $request, $id)
    {
        // Validate and update the user data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,employee,client',  // Ensure role is valid
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }


    // Show sign up page
    public function signupPage()
    {
        return view('signup');
    }

    // Handle sign up form submission
    public function signup(Request $request)
    {
        // Validate the incoming request
        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'], // Using 'name' instead of 'username'
            'email' => ['required', 'email', 'unique:users,email'], // Ensuring email is unique
            'password' => ['required', 'min:8', 'max:32', 'confirmed'], // Ensure the password is confirmed
        ]);

        // Hash the password for secure storage
        $fields['password'] = bcrypt($fields['password']);

        // Create the user and log them in
        $user = User::create($fields);
        auth()->login($user);

        // Redirect to home page with success message
        return redirect('/')->with('success', 'Account created successfully');
    }
    /////login
    public function loginPage()
    {
        return view('login'); // Ensure the 'login' view exists in your resources/views directory
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', "You just logged out!"); // Corrected the message
    }
    public function login(Request $request)
    {
        // Validate the incoming request
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']])) {
            // Check if the authenticated user has the 'admin' role
            if (auth()->user()->role === 'admin') {
                return redirect('/admin/dashboard')->with('success', "Welcome to the admin dashboard!");
            } else {
                return redirect('/')->with('success', "You have logged in successfully");
            }
        } else {
            // Authentication failed
            return redirect('/login')->with('errorLogin', "You entered wrong info");
        }
    }



    // Register

    public function registerUser(Request $request)
    {
        // Validate the incoming request
        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:32', 'confirmed'],
            'role' => ['required', 'in:admin,employee'], // Validate role
        ]);


        // Hash the password for secure storage
        $fields['password'] = bcrypt($fields['password']);

        // Create the user
        User::create($fields);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User  registered successfully');
    }
    // Reset Password

    public function showForgetPasswordForm()
    {
        return view('auth.forget-password'); // Create a view for the forgot password form
    }


    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Send the password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', 'We have e-mailed your password reset link!')
            : back()->withErrors(['email' => 'The provided email address does not exist.']);
    }
    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', compact('token')); // Create a view for resetting password
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        // Reset the user's password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect('/login')->with('success', 'Your password has been reset!')
            : back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }
}
