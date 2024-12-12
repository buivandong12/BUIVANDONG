<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class cinemaMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Thêm dữ liệu cho bảng cinemas
        foreach (range(1, 10) as $index) {
            DB::table('cinemas')->insert([
                'name' => 'Cinema ' . $faker->company,
                'location' => $faker->address,
                'total_seats' => $faker->numberBetween(100, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Thêm dữ liệu cho bảng movies
        foreach (range(1, 50) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3),
                'director' => $faker->name,
                'release_date' => $faker->date(),
                'duration' => $faker->numberBetween(60, 180),
                'cinema_id' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
