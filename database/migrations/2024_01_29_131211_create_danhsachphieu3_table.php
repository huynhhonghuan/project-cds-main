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
        Schema::create('danhsachphieu3', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khaosat_id')->index();
            $table->foreign('khaosat_id')->references('id')->on('khaosat')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tendanhgia')->default('RÀO CẢN CHUYỂN ĐỔI SỐ TRONG DOANH NGHIỆP NHỎ VÀ VỪA')->nullable();
            $table->integer('diem')->default(0);
            $table->tinyInteger('soluonghoanthanh')->default(0);
            $table->integer('trangthai')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhsachphieu3');
    }
};
