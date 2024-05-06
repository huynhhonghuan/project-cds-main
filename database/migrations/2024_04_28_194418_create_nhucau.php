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
        Schema::create('nhucau', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doanhnghiep_id')->index();
            $table->foreign('doanhnghiep_id')->references('id')->on('doanhnghiep')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nhucau')->nullable();
            $table->string('caithien')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhucau');
    }
};
