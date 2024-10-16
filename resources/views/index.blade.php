@extends('layouts.app')

@section('content')
    <!-- Main-Section-Starts -->
    <section class="main-home">
        <div class="main-text">
            <h5>KAPENISTA</h5>
            <h1>Coffee and Chill</h1>
            <p>Experience Coffee and Chill Like Never Before</p>
            <a href="/shop" class="main-btn">Shop Now<i class='bx bx-right-arrow-alt'></i></a>
        </div>
        <div class="down-arrow">
            <a href="#about-us" class="down"><i class='bx bx-down-arrow-alt'></i></a>
        </div>
    </section>
    <!-- Main-Section-Ends -->

    <!-- About-us-section-starts -->
    <section class="about-us"  id="about-us">
        <div data-aos="fade-up" class="about-us-text">
            <h2>About Us</h2>
            <center>
                <img width="189" height="24" src="https://corretto.qodeinteractive.com/wp-content/uploads/2018/04/title-separator.png" class="attachment-full size-full" alt="s" decoding="async" loading="lazy">
            </center>
        </div>
        <div data-aos="fade-up" class="about-us-1">
            <div class="cart">
                <img src="{{ asset('assets/img/about-us.jpg') }}" alt="">
            </div>
            <div data-aos="fade-up" class="text">
                <p>"Here at Kapenista, each drink serves as a story to be told. Explore our universe and learn about the soul and heart behind our love of coffee. Every cup memorializes our dedication to quality, from the energizing coolness of our ice pleasures to the comforting warmth of our hot brews and the ease of our coffee to-go. Each blend and roast is painstakingly made in our special Moka pot with love and skill, giving each drop a deep, complex flavor and aroma. Come along on an experience of exploration as we honor the craft and delight of brewing coffee, committed to creating remarkable experiences, one cup at a time."</p>
            </div>
        </div>
    </section>
    <!-- About-us-section-ends -->

    <!--Menu-section-starts -->
    <section data-aos="fade-up" data-aos-delay="500" class="trending-menu" id="menu">
        <div class="center-text">
            <h2>Our Menu</h2>
            <center>
                <img width="189" height="24" src="https://corretto.qodeinteractive.com/wp-content/uploads/2018/04/title-separator.png" class="attachment-full size-full" alt="s" decoding="async" loading="lazy">
            </center>
        </div>
        <div class="menu">
            <div class="row">
                <img src="{{ asset('assets/img/menu3.jfif') }}" alt="">
                <div class="product-text">
                    <h5>Cafe Latte</h5>
                </div>
                <div class="price">
                    <p>₱120</p>
                </div>
            </div>

            <div class="row">
                <img src="{{ asset('assets/img/menu3.jfif') }}" alt="">
                <div class="product-text">
                    <h5>Cafe Latte</h5>
                </div>
                <div class="price">
                    <p>₱120</p>
                </div>
            </div>

            <div class="row">
                <img src="{{ asset('assets/img/menu3.jfif') }}" alt="">
                <div class="product-text">
                    <h5>Cafe Latte</h5>
                </div>
                <div class="price">
                    <p>₱120</p>
                </div>
            </div>
            <!-- Add other menu items similarly -->
        </div>
        <div class="order-btn">
            <a href="/shop" class="order-btn">Order now</a>
        </div>
    </section>
    <!--Menu-section-ends -->

    <!--Contact-section-starts -->
    <section class="contact" id="contact">
        <div class="center-text">
            <h2>Contact Us</h2>
            <center>
                <img width="189" height="24" src="https://corretto.qodeinteractive.com/wp-content/uploads/2018/04/title-separator.png" class="attachment-full size-full" alt="s" decoding="async" loading="lazy">
            </center>
        </div>
        <div class="contact1">
            <iframe data-aos="fade-right" data-aos-delay="500" class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.4238313302826!2d121.11816437586783!3d14.688607774914379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397bb9db65e6af1%3A0x1cc414e6e2fe69a4!2sKapenista!5e0!3m2!1sen!2sph!4v1708825386001!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <form data-aos="fade-left" data-aos-delay="500" action="">
                <h3>Get in touch</h3>
                <div class="inputbox">
                    <span class="fas fa-user"></span>
                    <input type="text" placeholder="Name">
                </div>
                <div class="inputbox">
                    <span class="fa-solid fa-envelope"></span>
                    <input type="email" placeholder="Email">
                </div>
                <div class="inputbox">
                    <span class="fa-solid fa-message"></span>
                    <input type="text" placeholder="Message">
                </div>
                <div class="order-btn">
                    <a href="{{ url('Shop') }}" class="order-btn">Send us message</a>
                </div>
            </form>
        </div>
    </section>
    <!--Contact-section-endss -->
@endsection


