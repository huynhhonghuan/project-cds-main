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
        Schema::create('mohinh', function (Blueprint $table) {
            $table->id();

            //thêm khóa ngoại của bảng mohinh_trucot

            //thêm khóa ngoại của bảng doanhnghiep_loaihinh

            $table->string('tenmohinh');
            $table->longText('noidung');
            $table->string('hinhanh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mohinh');
    }
};
