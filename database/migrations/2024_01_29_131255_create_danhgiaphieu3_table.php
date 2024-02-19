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

            $table->string('tendanhgia')->default('RÀO CẢN CHUYỂN ĐỔI SỐ TRONG DOANH NGHIỆP NHỎ VÀ VỪA');

            $table->integer('soluonghoanthanh')->default(0);

            $table->integer('diem')->default(0);

            // $table->string('trangthai')->default(0);

            $table->timestamps();
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
