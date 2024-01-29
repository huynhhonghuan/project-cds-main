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
        Schema::create('traloiphieu3', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('danhgiaphieu3_id')->index();
            $table->foreign('danhgiaphieu3_id')->references('id')->on('danhgiaphieu3')->onUpdate('cascade')->onDelete('cascade');

            //Thêm khoái ngoại câu hỏi sau

            $table->integer('diem')->default(0);
            $table->integer('trangthai')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traloiphieu3');
    }
};
