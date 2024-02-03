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
        Schema::create('binhluan', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('tintuc_id')->index();
            $table->foreign('tintuc_id')->references('id')->on('tintuc')->onUpdate('cascade')->onDelete('cascade');

            $table->longText('noidung');
            $table->datetime('ngaydang');

            $table->unsignedBigInteger('binhluan_id')->index();
            $table->foreign('binhluan_id')->references('id')->on('binhluan')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binhluan');
    }
};
