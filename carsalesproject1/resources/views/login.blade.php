@extends('layout')

@section('title', 'Login') <!-- Custom title for the page -->

@section('content')
    <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <img src="{{ asset('images/slika1.jpg') }}" style="width: 100%; height: auto" />
            <div class="text">We offer car sales services</div>
        </div>

        <div class="mySlides fade">
            <img src="{{ asset('images/slika2.jpg') }}" style="width: 100%; height: auto" />
            <div class="text">You can register your car with us</div>
        </div>

        <div class="mySlides fade">
            <img src="{{ asset('images/slika3.jpg') }}" style="width: 100%" />
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
                </div>
            </div>
        </form>

        <div class="wrapper-cars" id="wrapper"></div>
    </section>
@endsection
