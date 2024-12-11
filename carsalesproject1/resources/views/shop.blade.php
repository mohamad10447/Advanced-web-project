<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Car Shop</title>
</head>
@extends('welcomee')
<style>
    .main-container {
        
        max-width: 900px;
        width: 100%;
        min-height: 200px;
        display: flex;
        flex-wrap: wrap;
        background-color: whitesmoke;
        justify-content: space-evenly;
        margin: 0 auto;
        margin-top:12%;
        border-radius: 10px;
        position: relative;
    }

    .search-container {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        min-width: 300px;
        padding: 10px;
        align-items: center;
        text-align: center;
    }

    .option-select {
        margin: 10px auto;
        padding: 10px;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 5px;
        color: black;
        font-weight: 700;
        font-size: 1rem;
    }

    .option-select option {
        font-weight: 700;
    }

    .option-select:hover,
    .option-select option:hover {
        cursor: pointer;
    }

    body {
        min-height: 100vh;
        background-image: url(../images/pozadina1.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    .button {
        background-color: red;
        color: white;
        border: 1px solid red;
    }

    .button:hover {
        background-color: rgb(255, 112, 112);
        color: black;
    }
</style>

<body>
    <div class="icon-container">
        <i class="fas fa-cart-plus"></i>
        <span class="cardnumber">0</span>
    </div>

    <script>
        $(document).ready(function () {
            let selected = []; 

            $(document).on("click", ".buynw", function (e) {
                e.preventDefault();

                // Get the car ID from the hidden input field
                let carId = $(this).closest('.card').find('input[type="hidden"]').data('id');

                // Only add the car if it's not already in the cart
                if (!selected.includes(carId)) {
                    selected.push(carId);
                }

                // Update the cart icon number (number of selected cars)
                let value = parseInt($(".cardnumber").text(), 10);
                $(".cardnumber").text(value + 1);
            });

            // Redirect to checkout when the cart icon is clicked
            $(document).on("click", ".icon-container", function (e) {
                if (selected.length > 0) {
                    // Send the selected car IDs to the backend via AJAX
                    $.ajax({
                        url: '/checkout',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token for security
                            selectedCars: selected // Selected car IDs array
                        },
                        success: function (response) {
                            console.log('Response:', response);
                            if (response.success) {
                                console.log(response.redirectUrl)
                                window.location.href = response.redirectUrl; // Redirect to checkout/payment page
                            } else {
                                alert('Something went wrong!');
                            }
                        },
                        error: function (response) {
                            console.log('Error:', response);
                            alert('Error in processing the cart!');
                        }
                    });
                } else {
                    alert('Please select at least one car.');
                }
            });
        });
    </script>

    <style>
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
            position: relative;
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
    </style>

    <div class="main-container">

        <div class="search-container">
            <h1>Filter</h1>
         
            <select class="option-select" id="year">
                <option disabled="" value='' selected>Year Until</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
            </select>
            
        </div>
        
        <div class="search-container">
            
        <select class="option-select" id="bodytype">
                <option value="">Type</option>
                <option value="SUV">SUV</option>
                <option value="Truck">Truck</option>
                <option value="Sedan">Sedan</option>
                <option value="Convertible">Convertible</option>
            </select>
            <button class="option-select button" type="reset" id="reset-btn">Reset Search</button>
        </div>
        <div class="search-container">
            <input class="option-select" type="number" placeholder="Price Up To" min="2000" max="15000" id="price">
            <button class="option-select button" type="submit" id="search">Search</button>
        </div>
    </div>
    <script>
   
    // Reset filters
    function resetFilters() {
        $("#marka").prop("selectedIndex", 0); // Reset Brand
        $("#year").prop("selectedIndex", 0); // Reset Year
        $("#model").prop("selectedIndex", 0); // Reset Model
        $("#bodytype").prop("selectedIndex", 0); // Reset Body Type
        $("#gorivo").prop("selectedIndex", 0); // Reset Fuel
        $("#price").val(""); // Reset Price
    }

    $(document).ready(function () {
    // Reset filters on Reset button click
    $("#reset-btn").click(function () {
        resetFilters(); // Call the reset function
    });

    // Search functionality
    $("#search").click(function () {
        console.log($("#year").val() || '' + " " + $("#price").val()+ " "+ $("#bodytype").val());
        $.ajax({
            url: "{{ route('filter') }}", // Adjust this route to your filter endpoint
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                year: $("#year").val() || '',
                price: $("#price").val(),
                bodytype: $("#bodytype").val(),
            },
            success: function (response) {
                console.log(response);
                $(".row").empty();

                if (response.cars && response.cars.length > 0) {
                    console.log(response.cars)
                    response.cars.forEach(function (car) {
                        var carCard = `
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <img src="${car.image || 'https://via.placeholder.com/300x200?text=No+Image+Available'}" 
                                         class="card-img-top" alt="${car.brand} - ${car.model}" style="object-fit: cover; height: 200px;">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate" style="max-width: 250px;">${car.brand} - ${car.model}</h5>
                                        <input type="hidden" data-id="${car.id}" id="id">
                                        <p class="card-text">
                                            <strong>Type:</strong> ${car.type}<br>
                                            <strong>Year:</strong> ${car.year}<br>
                                            <strong>Price:</strong> $${car.price}<br>
                                        </p>
                                        ${car.purchase_date_time ? 
                                            `<p><strong>Purchased on:</strong>${car.purchase_date_time}</p>` 
                                            : 
                                            `<a href="#" class="btn btn-primary w-100 buynw">Buy Now</a>`
                                        }
                                    </div>
                                </div>
                            </div>
                        `;
                        $(".row").append(carCard);
                    });
                } else {
                    let div=`
                    <div class="container py-5">
        <div class="row">
            @foreach($availablecar as $car)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <!-- Placeholder image or a real image when available -->
                    <img src="{{ $car->image ? $car->image : 'https://via.placeholder.com/300x200?text=No+Image+Available' }}"
                        class="card-img-top" alt="{{ $car->brand }} - {{ $car->model }}" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title text-truncate" style="max-width: 250px;">{{ $car->brand }} - {{ $car->model }}</h5>
                        <input type="hidden" data-id="{{$car->id}}" id="id">
                        <p class="card-text">
                            <strong>Type:</strong> {{ $car->type }}<br>
                            <strong>Year:</strong> {{ $car->year }}<br>
                            <strong>Price:</strong> {{$car->price}}<br>

                            @if($car->purchase_date_time)
                        <p><strong>Purchased</strong></p>
                        @else
                        <a href="#" class="btn btn-primary w-100 buynw">Buy Now</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    `
                    $(".row").append(div);
                }
                resetFilters(); 
            },
            error: function (response) {
                console.log("Error:", response);
            }
        });
    });
});


    </script>
    <div class="container py-5">
        <div class="row">
            @foreach($availablecar as $car)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <!-- Placeholder image or a real image when available -->
                    <img src="{{ $car->image ? $car->image : 'https://via.placeholder.com/300x200?text=No+Image+Available' }}"
                        class="card-img-top" alt="{{ $car->brand }} - {{ $car->model }}" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title text-truncate" style="max-width: 250px;">{{ $car->brand }} - {{ $car->model }}</h5>
                        <input type="hidden" data-id="{{$car->id}}" id="id">
                        <p class="card-text">
                            <strong>Type:</strong> {{ $car->type }}<br>
                            <strong>Year:</strong> {{ $car->year }}<br>
                            <strong>Price:</strong> {{$car->price}}<br>

                            @if($car->purchase_date_time)
                        <p><strong>Purchased</strong> </p>
                        @else
                        <a href="#" class="btn btn-primary w-100 buynw">Buy Now</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
