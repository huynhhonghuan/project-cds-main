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
        Schema::create('cauhoiphieu2', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->primary('id');
            $table->longText('tencauhoi');
            $table->unsignedBigInteger('cauhoiphieu2_id')->index()->nullable();
            $table->foreign('cauhoiphieu2_id')->references('id')->on('cauhoiphieu2')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cauhoiphieu2');
    }
};
