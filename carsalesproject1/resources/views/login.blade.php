<!-- resources/views/employee/login.blade.php -->
@extends('welcome') <!-- Extending the welcome layout -->

@section('login') <!-- Define the 'login' section -->\

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    body {
        background-color: #333333;
        /* Dark background */
        font-family: 'Arial', sans-serif;
    }

    .login {
        background-color: #1a1a1a;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .login h1 {
        color: #f2f2f2;
        /* Light color for title */
        font-size: 2.5rem;
    }

    .form-group label {
        font-weight: bold;
        color: #f8f9fa;
        /* Light labels for contrast */
    }

    .form-control {
        border-radius: 4px;
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        border-color: #dc3545;
        /* Red border on focus */
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        /* Red glow effect */
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .text-danger {
        color: #dc3545;
    }

    .login p a {
        color: #dc3545;
        text-decoration: none;
    }

    .login p a:hover {
        text-decoration: underline;
    }
</style>


<!-- Page Content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10 login">
            <!-- Error message for failed login -->
            @if(session('errorLogin'))
            <p style="color: rgb(255, 7, 7);">{{ session('errorLogin') }}</p>
            @endif

            <!-- Title -->
            <h1 class="text-center text-danger mb-4">Login</h1>

            <!-- Login form -->
            <form action="{{ route('login') }}" method="POST" class="login-form">
                @csrf
                <div class="form-group mb-4">
                    <label for="email" class="text-dark">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}">
                </div>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-group mb-4">
                    <label for="password" class="text-dark">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg">
                </div>
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-lg btn-danger w-100">Log in</button>

                <div class="mt-3 text-center">
                    <p>Don't have an account? <a href="{{ route('signup') }}" class="text-danger">Sign Up Now</a></p>
                    <p><a href="{{ route('forget.password') }}" class="text-danger">Forgot password?</a></p>

                    <p><a href="auth/google" class="text-danger">Login with Google</a></p>
                </div>
            </form>
            <!-- /form -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

@endsection



@section('scripts') <!-- Linking Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@endsection