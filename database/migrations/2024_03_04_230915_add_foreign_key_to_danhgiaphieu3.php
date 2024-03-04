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
        Schema::table('danhgiaphieu3', function (Blueprint $table) {
            $table->unsignedBigInteger('cauhoiphieu3_id')->index();
            $table->foreign('cauhoiphieu3_id')->references('id')->on('cauhoiphieu3')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('danhgiaphieu3', function (Blueprint $table) {
            $table->dropForeign('traloiphieu3_cauhoiphieu3_id_foreign');
        });
    }
};
