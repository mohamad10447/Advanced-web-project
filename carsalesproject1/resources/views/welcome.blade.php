<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Dealership SM</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/afd19b9f4f.js" crossorigin="anonymous"></script>
    <style>
        /* Insert your CSS content here */
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap');
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Quicksand', sans-serif;
        
        }
        body {
          min-height: 100vh;
          background-image: url(../images/pozadina1.jpg);
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;
        }
        main {
          position: relative;
          top: 60px;
        }
        .container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px 40px;
}

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

.slideshow-container {
  width: 100%;
  /* height: 100vh; */
  /* max-width: max-content; */
  top: auto;
  position: relative;
}

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
  -webkit-text-fill-color: white; /* Will override color (regardless of order) */
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

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: black;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active,
.dot:hover {
  background-color: #ffffff;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {
    opacity: 0.4;
  }
  to {
    opacity: 1;
  }
}

@keyframes fade {
  from {
    opacity: 0.4;
  }
  to {
    opacity: 1;
  }
}

/* SEARCH FORM */

.main-container {
  max-width: 900px;
  width: 100%;
  min-height: 200px;
  display: flex;
  flex-wrap: wrap;
  background-color: whitesmoke;
  justify-content: space-evenly;
  margin: 0 auto;
  border-radius: 10px;
  position: relative;
}

.search-container {
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  min-width: 300px;
  padding: 10px;
  align-items: center;
  text-align: center;
}

.option-select {
  margin: 10px auto;
  padding: 10px;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  border-radius: 5px;
  color: black;
  font-weight: 700;
  font-size: 1rem;
}
.option-select option {
  font-weight: 700;
}
.option-select:hover,
.option-select option:hover {
  cursor: pointer;
}

.button {
  background-color: red;
  color: white;
  border: 1px solid red;
}
.button:hover {
  background-color: rgb(255, 112, 112);
  color: black;
}

.wrapper-cars {
  max-width: 1600px;
  width: 100%;
  min-height: 200px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
  margin: 20px auto;
  border-radius: 10px;
  position: relative;
  background-color: whitesmoke;
}

.card {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin: 20px;
  padding: 10px 0;
  width: 200px;
  border-radius: 10px;
  background-color: black;
  border: 2px solid black;
  color: white;
}
.card img {
  border-radius: 10px 10px 0 0;
}

.car-card {
  padding: 2px 16px;
  font-size: 1.2rem;
}

.car-button {
  width: 100%;
  border: 1px solid black;
  border-radius: 10px;
  background-color: red;
  color: white;
  font-size: 15px;
  margin-top: 1rem;
  padding: 0.5rem;
}
.car-button:hover {
  background-color: rgb(255, 112, 112);
  color: black;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type='number'] {
  -moz-appearance: textfield;
}

/* O nama, garancija, kontakt page template */

.template-static {
  display: flex;
  padding: 50px;
  border-radius: 10px;
  flex-wrap: wrap;
  max-width: 1000px;
  margin: 30px auto;
  background-color: white;
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.8);
  font-size: 17px;
}

.template-static #main-p {
  text-indent: 2rem;
}
.template-static i {
  margin-bottom: 20px;
  color: red;
  font-size: 40px;
}
.template-static h2 {
  font-size: 2rem;
  margin-bottom: 10px;
}

.template-static p {
  font-size: 1.1rem;
}
.location {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  margin: 10px;
  text-align: left;
  justify-content: space-between;
}
.map-info {
  flex-direction: column;
  margin-left: 1rem;
}

.map-info h3,
.map-info p {
  padding-bottom: 0.8rem;
}

.map-info iframe {
  max-width: 300px;
  height: 300px;
}
.contact {
  text-align: center;
  width: 400px;
  flex-direction: column;
}
.contact h3 {
  font-size: 1.8rem;
}

.register {
  background: whitesmoke;
  margin: 50px auto 40px auto;
  padding: 50px;
  border-radius: 10px;
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.8);
  max-width: 900px;
}

.form {
  padding: 30px 40px;
  display: flex;
  flex-direction: column;
}

.form-control {
  margin-bottom: 10px;
  padding-bottom: 20px;
  position: relative;
}

.form-control label {
  color: black;
  margin-bottom: 5px;
  display: flex;
  align-items: flex-start;
  font-size: 1.2rem;
  font-weight: 700;
}

.form-control input {
  border: 2px solid #f0f0f0;
  border-radius: 4px;
  width: 100%;
  padding: 10px;
  font-size: 1rem;
  color: black;
}

.form-control input:focus {
  outline: 0;
  border-color: red;
}

.form button {
  cursor: pointer;
  background-color: red;
  border: 2px solid red;
  border-radius: 4px;
  color: white;
  display: block;
  font-size: 16px;
  padding: 0.6rem;
  width: 100%;
}

.form button:hover {
  background-color: rgb(252, 89, 89);
  color: black;
}

.form-control #subject {
  height: 7rem;
  width: 100%;
  font-size: 1rem;
  padding: 0.6rem;
}

