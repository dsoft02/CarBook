<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\SeatType;
use App\Models\CarFeature;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all brands and their models
        $brands = Brand::all();

        // Define actual car names for each brand
       $carNames = [
           'Audi' => ['Audi RS Q8', 'Audi A4', 'Audi Q5', 'Audi A6', 'Audi Q7', 'Audi A8'],
           'BMW' => ['Camz Ferrari Portofino', 'CamFord Mustang'],
           'Chevrolet' => ['CamFord Mustang', 'CamFo Explorer', 'Altra Benz C-Class', 'Corvette Z51'],
           'Honda' => ['Shevrolet Corvette Z51','City 1.3 i-VTEC','City 1.4 i-VTEC'],
           'Hyundai' => ['Altra Benz C-Class','Camz Ferrari Portofino'],
           'Toyota' => ['Camry', 'Corolla', 'RAV4', 'Highlander', 'Tacoma', 'Prius'],
       ];

       // Get all car features
        $features = CarFeature::all();

        // Long description using car-related Lorem Ipsum text
        $description = "In the world of automotive innovation, the allure of high-performance vehicles captivates enthusiasts and everyday drivers alike. Whether it’s the roar of an engine or the sleek design that catches the eye, every journey begins with a promise of adventure. Each model represents a culmination of engineering excellence and cutting-edge technology, pushing the boundaries of what is possible on the road. As you slide behind the wheel, the interior envelops you in comfort and style, ensuring every drive is an experience to remember. Explore the unparalleled driving dynamics and discover why this car stands out in the crowded automotive landscape.";

        foreach ($brands as $brand) {
            // Get a random seat type
            $seatType = SeatType::inRandomOrder()->first();

            // Get all car models for this brand
            $carModels = CarModel::where('brand_id', $brand->id)->get();

            if ($carModels->isEmpty()) {
                continue; // Skip this brand if no car models are found
            }

            // Create 6 cars for each brand using defined car names
            foreach ($carNames[$brand->name] as $carName) {
                // Select a random model from the brand's models
                $randomCarModel = $carModels->random();

                // Ensure at least 4 features are assigned
                $assignedFeatures = $features->random(4)->pluck('id')->toArray();

                $car = Car::create([
                    'name' => $carName,
                    'brand_id' => $brand->id,
                    'seat_type_id' => $seatType->id,
                    'car_model_id' => $randomCarModel->id,
                    'year' => rand(2000, 2024),
                    'doors' => rand(2, 5),
                    'color' => $this->randomColor(),
                    'fuel_type' => $this->randomFuelType(),
                    'mileage' => rand(0, 200000),
                    'transmission' => $this->randomTransmission(),
                    'description' => $description,
                    'price' => rand(2000000, 10000000),
                    'images' => null,
                    'is_featured' => rand(0, 1),
                    'status' => 1,
                ]);

                // Attach features to the car
                $car->features()->attach($assignedFeatures);
            }
        }
    }

    private function randomColor()
    {
        $colors = ['Red', 'Blue', 'Green', 'Black', 'White', 'Gray', 'Silver'];
        return $colors[array_rand($colors)];
    }

    private function randomFuelType()
    {
        $fuelTypes = ['Petrol', 'Diesel', 'Electric', 'Hybrid'];
        return $fuelTypes[array_rand($fuelTypes)];
    }

    private function randomTransmission()
    {
        $transmissions = ['Automatic', 'Manual'];
        return $transmissions[array_rand($transmissions)];
    }
}
