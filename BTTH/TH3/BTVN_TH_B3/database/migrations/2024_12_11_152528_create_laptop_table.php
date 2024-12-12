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
        Schema::create('laptop', function (Blueprint $table) {
            $table->id();
            $table->string('brand'); // hãng
            $table->string('madel'); // mẫu
            $table->string('specifications'); // thông số kĩ thaaatj
            $table->string('rental_status'); // Thể loại
            $table->unsignedBigInteger('renter_id'); // Mã thư viện (foreign key)

            // Định nghĩa khóa ngoại
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptop');
    }
};