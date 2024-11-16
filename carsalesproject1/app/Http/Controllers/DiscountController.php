<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::with('car')->get();
        return view('discounts.index', compact('discounts'));
    }

    public function create()
    {
        // Fetch all cars from the database
        $cars = Car::all();

        // Return the view with the cars data
        return view('discounts.create', compact('cars'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'code' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
            'starting_time' => 'nullable|date',
            'ending_time' => 'nullable|date',
            'car_id' => 'required|exists:cars,id', // Ensure the car exists
        ]);

        // Create a new discount
        $discount = Discount::create([
            'code' => $request->code,
            'percentage' => $request->percentage,
            'starting_time' => $request->starting_time,
            'ending_time' => $request->ending_time,
            'car_id' => $request->car_id,
        ]);

        // Update the car's price based on the discount
        $car = Car::findOrFail($request->car_id);
        $discountedPrice = $car->price - ($car->price * ($discount->percentage / 100));
        $car->price = $discountedPrice;
        $car->save();

        // Redirect or return response
        return redirect()->route('discounts.index')->with('success', 'Discount created and car price updated!');
    }

    public function edit(Discount $discount)
    {
        $cars = Car::all();
        return view('discounts.edit', compact('discount', 'cars'));
    }

    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'code' => 'required|string|unique:discounts,code,' . $discount->id,
            'percentage' => 'required|numeric|min:0|max:100',
            'starting_time' => 'nullable|date',
            'ending_time' => 'nullable|date|after:starting_time',
            'car_id' => 'required|exists:cars,id',
        ]);

        // Update only the necessary fields
        $discount->code = $request->code;
        $discount->percentage = $request->percentage;
        $discount->starting_time = $request->starting_time;
        $discount->ending_time = $request->ending_time;
        $discount->car_id = $request->car_id;
        $discount->save();

        // Optionally, update the car's price based on the new discount
        $car = Car::findOrFail($request->car_id);
        $discountedPrice = $car->price - ($car->price * ($discount->percentage / 100));
        $car->price = $discountedPrice;
        $car->save();

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
}
