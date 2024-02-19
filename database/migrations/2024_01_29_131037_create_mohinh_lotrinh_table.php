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
        Schema::create('mohinh_lotrinh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mohinh_id')->index();
            $table->foreign('mohinh_id')->references('id')->on('mohinh')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tenlotrinh');
            $table->string('thoigian');
            $table->integer('nhansu')->default(0);
            $table->integer('taichinh')->default(0);
            $table->longText('noidung');
            $table->string('luuy')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mohinh_lotrinh');
    }
};
