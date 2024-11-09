<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>

        <!-- Login content -->
        <div class="col-lg-8 login">
            <!-- Error message for failed login -->
            <p style='color: rgb(255, 7, 7);'>{{ session('errorLogin') }}</p>

            <!-- Title -->
            <h1>Login</h1>

            <!-- Login form -->
            <form action="{{ route('login') }}" method="POST" class="login-form">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
                @error('email')
                <p style='color: red;'>{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                @error('password')
                <p style='color: red;'>{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-primary">Log in</button>

                <p>Don't have an account? <a href="{{ route('signup') }}">Sign Up Now</a></p>
                <p><a href="/forget">Forget password?</a></p>
                <p><a href="auth/google">Login with Google</a></p>
            </form>
            <!-- /form -->
        </div>

        <div class="col-lg-2"></div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->