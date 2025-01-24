<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
</head>
<body>
    <h1>Verify Your Email Address</h1>
    <p>Thank you for registering with {{ $app_name }}!</p>
    <p>Please click the button below to verify your email address:</p>
    <a href="{{ $verificationUrl }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">
        Verify Email Address
    </a>
    <p>If you did not create an account, no further action is required.</p>
</body>
</html>
