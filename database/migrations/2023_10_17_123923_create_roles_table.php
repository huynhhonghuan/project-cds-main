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
        Schema::create('vaitro', function (Blueprint $table) {
            $table->string('id', 5)->primary();
            $table->string('tenvaitro',100);
            $table->timestamps();
        });

        DB::table('vaitro')->insert([
            ['id'=>'ad','tenvaitro'=>'Admin'],
            ['id'=>'ctv','tenvaitro'=>'Cộng tác viên'],
            ['id'=>'dn','tenvaitro'=>'Doanh nghiệp'],
            ['id'=>'cg','tenvaitro'=>'Chuyên gia'],
            ['id'=>'hhdn','tenvaitro'=>'Hiệp hội doanh nghiệp'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaitro');
    }
};
