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
            $table->unsignedBigInteger('danhsachphieu1_id')->index();
            $table->foreign('danhsachphieu1_id')->references('id')->on('danhsachphieu1')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('danhsachphieu2_id')->index();
            $table->foreign('danhsachphieu2_id')->references('id')->on('danhsachphieu2')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('danhsachphieu3_id')->index();
            $table->foreign('danhsachphieu3_id')->references('id')->on('danhsachphieu3')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('danhsachphieu4_id')->index();
            $table->foreign('danhsachphieu4_id')->references('id')->on('danhsachphieu4')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khaosat', function (Blueprint $table) {
            $table->dropForeign('khaosat_danhsachphieu1_id_foreign');
            $table->dropForeign('khaosat_danhsachphieu2_id_foreign');
            $table->dropForeign('khaosat_danhsachphieu3_id_foreign');
            $table->dropForeign('khaosat_danhsachphieu4_id_foreign');
        });
    }
};
