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
        Schema::create('danhgiaphieu4', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('danhsachphieu4_id')->index();
            $table->foreign('danhsachphieu4_id')->references('id')->on('danhsachphieu4')->onUpdate('cascade')->onDelete('cascade');

            $table->longText('noidungnhucau')->nullable();
            $table->longText('noidungdexuat')->nullable();

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
        Schema::dropIfExists('danhgiaphieu4');
    }
};
