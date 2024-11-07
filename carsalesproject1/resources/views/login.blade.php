@extends('welcome')

@section('login')
<style>
    <style>
    /* Basic styling for the login page */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-form {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .form-check {
        margin-bottom: 15px;
    }

    .form-check input {
        margin-right: 10px;
    }

    .btn {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .extra-links {
        text-align: center;
        margin-top: 15px;
    }

    .extra-links a {
        color: #007bff;
        text-decoration: none;
    }

    .extra-links a:hover {
        text-decoration: underline;
    }
</style>
</style>
<div class="login-container">
    <div class="login-form">
        <h2>Login</h2>
        <form method="POST" action="">
            @csrf 

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

           

            <button type="submit" class="btn btn-primary">Login</button>

        </form>

        <div class="extra-links">
            <a href="">Forgot Your Password?</a>
            <p>Don't have an account? <a href="">Sign up</a></p>
        </div>
    </div>
</div>
@endsection

