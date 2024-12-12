<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class classes_students extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Thêm dữ liệu cho bảng classes
        foreach (range(1, 5) as $index) {
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement(['Pre-K', 'Kindergarten']),
                'room_number' => $faker->bothify('VH#'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Thêm dữ liệu cho bảng students
        foreach (range(1, 20) as $index) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'date_of_birth' => $faker->date(),
                'parent_phone' => $faker->phoneNumber(),
                'class_id' => $faker->numberBetween(1, 5), // Chọn lớp ngẫu nhiên
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
