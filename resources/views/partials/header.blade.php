<?php

use Gloudemans\Shoppingcart\Facades\Cart;

?>
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
    <link rel="stylesheet" href="{{ asset('assets/css/myaccount.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mypurchase.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/change-password.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/user-order-details.css') }}">
    

    <!--  Header icon   -->

   
    <link rel="icon" href="{{ asset('assets/img/final-logo.png') }}"
        type="image/x-icon" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
            <li><a href="/">Home</a></li>
            <li><a href="#about-us">About</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="/shop">Shop</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="nav-icon">
            @auth
             <span class="welcome-message"> Welcome, {{auth()->user()->name}} !</span>
                
             <div class="dropdown">
                    <a href="" class="dropbtn">
                        <i class='bx bxs-user'></i>
                    </a>
                <div class="dropdown-content">
                    <a href="{{ route('user.account', Auth::user()->id) }}">See My Account</a>
                    <form class="form" method="POST" action="/logout">
                        <a href="/logout">Logout</a>
                    </form>
                    
                </div>
            </div>

            <a href="/shop-cart" class="cart-icon">
                <i class='bx bxs-cart-alt'></i>
                <span class="cart-count">{{ Cart::content()->count() }}</span>
            </a>

            <div class="bx bx-menu" id="menu-icon"></div>

            @else


            <a href="/login"><i class='bx bxs-user'></i></a>
            <a href=""><i class='bx bxs-cart-alt'></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>

            @endauth
        </div>
    </header>

    
