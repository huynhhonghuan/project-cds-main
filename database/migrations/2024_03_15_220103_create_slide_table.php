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
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('tenbanner');
            $table->string('hinhanh');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        DB::table('slides')->insert([
            ['id'=>'1','tenbanner'=>'Banner1','hinhanh' => '202304250815TopBaner_CDS_NewYear_2023_2.png'],
            ['id'=>'2','tenbanner'=>'Banner2','hinhanh' => '2023050614012.jpg'],
            ['id'=>'3','tenbanner'=>'Banner3','hinhanh' => '4d26cd5c-077f-485d-ab11-c79974dee61f.jpg'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slide');
    }
};
