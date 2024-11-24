<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;



class EmployeeController extends Controller
{
    public function dashboard()
    {
        $users = User::all(); // Fetch all users from the database
        $userCount = User::count(); // Get the total number of users
        $carCount = Car::count(); // Get the total number of cars in inventory

        return view('employee.dashboard', compact('users', 'userCount', 'carCount')); // Pass users, userCount, carCount.
    }
    public function showRegisterUserForm1()
    {
        $users = User::all();
        return view('employee.registeredUsers', compact('users'));
    }
    
    public function index2(Request $request)
    {
        // Retrieve search parameters
        $type = $request->input('type');
        $brand = $request->input('brand');
        $model = $request->input('model');
        $year = $request->input('year');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $mileage = $request->input('mileage');
        $fuelType = $request->input('fuel_type');
        $transmission = $request->input('transmission');

        // Start the query to get all cars
        $query = Car::query();

        // Apply filters based on the search parameters
        if ($type) {
            $query->where('type', 'like', '%' . $type . '%'); // Use 'like' for partial matching
        }

        if ($brand) {
            $query->where('brand', 'like', '%' . $brand . '%'); // Use 'like' for partial matching
        }

        if ($model) {
            $query->where('model', 'like', '%' . $model . '%'); // Use 'like' for partial matching
        }

        if ($year) {
            $query->where('year', $year); // Exact match for year
        }

        if ($minPrice) {
            $query->where('price', '>=', $minPrice); // Minimum price filter
        }

        if ($maxPrice) {
            $query->where('price', '<=', $maxPrice); // Maximum price filter
        }

        if ($mileage) {
            $query->where('mileage', '<=', $mileage); // Maximum mileage filter
        }

        if ($fuelType) {
            $query->where('fuel_type', $fuelType); // Exact match for fuel type
        }

        if ($transmission) {
            $query->where('transmission', $transmission); // Exact match for transmission
        }

        // Get the filtered results
        $cars = $query->get();

        // Count total cars for display
        $totalCars = $cars->count();

        // Return the view with cars and total cars
        return view('employee.cars', compact('cars', 'totalCars'));
    }
    public function store1(Request $request)
    {
        // Validate and save the car
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Car::create($request->all());
        return redirect()->route('employee.cars')->with('success', 'Car added successfully.');
    }

    public function edit1($id)
    {
        $car = Car::findOrFail($id);
        return view('employee.editCar', compact('car'));
    }

    public function update1(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year' => 'required|integer',
        'price' => 'required|numeric',
    ]);

    // Find the car by ID or throw a 404 error
    $car = Car::findOrFail($id);

    // Update the car with the validated data
    $car->update($request->all());

    // Redirect back with a success message
    return redirect()->route('employee.cars')->with('success', 'Car updated successfully.');
}


    public function destroy1($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('employee.cars')->with('success', 'Car deleted successfully.');
    }
}
    
    

