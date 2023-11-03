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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('role_id', 5)->index();
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });

        DB::table('user_roles')->insert([
            ['user_id'=> 1 , 'role_id' => 'ad'],
            ['user_id'=> 2 , 'role_id' => 'ctv'],
            ['user_id'=> 3 , 'role_id' => 'dn'],
            ['user_id'=> 4 , 'role_id' => 'cg'],
            ['user_id'=> 5 , 'role_id' => 'hdn']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
