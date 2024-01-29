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
        Schema::create('linhvuc', function (Blueprint $table) {
            $table->string('id',5)->primary();
            $table->string("tenlinhvuc");
            $table->timestamps();
        });

        DB::table('linhvuc')->insert([
            ['id'=>'nn','tenlinhvuc'=>'Nông nghiệp'],
            ['id'=>'cn','tenlinhvuc'=>'Công nghiệp'],
            ['id'=>'tmdv','tenlinhvuc'=>'Thương mại và dịch vụ'],
            ['id'=>'kh','tenlinhvuc'=>'Khác']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linhvuc');
    }
};
