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
        Schema::create('tintuc', function (Blueprint $table) {
            $table->id();
            $table->string('linhvuc_id',5)->index();
            $table->foreign('linhvuc_id')->references('id')->on('linhvuc')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('tieude');
            $table->longText('tomtat');
            $table->string('hinhanh')->nullable();
            $table->longText('noidung');
            $table->integer('luotxem')->default(0);
            $table->tinyInteger('duyet')->default(0);
            $table->timestamps();
        });

        DB::table('tintuc')->insert([
            ['linhvuc_id'=>'nn','user_id'=>'1','tieude'=>'Tiêu đề 1','tomtat'=>'Tóm tắt 1','noidung'=>'Nội dung 1'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tintuc');
    }
};
