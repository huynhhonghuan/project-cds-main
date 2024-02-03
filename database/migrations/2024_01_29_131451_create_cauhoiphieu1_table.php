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
        Schema::create('cauhoiphieu1', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->primary('id');
            $table->longText('tencauhoi')->nullable();
            $table->longText('noidung')->nullable();
            $table->integer('tieude')->default(0);
            $table->unsignedBigInteger('cauhoiphieu1_id')->index()->nullable();
            $table->foreign('cauhoiphieu1_id')->references('id')->on('cauhoiphieu1')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cauhoiphieu1');
    }
};
