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
            $table->string('name', 255)->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('status')->default('Inactive');
            $table->rememberToken();
            $table->timestamps();
        });

        $pass = Hash::make('1');

        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'phone' => null, 'password' => $pass, 'status' => 'Active'],
            ['name' => 'Hiệp hội doanh nghiệp', 'email' => 'hiephoidoanhnghiep@gmail.com', 'phone' => null, 'password' => $pass, 'status' => 'Active'],
            ['name' => 'Chuyên gia', 'email' => 'chuyengia@gmail.com', 'phone' => null, 'password' => $pass, 'status' => 'Active'],
            ['name' => 'Cộng tác viên', 'email' => 'congtacvien@gmail.com', 'phone' => null, 'password' => $pass, 'status' => 'Active'],
            ['name' => 'Doanh nghiệp', 'email' => 'doanhnghiep@gmail.com', 'phone' => '0919112392', 'password' => $pass, 'status' => 'Active'],
        ]);
    }

    /**`
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
