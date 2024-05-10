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
        Schema::create('doanhnghiep_daidien', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('doanhnghiep_id')->index();
            $table->foreign('doanhnghiep_id')->references('id')->on('doanhnghiep')->onUpdate('cascade')->onDelete('cascade');

            $table->string('tendaidien');
            $table->string('email')->unique()->nullable();
            $table->string('sdt')->nullable();
            $table->string('thanhpho');
            $table->string('huyen');
            $table->string('xa');
            $table->string('diachi')->nullable();
            $table->string('cccd')->nullable();
            $table->string('img_mattruoc')->nullable();
            $table->string('img_matsau')->nullable();
            $table->string('chucvu')->default('Quản lý')->nullable();
            $table->longText('mota')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        // DB::table('doanhnghiep_daidien')->insert([
        //     [
        //         'doanhnghiep_id' => 1,
        //         'tendaidien' => 'Đại diện doanh nghiệp',
        //         'email' => 'doanhghiepdaidien1@gmail.com',
        //         'sdt' => '0124536987',
        //         'thanhpho' => '01',
        //         'huyen' => '001',
        //         'xa' => '00001',
        //         'diachi' => '20 Hà Hoàng Hổ',
        //         'cccd' => '036985214747',
        //         'mota' => 'Mô tả đại diện'
        //     ],
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doanhnghiep_daidien');
    }
};
