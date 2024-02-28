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
        Schema::create('hiephoidoanhnghiep', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->longText('tentiengviet');
            $table->longText('tentienganh');
            // $table->string('email')->unique();
            $table->string('sdt')->unique();
            $table->string('thanhpho');
            $table->string('huyen');
            $table->string('xa');
            $table->string('diachi')->nullable();
            $table->longText('mota')->nullable();

            $table->timestamps();
        });
        DB::table('hiephoidoanhnghiep')->insert([
            [
                'user_id' => 5,
                'tentiengviet' => 'Hiệp hội doanh nghiệp An Giang',
                'tentienganh' => 'An Giang HHDN',
                'sdt' => '0326985147',
                'thanhpho' => '01',
                'huyen' => '001',
                'xa' => '00001',
                'diachi' => '18 Ung Văn Khiêm',
                'mota' => 'Mô tả hiệp hội doanh nghiệp',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hiephoidoanhnghiep');
    }
};
