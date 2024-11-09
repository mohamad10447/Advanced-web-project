<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CarsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) { // Example: 50 cars
            Car::create([
                'brand' => $faker->company,
                'model' => $faker->word,
                'type' => $faker->randomElement(['Sedan', 'SUV', 'Truck', 'Convertible']),
                'price' => $faker->randomFloat(2, 5000, 50000),
                'year' => $faker->year,
                'mileage' => $faker->numberBetween(10000, 200000),
                'fuel_type' => $faker->randomElement(['Petrol', 'Diesel', 'Electric', 'Hybrid']),
                'transmission' => $faker->randomElement(['Automatic', 'Manual']),
                'ssn' => $faker->unique()->numerify('##########'),
                'purchase_date_time' => null,
                'purchased_by_user_id' => null,
                'comment' => $faker->optional()->sentence,
                'comment_date_time' => $faker->optional()->dateTime,
                'image' => $faker->imageUrl(300, 200, 'cars', true), // 300x200 size, category 'cars'
            ]);
        }
    }
}
