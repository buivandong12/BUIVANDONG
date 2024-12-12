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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // tên phim
            $table->string('director'); // đạo diễn
            $table->date('release_date'); // thông số kĩ thaaatj
            $table->integer('duration');//thoi luong phim
            $table->unsignedBigInteger('cinema_id'); // Mã thư viện (foreign key)

            // Định nghĩa khóa ngoại
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
