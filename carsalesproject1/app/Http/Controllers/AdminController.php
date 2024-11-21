<?php

namespace App\Http\Controllers;

use App\Models\Car;
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
    public function dashboard()
    {
        // Total registered users
        $userCount = User::count();

        // Total cars sold
        $totalCarsSold = Car::whereNotNull('purchase_date_time')->count();

        // Total revenue generated
        $totalRevenue = Car::whereNotNull('purchase_date_time')->sum('price');

        // Monthly sales trend
        $salesTrends = Car::whereNotNull('purchase_date_time')
            ->selectRaw('MONTH(purchase_date_time) as month, COUNT(*) as cars_sold, SUM(price) as revenue')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Get sold cars with buyer info
        $soldCars = Car::whereNotNull('purchase_date_time')
            ->with('buyer')  // Eager load the buyer relationship
            ->get();

        return view('admin.salesDashboard', compact('userCount', 'totalCarsSold', 'totalRevenue', 'salesTrends', 'soldCars'));
    }
}
