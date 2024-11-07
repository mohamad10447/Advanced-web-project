@extends('Welcome')
@section('contact')
<div class="template-static">
        <a href="{{url('home')}}" class="icons">
          <i class="fa fa-home"></i>
          <i class="fa fa-angle-double-right"></i>
        </a>
        <h2>Contact</h2>
        <div class="location">
          <div class="map-info">
            <h3>Cars Sales</h3>
            <p>Lebanon beirut</p>
            <p>Phone: +961 0000000</p>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3825.7102926717074!2d35.5316173178477!3d33.88857347961874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f1fa53f8b34f7%3A0xc2c32b2769a1416f!2sBeirut%2C%20Lebanon!5e0!3m2!1sen!2srs!4v1636408544451!5m2!1sen!2srs"
              loading="lazy"
            ></iframe>
          </div>
          <div class="contact">
            <h3>Contact Us</h3>
            <form id="form" class="form">
              <div class="form-control">
                <label for="username">Full Name</label>
                <input type="text" id="username" placeholder="Full Name" />
              </div>
              <div class="form-control">
                <label for="email">E-mail</label>
                <input type="text" id="email" placeholder="E-mail" />
              </div>
              <div class="form-control">
                <label for="subject">Message</label>
                <textarea
                  id="subject"
                  name="subject"
                  placeholder="Comment..."
                ></textarea>
              </div>

              <button type="submit">Send</button>
            </form>
          </div>
        </div>
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