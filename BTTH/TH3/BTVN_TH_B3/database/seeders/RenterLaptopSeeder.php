<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RenterLaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('renters')->insert([
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Thêm dữ liệu cho bảng laptops
        foreach (range(1, 20) as $index) {
            DB::table('laptop')->insert([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Lenovo', 'Asus', 'Apple']),
                'madel' => $faker->bothify('Model ###??'),
                'specifications' => $faker->randomElement([
                    'i5, 8GB RAM, 256GB SSD',
                    'i7, 16GB RAM, 512GB SSD',
                    'i3, 4GB RAM, 128GB SSD',
                ]),
                'rental_status' => $faker->randomElement(['chưa cho thuê','cho thuê']),
                'renter_id' => $faker->optional(1, null)->numberBetween(1, 10), // Liên kết với renters
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
