<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto House SM</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <h2>Auto House<span>SM</span></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/aboutus">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="/">Warranty</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                        <li class="nav-item"><a class="btn btn-primary" id="button">Log In</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Login Popup Form -->
        <div class="modal" tabindex="-1" role="dialog" id="loginModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" id="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" id="password">
                            </div>
                            <p>Don't have an account? <a href="{{ url('/register/register.html') }}">Sign Up</a></p>
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-5">
        <div class="admin-chart text-center">
            <h1>Company Statistics</h1>
            <div class="row">
                <div class="col-md-6">
                    <canvas id="bar-chart" width="400" height="300"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="second-chart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer-distributed bg-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Auto House<span>SM</span></h3>
                    <p>
                        <a href="/">Home</a> |
                        <a href="/aboutus">About Us</a> |
                        <a href="/">Warranty</a> |
                        <a href="/contact">Contact</a>
                    </p>
                    <p>&copy; 2021 Auto House SM. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <p><i class="fa fa-map-marker"></i> shouf, Lebanoin</p>
                    <p><i class="fa fa-phone"></i> +961 71188264</p>
                    <p><i class="fa fa-envelope"></i> <a href="mailto:autohousesm@gmail.com">autohousesm@gmail.com</a></p>
                </div>
                <div class="col-md-4">
                    <p><strong>About Us</strong><br>Auto House SM is a trusted name in the used vehicle market in Serbia.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#button').click(function() {
                $('#loginModal').modal('show');
            });
        });

        var cars = JSON.parse(localStorage.getItem('cars')) || [];
        var data = {};
        var labels = [];
        var values = [];

        cars.forEach(car => {
            data[car.brand] = (data[car.brand] || 0) + 1;
        });
        
        for (const [key, value] of Object.entries(data)) {
            labels.push(key);
            values.push(value);
        }

        new Chart(document.getElementById('bar-chart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of cars in stock',
                    backgroundColor: ['#1e95cd', 'red', 'blue', 'green', 'purple'],
                    data: values,
                }],
            },
            options: {
                legend: { display: false },
                title: { display: true, text: 'Current car stock' },
            },
        });

        var pieChart = document.getElementById('second-chart').getContext('2d');
        new Chart(pieChart, {
            type: 'pie',
            data: {
                labels: ['2020', '2021', 'Jan 2022', 'Feb 2022', 'Mar 2022'],
                datasets: [{
                    label: 'Number of cars sold',
                    data: [30, 25, 4, 7, 2],
                    backgroundColor: ['orange', 'purple', 'pink', 'aqua', 'yellow'],
                }],
            },
            options: {
                title: { display: true, text: 'Number of cars sold' },
            },
        });
    </script>
</body>
</html>
