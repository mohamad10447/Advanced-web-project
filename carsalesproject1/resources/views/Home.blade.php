@extends('welcome')
@section('homepage')
<div class="slideshow-container">
  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <img src="images/slika1.jpg" style="width: 100%; height: auto" />
    <div class="text">We provide services for selling your cars</div>
  </div>

  <div class="mySlides fade">
    <img src="images/slika2.jpg" style="width: 100%; height: auto" />
    <div class="text">You can register your car with us</div>
  </div>

  <div class="mySlides fade">
    <img src="images/slika3.jpg" style="width: 100%" />
    <div class="text">The most affordable car sales</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev">&#10094;</a>
  <a class="next">&#10095;</a>

</div>
<br />

<!-- The dots/circles -->
<div class="slideshow-container__dots">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
@endsection

@section('footer')
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
@endsection