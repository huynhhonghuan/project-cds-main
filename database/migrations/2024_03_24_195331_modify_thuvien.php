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
        //
        Schema::table('thuvien', function (Blueprint $table) {
            $table->string('kyhieu');
            $table->datetime('namphathanh');
            $table->string('loai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('thuvien', function (Blueprint $table) {
            $table->dropColumn('kyhieu');
            $table->dropColumn('namphathanh');
            $table->dropColumn('loai');
        });
    }
};