.admin-chart {
  display: flex;
  padding: 50px;
  border-radius: 10px;
  flex-wrap: wrap;
  max-width: 1300px;
  margin: 30px auto;
  background-color: white;
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.8);
  font-size: 17px;
  justify-content: center;
  padding: 10px;
}

/* CARS.HTML */
.cars-background {
  display: flex;
  padding: 50px;
  border-radius: 10px;
  flex-wrap: wrap;
  max-width: 1000px;
  margin: 30px auto;
  background-color: white;
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.8);
  font-size: 17px;
  justify-content: space-evenly;
}

.image-cars img {
  max-width: 400px;
  border-radius: 10px;
  border: 1px solid black;
}
.image-cars h2 {
  padding-bottom: 10px;
  text-align: center;
}

.info-cars {
  padding: 10px;
}
.info-cars p {
  background-color: lightgrey;
  margin: 10px;
}

.info-cars h2 {
  margin: 10px;
}

/* FOOTER */

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
}
    </style>
</head>
  <body>
    <header>
      <div class="navbar">
        <div class="container flex-nav">
          <div class="nav-header">
            <a href="index.html">
              <h2>AutoDealership<span>SM</span></h2>
            </a>
            <button class="nav-toggle" id="navToggle">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <nav class="nav-links" id="nav-links">
            <ul>
              <li class="nav-link"><a href="/">Home</a></li>
              <li class="nav-link"><a href="/aboutus">About Us</a></li>
              <li class="nav-link"><a href="">Warranty</a></li>
              <li class="nav-link"><a href="/contact">Contact</a></li>
              <li class="nav-link"><a href="#" id="button">Log In</a></li>
            </ul>
          </nav>
        </div>
      </div>

      <form class="popup">
        <div class="popup-content">
          <i class="fa fa-user fa-3x" id="user-icon" aria-hidden="true"></i>
          <i class="fa fa-times" id="close-icon" aria-hidden="true"></i>
          <input type="text" placeholder="Username" id="username" />
          <input type="password" placeholder="Password" id="password" />
          <p>
            Don’t have an account?
            <a href="registracija.html" class="btn-signup">Register</a>
          </p>
          <button class="btn-login" id="login-button" type="submit">Log In</button>
        </div>
      </form>
    </header>
    <main>
      <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
          <img src="images/slika1.jpg" style="width: 100%; height: auto" />
          <div class="text">We offer car sales services</div>
        </div>

        <div class="mySlides fade">
          <img src="images/slika2.jpg" style="width: 100%; height: auto" />
          <div class="text">You can register your car with us</div>
        </div>

        <div class="mySlides fade">
          <img src="images/slika3.jpg" style="width: 100%" />
          <div class="text">Most affordable car sales</div>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
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
              <select class="option-select" id="brand">
                <option value="all">All Brands</option>
                <option value="bmw">BMW</option>
                <option value="mercedes">Mercedes Benz</option>
                <option value="audi">Audi</option>
              </select>
              <select class="option-select" id="year">
                <option disabled selected>Year up to</option>
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
                <option value="all" disabled selected>All Models</option>
              </select>
              <select class="option-select" id="body">
                <option selected>Body Type</option>
                <option value="hatchback">Hatchback</option>
                <option value="sedan">Sedan</option>
              </select>
              <button class="option-select button" type="reset">Reset Search</button>
            </div>
            <div class="search-container">
                <input class="option-select" type="number" placeholder="Price up to" min="2000" max="15000" id="price">
              <select class="option-select" id="fuel">
                <option disabled selected>Fuel Type</option>
                <option value="diesel">Diesel</option>
                <option value="gasoline">Gasoline</option>
              </select>
              <button class="option-select button" type="submit" id="search">Search</button>
              </select>
            </div>
          </div>
        </form>

        <div class="wrapper-cars" id="wrapper"></div>
      </section>
      
    </main>

    <footer class="footer-distributed">
      <div class="footer-left">
        <h3>AutoDealership<span>SM</span></h3>

        <p class="footer-links">
          <a href="index.html">Home</a> |
          <a href="./onama/onama.html">About Us</a> |
          <a href="./garancija/garancija.html">Warranty</a> |
          <a href="./kontakt/kontakt.html">Contact</a>
        </p>

        <p class="footer-company-name">
          Copyright © 2021 <strong>AutoDealership SM</strong> All rights reserved
        </p>
      </div>

      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Belgrade</span> Serbia</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>+96171188264</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="#">autokucasm@gmail.com</a></p>
        </div>
      </div>
      <div class="footer-right">
        <p class="footer-company-about">
          <span>About Us</span>
          <strong>AutoDealership SM</strong> has built and maintained a reputation as a reliable partner during its decade-long experience in selling used vehicles in Serbia, guided by our core mission to be the TRUSTED CHOICE of our clients.
        </p>
        <div class="footer-icons">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
        </div>
      </div>
     </footer>
      <script src="{{ asset('js/main1.js') }}"></script>   
      <script src="{{ asset('js/cars.js') }}"></script>   
  </body>
</html>