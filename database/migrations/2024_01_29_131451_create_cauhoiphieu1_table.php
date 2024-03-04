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
            $table->Text('tencauhoi')->nullable();
            $table->longText('noidung')->nullable();
            $table->integer('tieude')->default(0)->nullable();
            $table->integer('traloi')->default(0)->nullable();
            $table->unsignedBigInteger('cauhoiphieu1_id')->index()->nullable();
            $table->foreign('cauhoiphieu1_id')->references('id')->on('cauhoiphieu1')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('mohinh_trucot_id')->index()->nullable();
            $table->foreign('mohinh_trucot_id')->references('id')->on('mohinh_trucot')->onUpdate('cascade')->onDelete('cascade');
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
