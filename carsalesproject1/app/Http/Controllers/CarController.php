<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CarController extends Controller
{
    public function index(Request $request)
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
        return view('admin.cars', compact('cars', 'totalCars'));
    }
    public function filter(Request $request)
    {
      
    // Retrieve filter data
    $year = $request->input('year');
    $price = $request->input('price');
    $bodytype = $request->input('bodytype');
    $query = Car::query();

    if ($year) {
        $query->where('year', '=', $year);
    }

    if ($price) {
        $query->where('price', '<=', $price);
    }

    if ($bodytype ) {
        $query->where('type', $bodytype);
    }

    $cars = $query->get();

    return response()->json(['cars' => $cars]);

    
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
    public function updatedb(Request $request)
    {
        try {
            // Validate incoming data
            $request->validate([
                'userId' => 'required|exists:users,id', // Ensure the user ID exists in the 'users' table
                'Carids' => 'required|array', // Carids should be an array of car IDs
                'Carids.*' => 'exists:cars,id', // Ensure each car ID exists in the cars table
                'feedback' => 'nullable|string',
                'time' => 'required', // Ensure the time is in the correct format
            ]);

            // Find the user
            $user = User::findOrFail($request->userId);

            // Get the selected cars
            $carIds = $request->input('Carids'); // This should be an array of car IDs
            $cars = Car::whereIn('id', $carIds)->get(); // Fetch all cars that match the selected IDs

            // Log the received time input for debugging
            \Log::info('Time Input:', ['time' => $request->input('time')]);

            // Convert time to a proper format using Carbon (will be stored in 'Y-m-d H:i:s' format for MySQL)
            $formattedTime = Carbon::parse($request->input('time'))->toDateTimeString(); // This ensures the time is in 'Y-m-d H:i:s' format

            // Loop through each car and update the details
            foreach ($cars as $car) {
                $car->update([
                    'purchased_by_user_id' => $user->id,
                    'comment' => $request->input('feedback'),
                    'comment_date_time' => $formattedTime,
                    'purchase_date_time' => $formattedTime,
                ]);
            }

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Car purchase information updated successfully.',
                'redirectUrl' => route('purchase') // Redirect to the purchase page
            ]);
        } catch (\Exception $e) {
            // Log the error for debugging and return failure response
            \Log::error('Error in updating car purchase: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error occurred while processing payment: ' . $e->getMessage(),
            ]);
        }
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
        $user = User::find($userId);
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
    public function removeCarFromSession(Request $request)
{
    $carId = $request->input('carId');
    $selectedCars = session('selectedCars', []);

    // Convert the collection to an array if it is a collection
    if ($selectedCars instanceof \Illuminate\Database\Eloquent\Collection) {
        $selectedCars = $selectedCars->toArray();
    }

    // Remove the car with the matching ID from the array
    $selectedCars = array_filter($selectedCars, function ($car) use ($carId) {
        return $car['id'] != $carId;
    });

    // Re-index the array after filtering
    $selectedCars = array_values($selectedCars);

    // Calculate the new total price
    $totalPrice = array_reduce($selectedCars, function ($sum, $car) {
        return $sum + $car['price']; // Ensure car['price'] is the correct key
    }, 0);

    // Update session with modified cars and total price
    session(['selectedCars' => $selectedCars, 'totalPrice' => $totalPrice]);

    // Return updated cart data
    return response()->json([
        'success' => true,
        'totalPrice' => number_format($totalPrice, 2),
        'cartCount' => count($selectedCars)
    ]);
}

}
