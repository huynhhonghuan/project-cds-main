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
        Schema::create('doanhnghiep', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('doanhnghiep_loaihinh_id')->index();
            $table->foreign('doanhnghiep_loaihinh_id')->references('id')->on('doanhnghiep_loaihinh')->onUpdate('cascade')->onDelete('cascade');

            $table->longText('tentiengviet');
            $table->longText('tentienganh');
            $table->string('tenviettat')->nullable();
            // $table->string('email')->unique();
            $table->string('thanhpho');
            $table->string('huyen');
            $table->string('xa');
            $table->string('diachi')->nullable();
            $table->string('mathue')->nullable();
            $table->string('fax')->nullable();
            $table->integer('soluongnhansu')->default(0);
            $table->date('ngaylap');
            $table->longText('mota')->nullable();

            $table->timestamps();
        });

        DB::table('doanhnghiep')->insert([
            [
                'user_id' => 3,
                'doanhnghiep_loaihinh_id' => 1,
                'tentiengviet' => 'Công ty TNHH',
                'tentienganh' => 'Company TNHH',
                'tenviettat' => 'CT 3H',
                'thanhpho' => '01',
                'huyen' => '001',
                'xa' => '00001',
                'diachi' => '18 Ung Văn Khiêm',
                'mathue' => '840000',
                'fax' => '01369824712',
                'soluongnhansu' => 100,
                'ngaylap' => '2024-02-20',
                'mota' => 'Mô tả doanh nghiệp',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doanhnghiep');
    }
};
