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

@section('about-carsale')
<div class="container py-5">
  <h2 class="text-center mb-4">About Carsale Shop</h2>
  <div class="row">
    <div class="col-md-6">
      <p>
        At <strong>Carsales</strong>, we pride ourselves on being a trusted name in the automotive sales industry. 
        For over a decade, we have helped our customers find the perfect vehicle to meet their needs, whether they 
        are looking to buy or sell. 
      </p>
      <p>
        Our team is dedicated to providing exceptional service, ensuring transparency and reliability at every step 
        of the process. With a wide range of vehicles and competitive prices, we aim to make your car buying or 
        selling experience as smooth as possible.
      </p>
      <ul>
        <li>Wide selection of cars to suit every budget and preference</li>
        <li>Comprehensive warranties on all our vehicles</li>
        <li>Friendly and professional staff ready to assist</li>
      </ul>
      <p>
        Visit our showroom or browse our collection online to find your next car today!
      </p>
    </div>
  </div>

  <!-- Best Selling Items Section -->
  <div class="container py-5">
    <h2 class="text-center mb-4">Best Selling Items</h2>
    <div class="horizontal-scroll-container">
    <!-- Car 1 -->
<div class="card shadow-sm">
  <img 
    src="images/audi.png" 
    class="card-img-top" 
    alt="Audi Car" 
    style="object-fit: cover; height: 200px;">
  <div class="card-body">
    <h5 class="card-title">Audi Q5</h5>
    <p class="card-text">
      <strong>Year:</strong> 2021<br>
      <strong>Price:</strong> $48,000
    </p>
    <a href="/shop" class="btn custom-btn w-100">View Details</a>
  </div>
</div>

<!-- Car 2 -->
<div class="card shadow-sm">
  <img 
    src="images/audia3.png" 
    class="card-img-top" 
    alt="Audi A3" 
    style="object-fit: cover; height: 200px;">
  <div class="card-body">
    <h5 class="card-title">Audi A3</h5>
    <p class="card-text">
      <strong>Year:</strong> 2022<br>
      <strong>Price:</strong> $36,000
    </p>
    <a href="/shop" class="btn custom-btn w-100">View Details</a>
  </div>
</div>

<!-- Car 3 -->
<div class="card shadow-sm">
  <img 
    src="images/audia4.png" 
    class="card-img-top" 
    alt="Audi A4" 
    style="object-fit: cover; height: 200px;">
  <div class="card-body">
    <h5 class="card-title">Audi A4</h5>
    <p class="card-text">
      <strong>Year:</strong> 2020<br>
      <strong>Price:</strong> $40,000
    </p>
    <a href="/shop" class="btn custom-btn w-100">View Details</a>
  </div>
</div>

<!-- Car 4 -->
<div class="card shadow-sm">
  <img 
    src="images/audia5.png" 
    class="card-img-top" 
    alt="Audi A5" 
    style="object-fit: cover; height: 200px;">
  <div class="card-body">
    <h5 class="card-title">Audi A5</h5>
    <p class="card-text">
      <strong>Year:</strong> 2020<br>
      <strong>Price:</strong> $42,000
    </p>
    <a href="/shop" class="btn custom-btn w-100">View Details</a>
  </div>
</div>

<!-- Car 5 -->
<div class="card shadow-sm">
  <img 
    src="images/audia6.png" 
    class="card-img-top" 
    alt="Audi A6" 
    style="object-fit: cover; height: 200px;">
  <div class="card-body">
    <h5 class="card-title">Audi A6</h5>
    <p class="card-text">
      <strong>Year:</strong> 2021<br>
      <strong>Price:</strong> $45,000
    </p>
    <a href="/shop" class="btn custom-btn w-100">View Details</a>
  </div>
</div>

<!-- Car 6 -->
<div class="card shadow-sm">
  <img 
    src="images/bmw730.png" 
    class="card-img-top" 
    alt="BMW 730" 
    style="object-fit: cover; height: 200px;">
  <div class="card-body">
    <h5 class="card-title">BMW 7 Series</h5>
    <p class="card-text">
      <strong>Year:</strong> 2022<br>
      <strong>Price:</strong> $85,000
    </p>
    <a href="/shop" class="btn custom-btn w-100">View Details</a>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>

<p id=miki>WAIT US IN EVERYTHING NEW</p>


<style>
  #miki {
  font-size: 24px;                  /* Adjusts the font size */
  font-weight: bold;                /* Makes the text bold */
  color: white;                     /* Text color white */
  background: linear-gradient(45deg, red, black);  /* Red and black gradient background */
  padding: 20px;                    /* Adds padding around the text */
  text-align: center;               /* Centers the text horizontally */
  border-radius: 10px;              /* Optional: Adds rounded corners */
  margin: 0 auto;                   /* Centers the paragraph block horizontally */
  max-width: 80%;                   /* Controls the maximum width to avoid it being too wide */
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  display: flex;                    /* Sets the container as flex */
  justify-content: center;          /* Centers the text horizontally */
  align-items: center;              /* Centers the text vertically */
  height: 150px;                    /* Ensures it takes the full height of the screen */
}


  .horizontal-scroll-container {
    display: flex;
    overflow-x: auto;
    gap: 16px;
    padding-bottom: 10px;
  }

  .horizontal-scroll-container .card {
    min-width: 250px;
    flex-shrink: 0;
  }

  .horizontal-scroll-container::-webkit-scrollbar {
    height: 8px;
  }

  .horizontal-scroll-container::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 4px;
  }

  .horizontal-scroll-container::-webkit-scrollbar-thumb:hover {
    background: #888;
  }
  .custom-btn {
  background-color: black;  /* Red background */
  color: red;           /* White text */
  border: none;           /* No border */
  transition: background-color 0.3s ease;  /* Smooth transition effect */
}

.custom-btn:hover {
  background-color: darkred;  /* Change to black on hover */
  color: black;               /* Change text color to red */
}

</style>


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
