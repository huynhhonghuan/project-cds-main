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
        Schema::create('doanhnghiep_daidien', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('doanhnghiep_id')->index();
            $table->foreign('doanhnghiep_id')->references('id')->on('doanhnghiep')->onUpdate('cascade')->onDelete('cascade');

            $table->string('tendaidien');
            $table->string('email')->unique();
            $table->string('sdt')->nullable();
            $table->string('diachi')->nullable();
            $table->string('cccd');
            $table->string('img_mattruoc');
            $table->string('img_matsau');
            $table->string('chucvu')->default('Quản lý');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doanhnghiep_daidien');
    }
};
