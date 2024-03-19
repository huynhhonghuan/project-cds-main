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
        Schema::create('mucdo', function (Blueprint $table) {
            $table->id();
            $table->string('tenmucdo');
            $table->longText('noidung');
            $table->integer('diem');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        DB::table('mucdo')->insert([
            ['tenmucdo'=>'Mức 0 - Chưa chuyển đổi số', 'noidung' => 'Doanh nghiệp chưa có hoạt động nào, hoặc có nhưng không đáng kể các hoạt động chuyển đổi số.', 'diem' => 20],
            ['tenmucdo'=>'Mức 1 - Khởi động', 'noidung' => 'Doanh nghiệp đã bắt đầu có một số hoạt động nhỏ trong quá trình chuyển đổi số.', 'diem' => 64],
            ['tenmucdo'=>'Mức 2 - Bắt đầu', 'noidung' => 'Doanh nghiệp nhận thức được tầm quan trọng của chuyển đổi số, bắt đầu có những hoạt động chuyển đổi số doanh nghiệp. Theo đó, những hoạt động này cũng bắt đầu mang lại lợi ích trong hoạt động của doanh nghiệp cũng như trải nghiệm khách hàng.', 'diem' => 128],
            ['tenmucdo'=>'Mức 3 - Hình thành', 'noidung' => 'Các hoạt động chuyển đổi số trong doanh nghiệp đã cơ bản hình thành theo các trụ cột ở các bộ phận, mang lại lợi ích và hiệu quả thiết thực cho doanh nghiệp cũng như trải nghiệm của khách hàng. Khi đạt được mức này là đang bắt đầu hình thành doanh nghiệp số.', 'diem' => 192],
            ['tenmucdo'=>'Mức 4 - Nâng cao', 'noidung' => 'Ở mức này, quá trình chuyển đổi số của doanh nghiệp đã được nâng cao thêm một bước. Các nền tảng, công nghệ, dữ liệu số giúp tối ưu hiệu quả hoạt động sản xuất kinh doanh của doanh nghiệp và trải nghiệm khách hàng. Đạt được mức này, doanh nghiệp đã trở thành doanh nghiệp số với mô thức chính dựa trên nền tảng, dữ liệu số.', 'diem' => 256],
            ['tenmucdo'=>'Mức 5 - Dẫn dắt', 'noidung' => 'Chuyển đổi số doanh nghiệp đã sắp hoàn thiện, doanh nghiệp thực sự đã trở thành doanh nghiệp số với hầu hết các phương thức, mô hình kinh doanh chủ yếu dựa trên nền tảng, dữ liệu số. Doanh nghiệp ở mức này có khả năng dẫn dắt, tạo lập hệ sinh thái doanh nghiệp số vệ tinh.', 'diem' => 320],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mucdo');
    }
};
