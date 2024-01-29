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
        Schema::create('danhgiaphieu1', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('mohinh_trucot_id')->index();
            $table->foreign('mohinh_trucot_id')->references('id')->on('mohinh_trucot')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('danhsachphieu1_id')->index();
            $table->foreign('danhsachphieu1_id')->references('id')->on('danhsachphieu1')->onUpdate('cascade')->onDelete('cascade');

            $table->string('tendanhgia')->default('TỔNG HỢP THÔNG TIN CHỈ SỐ ĐÁNH GIÁ MỨC ĐỘ CHUYỂN ĐỔI SỐ CỦA DOANH NGHIỆP');

            $table->integer('diem')->default(0);

            $table->string('trangthai')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhgiaphieu1');
    }
};
