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
        Schema::create('mohinh_doanhnghiep_trucot', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('mohinh_id')->index();
            $table->foreign('mohinh_id')->references('id')->on('mohinh')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('mohinh_trucot_id')->index();
            $table->foreign('mohinh_trucot_id')->references('id')->on('mohinh_trucot')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('doanhnghiep_loaihinh_id')->index();
            $table->foreign('doanhnghiep_loaihinh_id')->references('id')->on('doanhnghiep_loaihinh')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->engine = 'InnoDB';

        });

        // DB::table('mohinh_doanhnghiep_trucot')->insert([
        //     //Mở rộng mạng lưới kết nối
        //     ['mohinh_id' => 1, 'mohinh_trucot_id' => 1, 'doanhnghiep_loaihinh_id' => 1],
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mohinh_doanhnghiep_trucot');
    }
};
