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
        Schema::table('doanhnghiep', function (Blueprint $table) {

            $table->unsignedBigInteger('nganhnghe_id')->nullable()->index();
            $table->foreign('nganhnghe_id')->references('id')->on('nganhnghe')->onUpdate('cascade')->onDelete('cascade');

            $table->boolean('hoivien')->default(false);
            $table->date('namgianhap')->nullable();
            $table->string('hosonangluc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doanhnghiep', function (Blueprint $table) {
            $table->dropColumn('hoivien');
            $table->dropColumn('namgianhap');
            $table->dropColumn('hosonangluc');
            $table->dropColumn('nganhnghe_id');
        });
    }
};
