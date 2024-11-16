<?php
namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $totalCars = Car::count();
        $cars = Car::all();
        return view('admin.cars', compact('cars', 'totalCars'));
    }

    public function indexShop()
    {
        $cars = Car::all();
        $availablecar = [];

        foreach ($cars as $car) {
            if (is_null($car->purchased_by_user_id)) {
                $availablecar[] = $car;
            }
        }
        return view('shop', compact('availablecar'));
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('carselected', compact('car'));
    }

    public function showCheckoutPage()
    {
        // Retrieve the selected cars from the session
        $selectedCars = session('selectedCars', []);
        $totalPrice = session('totalPrice', 0);

        // Pass the selected cars to the view
        return view('carselected', compact('selectedCars', 'totalPrice'));
    }

    public function checkout(Request $request)
    {
        // Get the array of selected car IDs from the AJAX request
        $selectedCarIds = $request->input('selectedCars');

        if (empty($selectedCarIds)) {
            return response()->json(['success' => false, 'message' => 'No cars selected']);
        }

        // Fetch the car details from the database based on the selected car IDs
        $cars = Car::whereIn('id', $selectedCarIds)->get();

        // Calculate the total price for the selected cars
        $total = $cars->sum('price');

        // Store the selected cars and total price in the session for later use
        session(['selectedCars' => $cars, 'totalPrice' => $total]);

        // Send a JSON response with the redirect URL
        return response()->json([
            'success' => true,
            'redirectUrl' => route('checkoutPage')  // Redirect to the checkout page
        ]);
    }

    public function removeCarFromSession(Request $request)
    {
        // Get the selected cars from the session
        $selectedCars = session()->get('selectedCars', []);
        $carId = $request->input('carId'); // The car ID to remove

        // Check if the car ID is valid and the session contains the selected cars
        if (!$carId || empty($selectedCars)) {
            return response()->json(['success' => false, 'message' => 'No car found or invalid ID']);
        }

        // Filter out the car with the matching ID
        $updatedCars = $selectedCars->filter(function ($car) use ($carId) {
            return $car->id != $carId;
        });

        // Update the session with the remaining cars
        session()->put('selectedCars', $updatedCars);

        // Recalculate the total price for the remaining cars
        $totalPrice = $updatedCars->sum('price');
        $cartCount = $updatedCars->count();

        // Return success response with updated total price and cart count
        return response()->json([
            'success' => true,
            'totalPrice' => number_format($totalPrice, 2),
            'cartCount' => $cartCount
        ]);
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
    public function storePurchase($userId)
    {
        // Ensure the user is authenticated
        $user = \App\Models\User::find($userId);
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        // Logic to process the purchase
        // Here you can assume you already have a cart or items in session
        $selectedCars = session('selectedCars');
        $totalPrice = session('totalPrice');

        // Create a new purchase record associated with the authenticated user
        $purchase = new Purchase();
        $purchase->user_id = $userId;
        $purchase->total_price = $totalPrice;
        $purchase->save();

        // Assuming you're storing the cars in the purchase
        foreach ($selectedCars as $car) {
            $purchase->cars()->attach($car->id); // If you have a many-to-many relationship with cars
        }

        // Clear the session
        session()->forget('selectedCars');
        session()->forget('totalPrice');

        // Redirect to a confirmation page or success page
        return redirect()->route('purchase.success');
    }

}

