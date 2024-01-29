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
        Schema::table('traloiphieu1', function (Blueprint $table) {
            $table->unsignedBigInteger('cauhoiphieu1_id')->index();
            $table->foreign('cauhoiphieu1_id')->references('id')->on('cauhoiphieu1')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('traloiphieu1', function (Blueprint $table) {
            $table->dropForeign('traloiphieu1_cauhoiphieu1_id_foreign');
        });
    }
};
