<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeatType;

class SeatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating seat types
        $seatTypes = [
            '2 Seater',
            '4 Seater',
            '5 Seater',
            '7 Seater',
            '8 Seater',
            'Van',
        ];

        foreach ($seatTypes as $seatType) {
            SeatType::create([
                'name' => $seatType,
            ]);
        }
    }
}
