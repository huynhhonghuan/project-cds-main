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
        Schema::create('danhgiaphieu3', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('danhsachphieu3_id')->index();
            $table->foreign('danhsachphieu3_id')->references('id')->on('danhsachphieu3')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('diem')->default(0);
            $table->tinyInteger('trangthai')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhgiaphieu3');
    }
};
