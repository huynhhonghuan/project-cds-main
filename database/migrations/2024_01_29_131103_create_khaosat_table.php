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
            $table->integer('tongdiem')->default(0);
            $table->integer('trangthai')->default(0);

            $table->unsignedBigInteger('mucdo_id')->index()->nullable();
            $table->foreign('mucdo_id')->references('id')->on('mucdo')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->engine = 'InnoDB';

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
