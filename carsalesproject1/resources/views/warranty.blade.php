@extends('Welcome')

@section('Warranty')

<div class="template-static">
    <a href="{{url('home')}}" class="icons">
        <i class="fa fa-home"></i>
        <i class="fa fa-angle-double-right"></i>
    </a>
    <h2>Warranty Information</h2>
    
    <h3>Vehicle Warranty</h3>
    <p>
        The used vehicles in our offer are guaranteed to meet the highest standards, providing peace of mind for our customers.
    </p>
    
    <h4>Contractual Warranty (24 months)</h4>
    <p>
        We offer a contractual warranty on all vehicles, valid for 24 months from the date of delivery. This warranty covers any malfunction or defect in the vehicle, provided that it is within the specified warranty period and mileage. If any defects are identified, the vehicle will be repaired in accordance with the terms outlined in the warranty agreement.
    </p>
    
    <h4>Paint Warranty (36 months)</h4>
    <p>
        The vehicle is covered under a 36-month warranty for any defects related to the paintwork, which might arise from manufacturing issues. The warranty includes complete or partial repainting of the vehicle, depending on the extent of the defect. Any identified defects will be addressed in accordance with the manufacturer's standard warranty conditions.
    </p>
    
    <h4>Anti-Corrosion Protection (8 years)</h4>
    <p>
        All vehicle body parts are covered against rust caused by internal corrosion for up to 8 years from the date of delivery. If any part of the vehicle's body suffers damage due to corrosion, it will be repaired or replaced under the warranty. However, this warranty does not cover defects caused by improper maintenance or damage due to external factors.
    </p>
    
    <h4>Exclusions</h4>
    <p>
        The warranty does not cover any defects or damages resulting from improper use, neglect, or failure to perform regular maintenance as specified by the manufacturer.
    </p>
    
    <p>
        With these extensive warranties, we ensure that your purchase is backed by security and peace of mind. 
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