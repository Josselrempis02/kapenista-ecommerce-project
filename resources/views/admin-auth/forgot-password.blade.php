<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="{{ asset('assets/css/admin-login.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/forgot-password.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reset-password.css') }}">


    <title>Forgot Password</title>
</head>
<body>
<section class="forgot">

<div class="forgot-password-container">
    <h2>Forgot Password</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
    </form>
</div>
</section>
    
</body>
</html>