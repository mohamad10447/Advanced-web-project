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

<section>
  <form>
    <div class="main-container">
      <div class="search-container">
        <select class="option-select" id="marka">
          <option value="sve">All Brands</option>
          <option value="bmw">BMW</option>
          <option value="mercedes">Mercedes Benz</option>
          <option value="audi">Audi</option>
        </select>
        <select class="option-select" id="godiste">
          <option disabled selected>Year Until</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
          <option value="2009">2009</option>
          <option value="2008">2008</option>
          <option value="2007">2007</option>
          <option value="2006">2006</option>
        </select>
      </div>
      <div class="search-container">
        <select class="option-select" id="model">
          <option value="svi" disabled selected>All Models</option>
        </select>
        <select class="option-select" id="karoserija">
          <option selected>Body Type</option>
          <option value="hecbek">Hatchback</option>
          <option value="limuzina">Sedan</option>
        </select>
        <button class="option-select button" type="reset" id="reset-btn">Reset Search</button>
      </div>
      <div class="search-container">
        <input class="option-select" type="number" placeholder="Price Up To" min="2000" max="15000" id="cena">
        <select class="option-select" id="gorivo">
          <option disabled selected>Fuel</option>
          <option value="dizel">Diesel</option>
          <option value="benzin">Gasoline</option>
        </select>
        <button class="option-select button" type="submit" id="pretrazi">Search</button>
      </div>
    </div>
  </form>

  <div class="wrapper-cars" id="wrapper"></div>
</section>
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