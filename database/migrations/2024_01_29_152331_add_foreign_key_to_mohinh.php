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
        Schema::table('mohinh', function (Blueprint $table) {

            $table->unsignedBigInteger('mohinh_trucot_id')->index();
            $table->foreign('mohinh_trucot_id')->references('id')->on('mohinh_trucot')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('doanhnghiep_loaihinh_id')->index();
            $table->foreign('doanhnghiep_loaihinh_id')->references('id')->on('doanhnghiep_loaihinh')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mohinh', function (Blueprint $table) {
            $table->dropForeign('mohinh_mohinh_trucot_id_foreign');
            $table->dropForeign('mohinh_doanhnghiep_loaihinh_id_foreign');
        });
    }
};
