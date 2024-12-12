<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class itCentersHardwareDevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Thêm dữ liệu cho bảng it_centers
        foreach (range(1, 10) as $index) {
            DB::table('it_centers')->insert([
                'name' => $faker->company . ' IT Center',
                'location' => $faker->address,
                'contact_email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Thêm dữ liệu cho bảng hardware_devices
        foreach (range(1, 50) as $index) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word . ' ' . $faker->numerify('###'),
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset', 'Monitor', 'Printer']),
                'status' => $faker->boolean(80), // 80% thiết bị hoạt động, 20% bị hỏng
                'center_id' => $faker->numberBetween(1, 10), // Tham chiếu đến 1 trong các it_centers
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
