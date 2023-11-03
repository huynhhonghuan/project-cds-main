<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $pass=Hash::make('1');

        DB::table('users')->insert([
            ['email'=>'admin@gmail.com', 'password'=>$pass, 'status'=>'Active'],
            ['email'=>'congtacvien@gmail.com', 'password'=>$pass, 'status'=>'Active'],
            ['email'=>'doanhnghiep@gmail.com', 'password'=>$pass, 'status'=>'Active'],
            ['email'=>'chuyengia@gmail.com', 'password'=>$pass, 'status'=>'Active'],
            ['email'=>'hoidoanhnghiep@gmail.com', 'password'=>$pass, 'status'=>'Active'],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
