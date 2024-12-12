<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class computers_issues extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Thêm dữ liệu cho bảng computers
        foreach (range(1, 10) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->bothify('Lab##-PC##'),
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre M720']),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Ubuntu 20.04', 'MacOS Monterey']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'AMD Ryzen 5 5600G', 'Intel Core i7-10700']),
                'memory' => $faker->randomElement([8, 16, 32]),
                'available' => $faker->boolean(70), // 70% máy sẽ ở trạng thái hoạt động
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Thêm dữ liệu cho bảng issues
        foreach (range(1, 20) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 10), // Khóa ngoại tới bảng computers
                'reported_by' => $faker->name(),
                'reported_date' => $faker->dateTimeBetween('-1 month', 'now'),
                'description' => $faker->sentence(10),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
