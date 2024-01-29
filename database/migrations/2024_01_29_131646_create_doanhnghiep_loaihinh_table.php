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
        Schema::create('doanhnghiep_loaihinh', function (Blueprint $table) {
            $table->id();

            $table->string('linhvuc_id',5)->index();
            $table->foreign('linhvuc_id')->references('id')->on('linhvuc')->onUpdate('cascade')->onDelete('restrict');

            $table->string('tenloaihinh');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doanhnghiep_loaihinh');
    }
};
