<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Successful</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .heading {
            color: #28a745;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .message {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 30px;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            font-size: 1.1rem;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="heading text-center">Thank you for your purchase!</h1>
        <p class="message text-center">Your order has been successfully placed. We will process it shortly.</p>

        <!-- Button to go to home page -->
        <div class="text-center">
            <a href="{{ route('Home') }}" class="btn btn-custom">Go to Home</a>
        </div>
    </div>

    <!-- Optional: Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
