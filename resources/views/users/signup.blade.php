<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapenista</title>


    <!--  Header icon   -->

   
    <link rel="icon" href="{{ asset('assets/img/final-logo.png') }}"
        type="image/x-icon" />
        
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/signup.css') }}">
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <style>
        .form-container {
            display: flex;
            flex-direction: column;
        }

        .row {
            display: flex;
            flex-direction: row;
            margin-bottom: 1em;
        }

        .column {
            flex: 1;
            margin-right: 1em;
        }

        .column:last-child {
            margin-right: 0;
        }

        input {
            width: 100%;
            padding: 0.5em;
            margin-bottom: 1em;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <!-- Header Section Starts -->
    <header>
        <a href="" class="logo"><img src="assets/img/final-logo.png" alt="logo"></a>

        <ul class="nav-menu">
            <li><a href="/">Home</a></li>
            <li><a href="/">About</a></li>
            <li><a href="/">Menu</a></li>
            <li><a href="/shop">Shop</a></li>
            <li><a href="/">Contact</a></li>
        </ul>

        <div class="nav-icon">
            <a href="/users/myaccount.html"><i class='bx bxs-user'></i></a>
            <a href="cart.html"><i class='bx bxs-cart-alt'></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    <!-- Header Section Ends -->

    <!-- Signup Section Starts -->
    <section class="signup">
    <div class="signup-container">
        <img src="assets/img/about-us.jpg" alt="">

        <div class="signup-form">
            <h1>Create an account</h1>
            

            <!-- Social Sign Up Buttons -->
            <div class="social-signup">
    
    <a class="google-btn" href="{{ route('login.google') }}">
        <img src="assets/img/google-icon.png" alt="Google Icon">
        Sign up with Google
    </a>
</div>


            <!-- OR separator -->
            <div class="separator">
                <hr>
                <span>OR</span>
                <hr>
            </div>

            <!-- Signup Form -->
            
            <form class="signup-form-container" action="/users" method="POST">
                @csrf
                <div class="form-container">
                    <div class="row">
                        <div class="column">
                            <input type="text" id="name" name="name" placeholder="Name" value="{{old('name')}}">

                            @error('name')
                              <p class="error-message">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="column">
                            <input type="email" id="email" name="email" placeholder="Email" value="{{old('email')}}">

                            @error('email')
                              <p class="error-message">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <input type="tel" id="number" name="phone_number" placeholder="Phone number" value="{{old('phone_number')}}">
                        @error('phone_number')
                            <p class="error-message">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" id="address" name="address" placeholder="Address" value="{{old('address')}}">
                        @error('address')
                            <p class="error-message">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="password" id="password" name="password" placeholder="Enter your password">

                        @error('password')
                              <p class="error-message">{{$message}}</p>
                        @enderror

                        
                    <div class="forgot-container-signup">
                         <label for="show-password" class="show-password-label">
                            <input type="checkbox" id="show-password" onclick="togglePassword()"> 
                             Show Password
                         </label>

                         

                   
                    </div>
                    </div>
                </div>
                <button class="signup-btn" type="submit">Create an account</button>
                <p>Already have an account? <a href="/login">Log in</a></p>
            </form>
        </div>
    </div>
</section>

    <!-- Signup Section Ends -->

    <!-- Footer Section Starts -->
    <section class="footer">
        <div class="footer-info">
            <div class="first-info">
                <img src="assets/img/final-logo.png" alt="">
                <p>2023 Kapenista Inc.</p>

                <div class="social-icon">
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-tiktok'></i></a>
                </div>
            </div>
            <div class="second-info">
                <h4>Support</h4>
                <p><a href="index.html">Home</a></p>
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
    <!-- Footer Section Ends -->

    <div class="end-text">
        <p>Copyright © @2023 Kapenista. All Rights Reserved. </p>
    </div>
    <script src="js/script.js"></script>
    <script>
        function togglePassword() {
    var passwordField = document.getElementById("password");
    var showPasswordCheckbox = document.getElementById("show-password");
    if (showPasswordCheckbox.checked) {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}
    </script>
</body>
</html>
