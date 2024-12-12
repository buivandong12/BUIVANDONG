<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class medicines_sales extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Thêm dữ liệu cho bảng medicines
        foreach (range(1, 10) as $index) {
            DB::table('medicines')->insert([
                'name' => $faker->word . ' ' . $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->randomElement(['10mg tablets', '500mg capsules', '100ml syrup']),
                'form' => $faker->randomElement(['Tablet', 'Capsule', 'Syrup']),
                'price' => $faker->randomFloat(2, 1, 100),
                'stock' => $faker->numberBetween(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Thêm dữ liệu cho bảng sales
        foreach (range(1, 20) as $index) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->numberBetween(1, 10), // Tham chiếu đến 1 trong các medicines
                'quantity' => $faker->numberBetween(1, 5),
                'sale_date' => $faker->dateTimeThisYear(),
                'customer_phone' => $faker->optional(0.7)->numerify('09########'), // 70% có số điện thoại
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
