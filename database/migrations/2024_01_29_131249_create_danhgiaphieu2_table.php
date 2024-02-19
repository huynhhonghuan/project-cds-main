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
        Schema::create('danhgiaphieu2', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('danhsachphieu2_id')->index();
            $table->foreign('danhsachphieu2_id')->references('id')->on('danhsachphieu2')->onUpdate('cascade')->onDelete('cascade');

            $table->string('tendanhgia')->default('CHUYỂN ĐỔI SỐ CỦA DOANH NGHIỆP NHỎ VÀ VỪA');

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
        Schema::dropIfExists('danhgiaphieu2');
    }
};
