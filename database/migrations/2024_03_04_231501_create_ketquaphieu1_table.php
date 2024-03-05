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
        Schema::create('ketquaphieu1', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('danhsachphieu1_id')->index();
            $table->foreign('danhsachphieu1_id')->references('id')->on('danhsachphieu1')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('mohinh_trucot_id')->index();
            $table->foreign('mohinh_trucot_id')->references('id')->on('mohinh_trucot')->onUpdate('cascade')->onDelete('cascade');
            $table->double('phantram')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ketquaphieu1');
    }
};
