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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('tieude');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('file');
            $table->tinyInteger('duyet')->default(1);
            $table->timestamps();
        });

        DB::table('videos')->insert([
            ['id'=>'1','tieude'=>'Chuyển đổi số cho doanh nghiệp nhỏ và vừa tỉnh An Giang  Nâng cao năng lực kết nối thị trường','user_id' => '1','file'=>'https://www.youtube.com/embed/VARlegnzda0?si=GrS-w-VX1QmMVLfU','duyet'=>'1'],
            ['id'=>'2','tieude'=>'An Giang khai mạc chuỗi sự kiện chuyển đổi số','user_id' => '1','file'=>'https://www.youtube.com/embed/OlFeUoQqglc?si=GGlxtPWjUygaXCxK','duyet'=>'1'],
            ['id'=>'3','tieude'=>'An Giang chuyển đổi số - Cơ hội bứt phá vươn lên','user_id' => '1','file'=>'https://www.youtube.com/embed/8wOyHI06FiM?si=N0JbVVsddsT_WPQ7','duyet'=>'1'],
            ['id'=>'4','tieude'=>'Nhiều sáng kiến mới về cải cách hành chính và chuyển đổi số','user_id' => '1','file'=>'https://www.youtube.com/embed/OK-MDZqjvEk?si=O96qnKQp5Z5rT4e1','duyet'=>'1'],
            ['id'=>'5','tieude'=>'Chuyển đổi số là động lực phát triển | Đài Truyền hình An Giang','user_id' => '1','file'=>'https://www.youtube.com/embed/E_apFHKttcw?si=O3bWMdCKhXQ8M4Zt','duyet'=>'1'],
            ['id'=>'6','tieude'=>'Tân Chủ tịch LĐLĐ tỉnh An Giang sẽ ưu tiên chuyển đổi số trong CNLĐ','user_id' => '1','file'=>'https://www.youtube.com/embed/4QBVVYbL-4E?si=p4UrSjq8dwK_T-c3','duyet'=>'1'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
