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
        //
        Schema::table('doanhnghiep', function (Blueprint $table) {
            // $table->unsignedBigInteger('nganhnghe_id')->nullable()->change();

            $table->string('tentienganh')->nullable()->change();
            $table->integer('soluongnhansu')->nullable()->change();
            $table->date('ngaylap')->nullable()->change();

            $table->string('thanhpho')->nullable()->change();
            $table->string('huyen')->nullable()->change();
            $table->string('xa')->nullable()->change();
        });
        Schema::table('doanhnghiep_daidien', function (Blueprint $table) {
            $table->string('tendaidien')->nullable()->change();

            $table->string('thanhpho')->nullable()->change();
            $table->string('huyen')->nullable()->change();
            $table->string('xa')->nullable()->change();

            $table->string('cccd')->nullable()->change();
            $table->string('img_mattruoc')->nullable()->change();
            $table->string('img_matsau')->nullable()->change();
            $table->string('chucvu')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('doanhnghiep', function (Blueprint $table) {
            $table->string('thanhpho')->nullable(false)->change();
            $table->string('huyen')->nullable(false)->change();
            $table->string('xa')->nullable(false)->change();
        });

        Schema::table('doanhnghiep_daidien', function (Blueprint $table) {
            $table->string('tendaidien')->nullable(false)->change();
            $table->string('thanhpho')->nullable(false)->change();
            $table->string('huyen')->nullable(false)->change();
            $table->string('xa')->nullable(false)->change();

            $table->string('cccd')->nullable(false)->change();
            $table->string('img_mattruoc')->nullable(false)->change();
            $table->string('img_matsau')->nullable(false)->change();
            $table->string('chucvu')->nullable(false)->change();
        });
    }
};
