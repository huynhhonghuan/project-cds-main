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
        Schema::table('chuyengia', function (Blueprint $table) {
            $table->string('chucvu')->nullable();
            $table->string('namkinhnghiem')->nullable();
            $table->string('trinhdo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chuyengia', function (Blueprint $table) {
            $table->dropColumn('hinhanh');
            $table->dropColumn('namkinhnghiem');
            $table->dropColumn('trinhdo');
        });
    }
};
