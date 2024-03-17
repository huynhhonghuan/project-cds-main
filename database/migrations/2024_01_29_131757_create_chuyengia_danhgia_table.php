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
        Schema::create('chuyengia_danhgia', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('chuyengia_id')->index();
            $table->foreign('chuyengia_id')->references('id')->on('chuyengia')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('khaosat_id')->index();
            $table->foreign('khaosat_id')->references('id')->on('khaosat')->onUpdate('cascade')->onDelete('cascade');

            $table->longText('danhgia');
            $table->longText('dexuat')->nullable();

            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuyengia_danhgia');
    }
};
