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
        Schema::table('danhgiaphieu2', function (Blueprint $table) {
            $table->unsignedBigInteger('cauhoiphieu2_id')->index();
            $table->foreign('cauhoiphieu2_id')->references('id')->on('cauhoiphieu2')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('danhgiaphieu2', function (Blueprint $table) {
            $table->dropForeign('traloiphieu2_cauhoiphieu2_id_foreign');
        });
    }
};
