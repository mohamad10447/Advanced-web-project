<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
}
