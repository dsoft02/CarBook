<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating an admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@carbook.com',
            'password' => Hash::make('password'),
            'phone' => '1234567890',
            'address' => '123 Admin St, Admin City',
            'profile_picture' => '',
            'role' => 'admin',
            'status' => 1,
        ]);

        // Creating a customer user
        User::create([
            'name' => 'Customer User',
            'email' => 'customer@carbook.com',
            'password' => Hash::make('password'),
            'phone' => '0987654321',
            'address' => '456 Customer Rd, Customer City',
            'profile_picture' => '',
            'role' => 'customer',
            'status' => 1,
        ]);

        // Creating a staff user
        User::create([
            'name' => 'Staff User',
            'email' => 'staff@carbook.com',
            'password' => Hash::make('password'),
            'phone' => '5551234567',
            'address' => '789 Staff Ave, Staff City',
            'profile_picture' => '',
            'role' => 'staff',
            'status' => 1,
        ]);
    }
}
