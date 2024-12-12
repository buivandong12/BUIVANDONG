<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_name'); // tên thiết bị
            $table->string('type'); // loại
            $table->boolean('status'); // thông số kĩ thaaatj
          
            $table->unsignedBigInteger('center_id'); // Mã thư viện (foreign key)

            // Định nghĩa khóa ngoại
            $table->foreign('center_id')->references('id')->on('it_centers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_devices');
    }
};
