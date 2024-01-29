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
        Schema::create('mohinh_trucot', function (Blueprint $table) {
            $table->id();
            $table->string('tentrucot');
            $table->longText('noidung');
            $table->string('ghichu')->nullable();
            $table->timestamps();
        });

        DB::table('mohinh_trucot')->insert([
            ['tentrucot' => 'Khách hàng' , 'noidung' =>'Đây là đối tượng đóng vai trò cốt lõi trong quá trình chuyển đổi số của doanh nghiệp. Doanh nghiệp cần hiểu nhu cầu, hành vi và kỳ vọng của khách hàng để có thể lên kế hoạch và đưa ra mô hình chuyển đổi số phù hợp.'],
            ['tentrucot' => 'Dữ liệu' , 'noidung' =>'Dữ liệu cho phép doanh nghiệp có thể thiết lập các chỉ số phù hợp, đồng thời theo dõi tiến trình thực hiện một cách dễ dàng.'],
            ['tentrucot' => 'Công nghệ' , 'noidung' =>'Được xem là khởi đầu của sự thay đổi, doanh nghiệp có thể đổi mới công nghệ để đảm bảo luồng thông tin giữa các bộ phận được lưu chuyển thông suốt. Điều này sẽ giúp doanh nghiệp nâng cao chất lượng quản lý, khả năng điều hành cũng như sức cạnh tranh.'],
            ['tentrucot' => 'Chiến lược' , 'noidung' =>'Một chiến lược rõ ràng sẽ tạo động lực cho chuyển đổi số. Đồng thời, chiến lược được đánh giá là yếu tố quan trọng tác động đến sự thành công của doanh nghiệp trên thị trường.'],
            ['tentrucot' => 'Vận hành' , 'noidung' =>'Với việc số hóa vận hành, doanh nghiệp có thể tối ưu bộ máy vốn có, mang lại các lợi thế cạnh tranh và sẵn sàng thích nghi với thời cuộc.'],
            ['tentrucot' => 'Văn hóa công nghệ' , 'noidung' =>'Chuyển đổi số sẽ không thể diễn ra nếu mô hình chuyển đổi không phù hợp với văn hóa doanh nghiệp. Công ty cần kết hợp nhuần nhuyễn các yếu tố gồm văn hóa, con người, cấu trúc và nhiệm vụ của họ để đảm bảo sự đồng bộ.'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mohinh_trucot');
    }
};
