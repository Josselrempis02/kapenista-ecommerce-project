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

    <title>Reset Password</title>
</head>
<body>
    
    <section class="forgot">
        <div class="reset-password-container">
        <h2> Admin Reset Password</h2>
    
        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
    
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $email ?? old('email') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
    
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
    </section>
</body>
</html>

