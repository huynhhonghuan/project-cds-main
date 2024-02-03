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
        Schema::create('user_vaitro', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('vaitro_id', 5)->index();
            $table->foreign('vaitro_id')->references('id')->on('vaitro')->onUpdate('cascade')->onDelete('restrict');

            $table->string('cap_vaitro_id', 5)->index(); // tài khoản này cho ai cấp, về doanh nghiệp có quyền tự đăng ký(tự cấp)
            $table->foreign('cap_vaitro_id')->references('id')->on('vaitro')->onUpdate('cascade')->onDelete('restrict');

            $table->unsignedBigInteger('duyet_user_id')->index()->nullable(); //tài khoản này cho ai duyệt (admin, hhdn)
            $table->foreign('duyet_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');

            $table->timestamps();
        });

        DB::table('user_vaitro')->insert([
            ['user_id' => 1, 'vaitro_id' => 'ad', 'cap_vaitro_id' => 'ad', 'duyet_user_id' => '1'],
            ['user_id' => 2, 'vaitro_id' => 'ctv', 'cap_vaitro_id' => 'ad', 'duyet_user_id' => '1'],
            ['user_id' => 3, 'vaitro_id' => 'dn', 'cap_vaitro_id' => 'dn', 'duyet_user_id' => '1'],
            ['user_id' => 4, 'vaitro_id' => 'cg', 'cap_vaitro_id' => 'hhdn', 'duyet_user_id' => '1'],
            ['user_id' => 5, 'vaitro_id' => 'hhdn', 'cap_vaitro_id' => 'ad', 'duyet_user_id' => '1'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_vaitro');
    }
};
