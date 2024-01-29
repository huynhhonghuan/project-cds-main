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
        Schema::create('khaosat', function (Blueprint $table) {
            $table->id();
            $table->date('thoigiantao');

            //thêm khóa ngoại của 4 danhsachphieu1 - 2 - 3 - 4

            $table->integer('tongdiem')->default(0);
            $table->integer('trangthai')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khaosat');
    }
};
