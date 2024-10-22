<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapenista</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/signup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/forgot-password.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reset-password.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/forgot-password.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reset-password.css') }}">




    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
    <!-- <div class="spinner-overlay">
        <div class="spinner"></div>
    </div> -->
    <header>
        <a href="#" class="logo"><img src="{{ asset('assets/img/final-logo.png') }}" alt="logo"></a>
        <ul class="nav-menu">
            <li>Reset Password</li>
        </ul>
        
        </div>
    </header>
    
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

    <section class="footer">
    <div class="footer-info">
        <div class="first-info">
            <img src="{{ asset('assets/img/final-logo.png') }}" alt="">
            <p>2023 Kapenista Inc.</p>
            <div class="social-icon">
                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-tiktok'></i></a>
            </div>
        </div>
        <div class="second-info">
            <h4>Support</h4>
            <p><a href="home.html">Home</a></p>
            <p><a href="about.html">About page</a></p>
            <p><a href="menu.html">Menu</a></p>
            <p><a href="shop.html">Shop</a></p>
            <p><a href="privacy.html">Privacy</a></p>
        </div>
        <div class="third-info">
            <h4>Location</h4>
            <p>San Mateo, Rizal</p>
        </div>
        <div class="fourth-info">
            <h4>Follow us</h4>
            <p>Facebook</p>
            <p>Instagram</p>
        </div>
    </div>
</section>
<div class="end-text">
    <p>Copyright © @2023 Kapenista. All Rights Reserved.</p>
</div>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/spinner.js') }}"></script>
<script>
  AOS.init();
</script>
</body>
</html>

