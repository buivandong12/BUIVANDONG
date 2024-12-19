<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersAndIssuesSeeder extends Seeder
{
   
    public function run(): void
    {
        $faker = Faker::create();
        // Thêm dữ liệu cho bảng medicines
        foreach (range(1, 50) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->bothify('Lab##-PC##'),

                'model' => $faker->randomElement(['dell','hp','asus']),
                'operating_system' => $faker->randomElement([
                    'macOS',
                    'Window',
                    'Linux'
                ]),
                'processor' => $faker->randomElement([
                    'i5',
                    'i3',
                    'i7'
                ]),
                'memory' => $faker->randomElement([8, 16, 32]),
                'available' => $faker->boolean(70),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (range(1, 50) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1,10),
                'reporter_by' => $faker->name,
                'reporter_date' => $faker->dateTimeBetween( '-1 month','now'),
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['Low','Medium','High']),
                'status' =>$faker->randomElement(['Open','In Process','Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
