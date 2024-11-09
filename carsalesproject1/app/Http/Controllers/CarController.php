<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Display all cars in the shop
    public function index()
    {
        $cars = Car::all();  // Fetch all cars from the database
        return view('shop', compact('cars'));
    }
}
