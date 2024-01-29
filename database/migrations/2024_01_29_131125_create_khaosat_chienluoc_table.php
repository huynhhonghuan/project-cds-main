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
        Schema::create('khaosat_chienluoc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khaosat_id')->index();
            $table->foreign('khaosat_id')->references('id')->on('khaosat')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('mucdo_id')->index();
            $table->foreign('mucdo_id')->references('id')->on('mucdo')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('mohinh_id')->index();
            $table->foreign('mohinh_id')->references('id')->on('mohinh')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khaosat_chienluoc');
    }
};
