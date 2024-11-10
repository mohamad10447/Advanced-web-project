<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users from the database
        $userCount = User::count(); // Get the total number of users
        return view('admin', compact('users', 'userCount')); // Pass users and userCount to the view
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
}
