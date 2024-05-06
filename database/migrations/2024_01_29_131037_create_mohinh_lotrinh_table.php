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
        Schema::create('mohinh_lotrinh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mohinh_id')->index();
            $table->foreign('mohinh_id')->references('id')->on('mohinh')->onUpdate('cascade')->onDelete('cascade');
            // $table->string('tenlotrinh');
            $table->string('thoigian');
            $table->integer('nhansu')->default(0);
            $table->integer('taichinh')->default(0);
            $table->longText('noidung');
            $table->longText('luuy')->nullable();

            $table->timestamps();
            $table->engine = 'InnoDB';

        });

        DB::table('mohinh_lotrinh')->insert([
            [
                'mohinh_id' => 1,
                'thoigian' => '2 năm',
                'nhansu' => 50,
                'taichinh' => 100000000,
                'noidung' => 'Nội dung',
                'luuy' => 'Lưu ý của lộ trình',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mohinh_lotrinh');
    }
};
