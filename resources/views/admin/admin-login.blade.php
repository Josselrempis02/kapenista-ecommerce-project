<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/admin-login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

    <title>Modern Login Page | Admin Panel</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('admin-login') }}">
                @csrf
                <h1>Sign In</h1>
                
                <!-- Error Handling -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="google-login">
                    <a href="/auth/google" class="google-btn">
                        <img src="{{ asset('assets/img/google-icon.png') }}" alt="Google Icon">
                        Login with Google
                    </a>
                </div>
                <span>or use your email password</span>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <div class="forgot-container">
                    <label for="show-password">
                        <input type="checkbox" id="show-password" onclick="togglePassword()"> Show Password
                    </label>
                    <a class="for" href="{{ route('password.request') }}">Forgot password?</a>
                </div>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <img src="{{ asset('assets/img/final-logo.png') }}" alt="">
                    <h1>Welcome to Admin Panel!</h1>
                </div>
            </div>
        </div>
    </div>

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
