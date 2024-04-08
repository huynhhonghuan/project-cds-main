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
        Schema::create('baiviet_anh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('baiviet_id')->index();
            $table->foreign('baiviet_id')->references('id')->on('baiviet')->onUpdate('cascade')->onDelete('cascade');
            $table->string('hinhanh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anhbaiviet');
    }
};
