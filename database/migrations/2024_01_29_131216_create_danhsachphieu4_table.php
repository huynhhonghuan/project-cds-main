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
        Schema::create('danhsachphieu4', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khaosat_id')->index();
            $table->foreign('khaosat_id')->references('id')->on('khaosat')->onUpdate('cascade')->onDelete('cascade');
            // $table->integer('diem')->default(0);
            $table->string('tendanhgia')->default('Ý KIẾN CỦA DOANH NGHIỆP VỀ CHUYỂN ĐỔI SỐ')->nullable();
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
        Schema::dropIfExists('danhsachphieu4');
    }
};
