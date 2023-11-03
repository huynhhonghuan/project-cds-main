<?php

use GuzzleHttp\Promise\Create;
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
        Schema::create('linhvucs', function (Blueprint $table) {
            $table->string('id',5)->primary();
            $table->string("tenlinhvuc");
            $table->timestamps();
        });

        DB::table('linhvucs')->insert([
            ['id'=>'NN','tenlinhvuc'=>'Nông nghiệp'],
            ['id'=>'CN','tenlinhvuc'=>'Công nghiệp'],
            ['id'=>'TM&DV','tenlinhvuc'=>'Thương mại và dịch vụ'],
            ['id'=>'K','tenlinhvuc'=>'Khác']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linhvucs');
    }
};
