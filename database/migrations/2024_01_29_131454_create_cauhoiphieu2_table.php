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
        Schema::create('cauhoiphieu2', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->primary('id');
            $table->longText('tencauhoi')->nullable();
            $table->unsignedBigInteger('cauhoiphieu2_id')->index()->nullable();
            $table->foreign('cauhoiphieu2_id')->references('id')->on('cauhoiphieu2')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        // DB::table('cauhoiphieu2')->insert([
        //     'id' => 1,
        //     'tencauhoi' => 'huan',
        //     'cauhoiphieu2_id' => null,
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cauhoiphieu2');
    }
};
