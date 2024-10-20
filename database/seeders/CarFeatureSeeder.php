<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarFeature;

class CarFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            'Air Conditioning', 'Child Seat', 'GPS',
            'Music Player', 'Seat Belt', 'Bluetooth',
            'Power Steering', 'Car Kit', 'Remote central locking',
            'Navigation System', 'Auxiliary heating', 'Head-up display'
        ];

        foreach ($features as $feature) {
            CarFeature::create(['name' => $feature]);
        }
    }
}
