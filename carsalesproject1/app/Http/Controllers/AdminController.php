<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function registeredUsers()
    {
        $users = User::all();
        return view('admin.registeredUsers', compact('users'));
    }

    public function showRegisterUserForm()
    {
        return view('admin.registerUser');
    }

    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:admin,employee',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.registeredUsers')->with('success', 'User registered successfully.');
    }
}
