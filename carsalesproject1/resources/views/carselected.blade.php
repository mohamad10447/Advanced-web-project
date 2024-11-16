<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>Checkout</title>
</head>

<style>
    body {
        min-height: 100vh;
        background-image: url(../images/pozadina1.jpg); /* Replace with your desired background */
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    .checkout-container {
        max-width: 900px;
        margin: 0 auto;
        background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
        padding: 2rem;
        border-radius: 10px;
        margin-top: 2rem;
    }

    .icon-container {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        right: 2vw;
        top: 1vh;
        z-index: 999;
    }

    .fas {
        font-size: 5vw;
        color: #ff6600;
    }

    .cardnumber {
        position: absolute;
        top: -10%;
        right: -10%;
        background-color: red;
        color: white;
        font-size: 2vh;
        width: 2vw;
        height: 2vw;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-body {
        padding: 1rem;
    }

    .card-img-top {
        object-fit: cover;
        height: 200px;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
        color: white;
    }
</style>

<body>

    <!-- Cart icon -->
    <div class="icon-container">
        <i class="fas fa-cart-plus"></i>
        <span class="cardnumber">{{ count($selectedCars) }}</span>
    </div>

    <div class="checkout-container">
        <h1 class="text-center">Checkout</h1>
        
        @if(count($selectedCars) > 0)
            <div class="row">
                @foreach($selectedCars as $car)
                    <div id="car-{{ $car->id }}" class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ $car->image ? $car->image : 'https://via.placeholder.com/300x200?text=No+Image+Available' }}"
                                 class="card-img-top" alt="{{ $car->brand }} - {{ $car->model }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5>
                                <p class="card-text">
                                    <strong>Type:</strong> {{ $car->type }}<br>
                                    <strong>Year:</strong> {{ $car->year }}<br>
                                    <strong>Price:</strong> ${{ number_format($car->price, 2) }}<br>
                                    <strong>Mileage:</strong> {{ $car->mileage }} miles<br>
                                    <strong>Fuel Type:</strong> {{ $car->fuel_type }}<br>
                                    <strong>Transmission:</strong> {{ $car->transmission }}<br>
                                </p>
                                <button class="btn btn-danger delete-car" data-id="{{ $car->id }}">Delete</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <h3 class="text-center mt-4">Total Price: $<span class="total-price">{{ number_format($totalPrice, 2) }}</span></h3>

            <!-- Proceed to Payment -->
            <div class="text-center mt-4">
                <a href="{{ route('purchase') }}" class="btn btn-success">Proceed to Payment</a>
            </div>

        @else
            <p class="text-center">No cars selected. Please select cars to proceed to checkout.</p>
        @endif
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- AJAX and jQuery Script -->
    <script>
        $(document).ready(function() {
            // Handle delete button click
            $(document).on("click", ".delete-car", function(e) {
                e.preventDefault();  // Prevent default action (form submission, etc.)

                var carId = $(this).data("id"); // Get the car ID from data-id attribute

                // Send an AJAX request to remove the car from the session
                $.ajax({
                    url: '{{ route("removeCarFromSession") }}', // Ensure this route is correct
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token
                        carId: carId // Send the car ID
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the car from the page
                            $("#car-" + carId).remove();

                            // Update the total price and the number of items in the cart icon
                            $(".total-price").text(  response.totalPrice);
                            $(".cardnumber").text(response.cartCount); // Update cart count in the icon
                        } else {
                            alert('Error: ' + response.message); // Show error from server
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error:", error); // Log the error message
                        console.log("XHR response:", xhr.responseText); // Log the full error response from the server
                        alert('Error occurred while deleting the car.');
                    }
                });
            });
        });
    </script>

</body>
</html>
