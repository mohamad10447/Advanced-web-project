<?php

namespace App\Http\Controllers;

use App\Models\Car; // Assuming you have a Car model
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $totalCars = Car::count(); // Fetch the total number of cars
        $cars = Car::all();
        return view('admin.cars', compact('cars', 'totalCars'));
    }
    public function indexShop()
    {
        $cars = Car::all();
        return view('shop', compact('cars'));
    }


    public function store(Request $request)
    {
        // Validate and save the car
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Car::create($request->all());
        return redirect()->route('admin.cars')->with('success', 'Car added successfully.');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.editCar', compact('car'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the car
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $car = Car::findOrFail($id);
        $car->update($request->all());
        return redirect()->route('admin.cars')->with('success', 'Car updated successfully.');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('admin.cars')->with('success', 'Car deleted successfully.');
    }
}
