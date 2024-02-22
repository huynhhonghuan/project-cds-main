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
        Schema::create('chuyengia', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('linhvuc_id', 5)->index();
            $table->foreign('linhvuc_id')->references('id')->on('linhvuc')->onUpdate('cascade')->onDelete('cascade');

            $table->string('tenchuyengia');
            // $table->string('email')->unique();
            $table->string('sdt')->nullable();
            $table->string('thanhpho');
            $table->string('huyen');
            $table->string('xa');
            $table->string('diachi')->nullable();
            $table->string('cccd');
            $table->string('img_mattruoc')->nullable();
            $table->string('img_matsau')->nullable();
            $table->longText('mota')->nullable();

            $table->timestamps();
        });
        DB::table('chuyengia')->insert([
            [
                'user_id' => 4,
                'linhvuc_id' => 'nn',
                'tenchuyengia' => 'Chuyên gia',
                'sdt' => '0147852369',
                'thanhpho' => '01',
                'huyen' => '001',
                'xa' => '00001',
                'cccd' => '012365478995',
                'diachi' => '18 Ung Văn Khiêm',
                'mota' => 'Mô tả doanh nghiệp',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuyengia');
    }
};
