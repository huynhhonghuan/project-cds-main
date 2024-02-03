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
        Schema::table('khaosat', function (Blueprint $table) {
            $table->unsignedBigInteger('doanhnghiep_id')->index();
            $table->foreign('doanhnghiep_id')->references('id')->on('doanhnghiep')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khaosat', function (Blueprint $table) {
            $table->dropForeign('khaosat_doanhnghiep_id_foreign');
        });
    }
};
