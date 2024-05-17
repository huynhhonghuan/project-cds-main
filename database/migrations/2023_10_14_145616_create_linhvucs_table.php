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
            $table->string('hinhanh')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        DB::table('linhvuc')->insert([
            ['id'=>'nn','tenlinhvuc'=>'Nông nghiệp','hinhanh' => 'nongnghiep.jpg'],
            ['id'=>'cn','tenlinhvuc'=>'Công nghiệp - Xây dựng','hinhanh' =>'congnghiep.jpg'],
            ['id'=>'tmdv','tenlinhvuc'=>'Thương mại và dịch vụ' , 'hinhanh' => 'thuongmaidichvu.jpg'],
            ['id'=>'kh','tenlinhvuc'=>'Khác', 'hinhanh' =>'khac.jpg']
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
