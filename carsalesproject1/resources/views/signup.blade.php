@extends('welcome')

@section('signup')
<div class="container">
    <div class="row justify-content-center">
        <!-- Signup content  -->
        <div class="col-md-6 col-lg-4">

            <!-- Title -->
            <h1 class="text-center mb-4">Sign up</h1>

            <!-- Signup form -->
            <form action="/signup" method="POST" class="signup-form">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
                @error('password_confirmation')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-primary btn-block mt-4">Sign up</button>
            </form>
            <!-- /form -->
        </div>
    </div>
    <!-- /.row -->
</div>
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@endsection
@endsection
