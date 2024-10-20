<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarModel;
use App\Models\Brand;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating models for each brand
        $models = [
            'Audi' => ['A3', 'A4', 'Q5'],
            'BMW' => ['3 Series', '5 Series', 'X3'],
            'Chevrolet' => ['Malibu', 'Impala', 'Equinox'],
            'Honda' => ['Civic', 'Accord', 'CR-V'],
            'Hyundai' => ['Elantra', 'Sonata', 'Tucson'],
            'Toyota' => ['Camry', 'Corolla', 'RAV4'],
        ];

        foreach ($models as $brand => $modelList) {
            foreach ($modelList as $model) {
                CarModel::create([
                    'name' => $model,
                    'brand_id' => Brand::where('name', $brand)->first()->id,
                ]);
            }
        }
    }
}
