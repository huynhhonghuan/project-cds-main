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
        Schema::create('roles', function (Blueprint $table) {
            $table->string('id', 5)->primary();
            $table->string('name_role',100);
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['id'=>'ad','name_role'=>'Admin'],
            ['id'=>'ctv','name_role'=>'Cộng tác viên'],
            ['id'=>'dn','name_role'=>'Doanh nghiệp'],
            ['id'=>'cg','name_role'=>'Chuyên gia'],
            ['id'=>'hdn','name_role'=>'Hội doanh nghiệp'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
