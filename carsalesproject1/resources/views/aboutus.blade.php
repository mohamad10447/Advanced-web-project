@extends('Welcome')

@section('aboutus')
<div class="template-static">
    <a href="{{url('home')}}" class="icons">
        <i class="fa fa-home"></i>
        <i class="fa fa-angle-double-right"></i>
    </a>
    <h2>Car Sales</h2>
    <p id="main-p">
        Our company, with over a decade of experience in the field of used vehicle sales, has successfully built and maintained a reputation as a reliable partner. We are driven by our core mission to be the <strong>SAFE CHOICE</strong> for our clients.
    </p>
    <br />
    <p>
        Our company is a part of the international Vasilakis Group – Autohellas, which operates in 9 European countries with decades of experience in the automotive industry. This affiliation obligates us to adhere to the strictest EU standards in our operations.
    </p>
    <br />
    <p>
        At any given time, we offer a wide selection of quality used vehicles from various brands. The used vehicles in our offer are exclusively sourced from authorized dealers, all of which were originally purchased as new, come with a well-documented service history, guarantee accurate mileage, and are in excellent condition.
    </p>
    <br />
    <p>
        An additional benefit when purchasing from us is that the sale price includes VAT, meaning there are no additional costs for the transfer of ownership.
    </p>
    <br />
    <p>
        You can visit us at <strong>Beirut, Lebanon</strong>, and with the help of our expert sales representatives, select a vehicle that suits your needs. Our working hours are Monday to Friday from 9 AM to 5 PM, and Saturday from 10 AM to 2 PM.
        <br /><br />
        We are your <strong>SAFE CHOICE</strong>.
    </p>
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