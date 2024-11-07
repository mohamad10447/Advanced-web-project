let slideIndex = 1;

function showSlides(n) {
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  const cars = [
    { "car_id": 1, "car_name": "Audi A5", "car_brand": "audi", "car_model": "a5", "car_price": 12000, "car_year": 2012, "car_type": "Limuzina", "car_fuel": "Dizel", "car_image": "images/audia5.png" },
    { "car_id": 2, "car_name": "Audi A3", "car_brand": "audi", "car_model": "a3", "car_price": 8000, "car_year": 2010, "car_type": "Hecbek", "car_fuel": "Benzin", "car_image": "images/audia3.png" },
    { "car_id": 3, "car_name": "Audi A4", "car_brand": "audi", "car_model": "a4", "car_price": 11000, "car_year": 2011, "car_type": "Limuzina", "car_fuel": "Dizel", "car_image": "images/audia4.png" },
    { "car_id": 4, "car_name": "Audi A6", "car_brand": "audi", "car_model": "a6", "car_price": 14000, "car_year": 2014, "car_type": "Limuzina", "car_fuel": "Benzin", "car_image": "images/audia6.png" },
    { "car_id": 5, "car_name": "BMW 125d", "car_brand": "bmw", "car_model": "s1", "car_price": 7000, "car_year": 2007, "car_type": "Hecbek", "car_fuel": "Benzin", "car_image": "images/bmw125.png" },
    { "car_id": 6, "car_name": "BMW 325i", "car_brand": "bmw", "car_model": "s3", "car_price": 5000, "car_year": 2006, "car_type": "Limuzina", "car_fuel": "Benzin", "car_image": "images/bmw325.png" },
    { "car_id": 7, "car_name": "BMW 520d", "car_brand": "bmw", "car_model": "s5", "car_price": 11000, "car_year": 2011, "car_type": "Limuzina", "car_fuel": "Dizel", "car_image": "images/bmw520.png" },
    { "car_id": 8, "car_name": "BMW 730d", "car_brand": "bmw", "car_model": "s7", "car_price": 14000, "car_year": 2012, "car_type": "Limuzina", "car_fuel": "Dizel", "car_image": "images/bmw730.png" },
    { "car_id": 9, "car_name": "Mercedes Benz A180", "car_brand": "mercedes", "car_model": "a180", "car_price": 12000, "car_year": 2007, "car_type": "Hecbek", "car_fuel": "Benzin", "car_image": "images/mercedesa180.png" },
    { "car_id": 10, "car_name": "Mercedes Benz C220", "car_brand": "mercedes", "car_model": "c220", "car_price": 10000, "car_year": 2006, "car_type": "Limuzina", "car_fuel": "Benzin", "car_image": "images/mercedesc220.png" },
    { "car_id": 11, "car_name": "Mercedes Benz E200", "car_brand": "mercedes", "car_model": "e200", "car_price": 12500, "car_year": 2011, "car_type": "Limuzina", "car_fuel": "Dizel", "car_image": "images/mercedese200.png" },
    { "car_id": 12, "car_name": "Mercedes Benz E250", "car_brand": "mercedes", "car_model": "e250", "car_price": 14200, "car_year": 2012, "car_type": "Limuzina", "car_fuel": "Dizel", "car_image": "images/mercedese250.png" }
  ];

  function renderCars() {
    const wrapper = document.getElementById('wrapper');
    wrapper.innerHTML = '';

    cars.forEach(car => {
      const carElement = document.createElement('div');
      carElement.classList.add('card');
      carElement.innerHTML = `
        <img src="${car.car_image}" alt="${car.car_name}" />
        <h3>${car.car_name}</h3>
        <p>Price: €${car.car_price}</p>
        <p>Year: ${car.car_year}</p>
        <p>Fuel: ${car.car_fuel}</p>
        <p>Type: ${car.car_type}</p>
      `;
      wrapper.appendChild(carElement);
    });
  }

  renderCars();
  for (let i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

showSlides(slideIndex);

document.addEventListener('DOMContentLoaded', function() {
  const prevButton = document.querySelector('.prev');
  const nextButton = document.querySelector('.next');

  if (prevButton) {
    prevButton.addEventListener('click', function() {
      plusSlides(-1);
    });
  }

  if (nextButton) {
    nextButton.addEventListener('click', function() {
      plusSlides(1);
    });
  }

  const dots = document.querySelectorAll('.dot');
  dots.forEach((dot, index) => {
    dot.addEventListener('click', function() {
      currentSlide(index + 1);
    });
  });
});

document.getElementById('button').addEventListener('click', function () {
  document.querySelector('.popup').style.display = 'flex';
});

document.getElementById('close-icon').addEventListener('click', function () {
  document.querySelector('.popup').style.display = 'none';
});

function filterCars() {
  const brandSelect = document.getElementById('marka');
  const typeSelect = document.getElementById('karoserija');
  const fuelSelect = document.getElementById('gorivo');
  const minPriceInput = document.getElementById('cena');
  const yearSelect = document.getElementById('godiste');

  const selectedBrand = brandSelect.value;
  const selectedType = typeSelect.value;
  const selectedFuel = fuelSelect.value;
  const minPrice = minPriceInput.value ? parseInt(minPriceInput.value) : 0;
  const selectedYear = yearSelect.value;

  let filteredCars = cars;

  if (selectedBrand !== 'sve') {
    filteredCars = filteredCars.filter(car => car.brand === selectedBrand);
  }
  if (selectedType !== 'svi') {
    filteredCars = filteredCars.filter(car => car.type === selectedType);
  }
  if (selectedFuel !== 'sve') {
    filteredCars = filteredCars.filter(car => car.fuel === selectedFuel);
  }
  if (minPrice) {
    filteredCars = filteredCars.filter(car => car.price <= minPrice);
  }
  if (selectedYear) {
    filteredCars = filteredCars.filter(car => car.year >= selectedYear);
  }

  const wrapper = document.getElementById('wrapper');
  wrapper.innerHTML = '';

  if (filteredCars.length === 0) {
    wrapper.innerHTML = '<p>No cars match your filters</p>';
  } else {
    filteredCars.forEach(car => {
      const carElement = document.createElement('div');
      carElement.classList.add('car');
      carElement.innerHTML = `
        <img src="${car.img}" alt="${car.model}" />
        <h3>${car.model}</h3>
        <p>Price: ${car.price} EUR</p>
        <p>Year: ${car.year}</p>
        <p>Fuel: ${car.fuel}</p>
        <p>Type: ${car.type}</p>
      `;
      wrapper.appendChild(carElement);
    });
  }
}

const filterBtn = document.getElementById('pretrazi');
if (filterBtn) {
    filterBtn.addEventListener('click', (e) => {
        e.preventDefault();
        filterCars();
    });
} else {
    console.error('Filter button not found!');
}

const resetBtn = document.getElementById('reset-btn');
if (resetBtn) {
    resetBtn.addEventListener('click', () => {
        document.getElementById('marka').value = 'sve';
        document.getElementById('godiste').value = '';
        document.getElementById('karoserija').value = 'hecbek';
        document.getElementById('gorivo').value = '';
        document.getElementById('cena').value = '';
        filterCars();
    });
} else {
    console.error('Reset button not found!');
}
