<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Car Sales</title>
  <script type="module" src="{{ asset('main.js') }}" defer></script>
  <script src="https://kit.fontawesome.com/afd19b9f4f.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
</head>

<body>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap');

    /* reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Quicksand', sans-serif;
    }



    /* NAVBAR */

   

    .nav-link a {
      color: white;
      text-decoration: none;
    }

    .nav-link a:hover {
      color: red;
    }

    .nav-link {
      list-style: none;
      margin: 20px 0;
      width: 7rem;
    }

    .nav-links ul {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .navbar {
      background: black;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1;
    }

    .flex-nav {
      display: flex;
      flex-direction: column;
    }

    .nav-header span {
      color: red;
    }

    .nav-header a {
      color: white;
      cursor: pointer;
      text-decoration: none;
    }

    .nav-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .nav-toggle {
      border: transparent;
      background: transparent;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
    }

    .nav-links {
      height: 0;
      overflow: hidden;
    }

    .nav-open {
      height: 40vh;
    }

    /* IMAGE SLIDER */

    

    /* Hide the images by default */
    .mySlides {
      display: none;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      margin-top: -22px;
      padding: 16px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    .slideshow-container__dots {
      text-align: center;
      margin-bottom: 2rem;
    }

    /* Caption text */
    .text {
      color: red;
      -webkit-text-fill-color: white;
      /* Will override color (regardless of order) */
      -webkit-text-stroke-width: 4px;
      -webkit-text-stroke-color: red;
      font-size: 40px;
      padding: 8px 12px;
      position: absolute;
      top: 18px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    

    footer {
      position: sticky;
      top: 100%;
    }

    @media (max-height: 800px) {
      footer {
        position: absolute;
      }
    }

    .footer-distributed {
      background-color: black;
      box-sizing: border-box;
      width: 100%;
      text-align: left;
      font: bold 16px sans-serif;
      padding: 50px 50px 60px 50px;
      margin-top: 80px;
    }

    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right {
      display: inline-block;
      vertical-align: top;
    }

    /* Footer left */

    .footer-distributed .footer-left {
      width: 30%;
    }

    .footer-distributed h3 {
      color: #ffffff;
      font: normal 36px 'Cookie', cursive;
      margin: 0;
    }

    .footer-distributed h3 span {
      color: red;
    }

    /* Footer links */

    .footer-distributed .footer-links {
      color: #ffffff;
      margin: 20px 0 12px;
    }

    .footer-distributed .footer-links a {
      display: inline-block;
      line-height: 1.8;
      text-decoration: none;
      color: inherit;
    }

    .footer-distributed .footer-company-name {
      color: #a3a3a3;
      font-size: 14px;
      font-weight: normal;
      margin: 0;
    }

    /* Footer Center */

    .footer-distributed .footer-center {
      width: 35%;
    }

    .footer-distributed .footer-center i {
      background-color: #33383b;
      color: #ffffff;
      font-size: 25px;
      width: 38px;
      height: 38px;
      border-radius: 50%;
      text-align: center;
      line-height: 42px;
      margin: 10px 15px;
      vertical-align: middle;
    }

    .footer-distributed .footer-center i.fa-envelope {
      font-size: 17px;
      line-height: 38px;
    }

    .footer-distributed .footer-center p {
      display: inline-block;
      color: #ffffff;
      vertical-align: middle;
      margin: 0;
    }

    .footer-distributed .footer-center p span {
      display: block;
      font-weight: normal;
      font-size: 14px;
      line-height: 2;
    }

    .footer-distributed .footer-center p a {
      color: white;
      text-decoration: none;
    }

    .footer-distributed .footer-center p a:hover {
      color: red;
    }

    /* Footer Right */

    .footer-distributed .footer-right {
      width: 30%;
    }

    .footer-distributed .footer-company-about {
      line-height: 20px;
      color: #adadad;
      font-size: 1rem;
      font-weight: normal;
      margin: 0;
    }

    .footer-distributed .footer-company-about span {
      display: block;
      color: #ffffff;
      font-size: 1.1rem;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .footer-distributed .footer-icons {
      margin-top: 25px;
    }

    .footer-distributed .footer-icons a {
      display: inline-block;
      width: 35px;
      height: 35px;
      cursor: pointer;
      background-color: #33383b;
      border-radius: 2px;
      font-size: 20px;
      color: #ffffff;
      text-align: center;
      line-height: 35px;
      margin-right: 3px;
      margin-bottom: 5px;
    }

    .footer-distributed .footer-icons a:hover {
      background-color: red;
    }

    .footer-links a {
      font-size: 1.1rem;
    }

    .footer-links a:hover {
      color: red;
    }

    /* POP UP LOGIN */

    .popup {
      background: rgba(0, 0, 0, 0.6);
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1;
    }

    .popup-content {
      height: 280px;
      width: 500px;
      background: whitesmoke;
      padding: 30px;
      border-radius: 5px;
      position: relative;
      display: flex;
      flex-direction: column;
      text-align: center;
      font-size: 1.2rem;
      font-weight: 700;
    }

    .popup-content input {
      font-size: 1rem;
    }

    .btn-login {
      background: red;
      color: white;
      margin: 0.5rem auto;
      display: block;
      width: 30%;
      padding: 0.5rem;
      border: 1px solid gray;
      border-radius: 5px;
      text-align: center;
      cursor: pointer;
      font-size: 1rem;
    }

    .btn-signup {
      cursor: pointer;
      color: red;
    }

    .popup-content input {
      margin: 10px auto;
      display: block;
      width: 50%;
      padding: 8px;
      border: 1px solid gray;
    }

    #user-icon {
      display: flex;
      justify-content: center;
    }

    #close-icon {
      position: absolute;
      top: 1px;
      right: 5px;
      cursor: pointer;
    }

    #bar-chart {
      margin: 2rem;
      width: 1100px;
    }

    #second-chart {
      margin: 2rem;
    }

    @media (max-height: 800px) {
      footer {
        position: static;
      }
    }

    @media (max-width: 880px) {

      .footer-distributed .footer-left,
      .footer-distributed .footer-center,
      .footer-distributed .footer-right {
        display: block;
        width: 100%;
        margin-bottom: 40px;
        text-align: center;
      }

      .footer-distributed .footer-center i {
        margin-left: 0;
      }

      .location {
        /* align-items: center; */
        justify-content: center;
      }

      .contact {
        margin-top: 2rem;
      }
    }

    @media screen and (min-width: 960px) {
      .nav-toggle {
        display: none;
      }

      .nav-header {
        display: block;
      }

      .flex-nav {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 0 40px;
      }

      .nav-links {
        height: auto;
      }

      .nav-links ul {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        text-align: center;
      }

      .nav-link a {
        font-weight: 700;
        font-size: 1.2rem;
      }

      .nav-link a:hover {
        color: red;
      }

      .nav-link {
        display: inline-block;
        border-bottom: none;
      }
    }
  </style>
  <header>
    <div class="navbar">
      <div class="container flex-nav">
        <div class="nav-header">
          <a href="{{url('home')}}">
            <h2>Car<span>Sales</span></h2>
          </a>
          <button class="nav-toggle" id="navToggle">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <nav class="nav-links" id="nav-links">
          <ul>
            <li class="nav-link"><a href="{{ url('home') }}">Home</a></li>
            <li class="nav-link"><a href="{{ url('aboutus') }}">About Us</a></li>
            <li class="nav-link"><a href="{{ url('warranty') }}">Warranty</a></li>
            <li class="nav-link"><a href="{{ url('contact') }}">Contact</a></li>
            <li class="nav-link"><a href="{{ route('shop') }}">Shop</a></li>

            @if(auth()->check())
            <li class="nav-link">
              <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:blue; cursor:pointer;">Logout</button>
              </form>
            </li>
            @else
            <li class="nav-link"><a href="{{ route('login') }}">Login</a></li>
            <li class="nav-link"><a href="{{ route('signup') }}">Sign Up</a></li>
            @endif
          </ul>
        </nav>
      </div>
    </div>

    <form class="popup">
      @yield('loginpage')

    </form>
  </header>
  <main">
    
  @yield('shopsec')
 
  
  </main>

  <footer class="footer-distributed">
    <div class="footer-left">
      <h3>Car<span>sales</span></h3>

      <p class="footer-links">
        <a href="index.html">Home</a>
        |
        <a href="./onama/onama.html">About Us</a>
        |
        <a href="./garancija/garancija.html">Warranty</a>
        |
        <a href="./kontakt/kontakt.html">Contact</a>
      </p>

      <p class="footer-company-name">
        Copyright © 2021 <strong>Carsales</strong> All rights reserved
      </p>
    </div>

    <div class="footer-center">
      <div>
        <i class="fa fa-map-marker"></i>
        <p><span>Lebanon</span> beirut</p>
      </div>

      <div>
        <i class="fa fa-phone"></i>
        <p>+9610000000</p>
      </div>
      <div>
        <i class="fa fa-envelope"></i>
        <p><a href="#">Carsales@gmail.com</a></p>
      </div>
    </div>
    <div class="footer-right">
      <p class="footer-company-about">
        <span>About Us</span>
        <strong>Carsales</strong> is a trusted partner in the used car sales industry in Serbia, with over a decade of experience, committed to being a SAFE CHOICE for our clients.
      </p>
      <div class="footer-icons">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-youtube"></i></a>
      </div>
    </div>
  </footer>

</body>

</html>