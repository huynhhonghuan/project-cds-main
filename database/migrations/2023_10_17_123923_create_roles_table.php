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
            $table->string('hinhanh')->nullable();
            $table->timestamps();
        });

        DB::table('vaitro')->insert([
            ['id'=>'ad','tenvaitro'=>'Admin','hinhanh' =>'admin.png'],
            ['id'=>'ctv','tenvaitro'=>'Cộng tác viên','hinhanh'=>'collaborations.png'],
            ['id'=>'dn','tenvaitro'=>'Doanh nghiệp','hinhanh'=>'enterprise.png'],
            ['id'=>'cg','tenvaitro'=>'Chuyên gia','hinhanh'=>'expert.png'],
            ['id'=>'hhdn','tenvaitro'=>'Hiệp hội doanh nghiệp','hinhanh'=>'teamwork.png'],
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
