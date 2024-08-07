<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapenista</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive-css.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>


<body>

      <!-- Spinner overlay -->
      <div class="spinner-overlay">
        <div class="spinner"></div>
    </div>
    
    <!-- Header-Section-Starts -->

    <header>
        <a href="" class="logo"><img src="{{ asset('assets/img/final-logo.png') }}"></a>

        <ul class="nav-menu">
            <li><a href="">Home</a></li>
            <li><a href="#about-us">About</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="Shop.html">Shop</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="nav-icon">
            <a href="/login"><i class='bx bxs-user' ></i></a>
            <a href="cart.html"><i class='bx bxs-cart-alt'></i></a>

            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

    </header>
    
    <!-- Header-Section-Ends -->

    <!-- Main-Section-Starts -->

    <section class="main-home">

        

       
        
        <div class="main-text">
            <h5>Kapenista</h5>
            <h1>Coffee and Chill</h1>
            <p>Experience Coffee and Chill Like Never Before</p>

            <a href="" class="main-btn">Shop Now<i class='bx bx-right-arrow-alt' ></i></a>
        </div>

        <div class="down-arrow">
            <a href="#about-us" class="down"><i class='bx bx-down-arrow-alt' ></i></a>
        </div>
    </section>
    <!-- Main-Section-Ends -->


      <!-- About-us-section-starts -->
      <section class="about-us" id="about-us">
        <div  data-aos="fade-up"   class="about-us-text">
            <h2>About Us</h2>
        <center>
            <img width="189" height="24" src="https://corretto.qodeinteractive.com/wp-content/uploads/2018/04/title-separator.png" class="attachment-full size-full" alt="s" decoding="async" loading="lazy">
        </center>
        </div>
        
        <div data-aos="fade-up" class="about-us-1">

            <div class="cart">
                <img src="assets/img/about-us.jpg" alt="">
            </div>

            <div  data-aos="fade-up" class="text">
                <!-- <h5>kapenista</h5>
                <h4>Ab</h4> -->
                <p>"Here at Kapenista, each drink serves as a story to be told. Explore our universe and learn about the soul and heart behind our love of coffee. Every cup memorializes our dedication to quality, from the energizing coolness of our ice pleasures to the comforting warmth of our hot brews and the ease of our coffee to-go. Each blend and roast is painstakingly made in our special Moka pot with love and skill, giving each drop a deep, complex flavor and aroma. Come along on an experience of exploration as we honor the craft and delight of brewing coffee, committed to creating remarkable experiences, one cup at a time.""</p>
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
                <img src="assets/img/menu3.jfif" alt="">
                <div class="product-text">
                    <h5>Cafe Latte</h5>
                </div>

                <div class="price">
                    <p>₱120</p>
                </div>
            </div>

            <div class="row">
                <img width="600" height="839" src="assets/img/menu3.jfif" alt="">
                <div class="product-text">
                    <h5>Cafe Latte</h5>
                </div>

                <div class="price">
                    <p>₱120</p>
                </div>
            </div>

            <div class="row">
                <img src="assets/img/menu3.jfif" alt="">
                <div class="product-text">
                    <h5>Cafe Latte</h5>
                </div>

                <div class="price">
                    <p>₱120</p>
                </div>
            </div>

            
        </div>
        <div class="order-btn">
                      
            <a href="Shop.html" class="order-btn">Order now</a>
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
       
            <iframe data-aos="fade-right" data-aos-delay="500"  class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.4238313302826!2d121.11816437586783!3d14.688607774914379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397bb9db65e6af1%3A0x1cc414e6e2fe69a4!2sKapenista!5e0!3m2!1sen!2sph!4v1708825386001!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        

        <form data-aos="fade-left" data-aos-delay="500" action="">
            <h3>get in touch</h3>
            <div class="inputbox">
                <span class="fas fa-user"></span>
                <input type="text" placeholder="name">
            </div>

            <div class="inputbox">
                <span class="fa-solid fa-envelope"></span>
                <input type="email" placeholder="email">
            </div>

            <div class="inputbox">
                <span class="fa-solid fa-message"></span>
                <input  type="text" placeholder="message">
            </div>
            <div class="order-btn">
                      
                <a href="Shop.html" class="order-btn">Send us message</a>
            </div>
        </form>

    </div>
    </section>

     <!--Contact-section-endss -->
      
     <!--footer-section-starts -->
     <section class="footer">
        <div class="footer-info">
            <div class="first-info">
                <img src="assets/img/final-logo.png" alt="">
                <p>2023 Kapenista Inc.</p>

                <div class="social-icon">
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-instagram' ></i></a>
                    <a href="#"><i class='bx bxl-tiktok' ></i></a>
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
    <!--footer-section-endss -->

    <div class="end-text">
        <p>Copyright © @2023 Kapenista. All Rights Reserved. </p>
    </div>
    <script src="{{ asset('assets/js/script.js') }}"> </script>
    <script src="{{ asset('assets/js/spinner.js') }}"> </script>
    <script>
  AOS.init();
</script>
</body>
</html>