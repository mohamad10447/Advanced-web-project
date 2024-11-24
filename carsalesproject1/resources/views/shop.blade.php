<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<title>Car Shop</title>
</head>
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
        $(document).ready(function() {
            let selected = []; // Initialize an array to store selected car IDs
            // Add car to cart when 'Buy Now' button is clicked
            $(document).on("click", ".buynw", function(e) {
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
            $(document).on("click", ".icon-container", function(e) {
                if (selected.length > 0) {
                    // Send the selected car IDs to the backend via AJAX
                    $.ajax({
                        url: '/checkout',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token for security
                            selectedCars: selected // Selected car IDs array
                        },
                        success: function(response) {
                            console.log('Response:', response);
                            if (response.success) {
                                window.location.href = response.redirectUrl; // Redirect to checkout/payment page
                            } else {
                                alert('Something went wrong!');
                            }
                        },
                        error: function(response) {
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
            <select class="option-select" id="marka">
                <option value="sve">All Brands</option>
                <option value="bmw">BMW</option>
                <option value="mercedes">Mercedes Benz</option>
                <option value="audi">Audi</option>
            </select>
            <select class="option-select" id="godiste">
                <option disabled="" selected="">Year Until</option>
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
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
            </select>
        </div>
        <div class="search-container">
            <select class="option-select" id="model">
                <option value="svi" disabled="" selected="">All Models</option>
            </select>
            <select class="option-select" id="karoserija">
                <option selected="">Body Type</option>
                <option value="hecbek">Hatchback</option>
                <option value="limuzina">Sedan</option>
            </select>
            <button class="option-select button" type="reset" id="reset-btn">Reset Search</button>
        </div>
        <div class="search-container">
            <input class="option-select" type="number" placeholder="Price Up To" min="2000" max="15000" id="cena">
            <select class="option-select" id="gorivo">
                <option disabled="" selected="">Fuel</option>
                <option value="dizel">Diesel</option>
                <option value="benzin">Gasoline</option>
            </select>
            <button class="option-select button" type="submit" id="pretrazi">Search</button>
        </div>
    </div>
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
                            @@ -31,9 +240,10 @@ class="card-img-top" alt="{{ $car->brand }} - {{ $car->model }}" style="object-f
                            @if($car->purchase_date_time)
                        <p><strong>Purchased by:</strong> User ID {{ $car->purchased_by_user_id }} on {{ $car->purchase_date_time }}</p>
                        @else
                        <a href="#" class="btn btn-primary w-100 buynw">Buy Now</a>
                        @endif
                    </div>

                </div>
            </div>
            @endforeach