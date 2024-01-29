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
        Schema::create('hiephoidoanhnghiep_daidien', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('hiephoidoanhnghiep_id')->index();
            $table->foreign('hiephoidoanhnghiep_id')->references('id')->on('hiephoidoanhnghiep')->onUpdate('cascade')->onDelete('cascade');

            $table->string('tendaidien');
            $table->string('email')->unique();
            $table->string('sdt')->nullable();
            $table->longText('mota')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hiephoidoanhnghiep_daidien');
    }
};
