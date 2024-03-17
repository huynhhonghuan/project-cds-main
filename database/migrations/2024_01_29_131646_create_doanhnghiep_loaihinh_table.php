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
        Schema::create('doanhnghiep_loaihinh', function (Blueprint $table) {
            $table->id();

            $table->string('linhvuc_id', 5)->index();
            $table->foreign('linhvuc_id')->references('id')->on('linhvuc')->onUpdate('cascade')->onDelete('restrict');

            $table->string('tenloaihinh');
            $table->string('hinhanh')->nullable();
            $table->longText('mota')->nullable();

            $table->timestamps();
            $table->engine = 'InnoDB';

        });
        DB::table('doanhnghiep_loaihinh')->insert([
            ['id' => 1, 'linhvuc_id' => 'nn', 'tenloaihinh' => 'Trồng lúa', 'mota' => 'Lúa là một nguồn thực phẩm cơ bản và quan trọng trong nền kinh tế nông nghiệp của An Giang. Doanh nghiệp thường chuyên về sản xuất lúa, từ cấy gieo đến thu hoạch và chế biến lúa.', 'hinhanh' => 'tronglua.jpg'],
            ['id' => 2, 'linhvuc_id' => 'nn', 'tenloaihinh' => 'Trồng cây ăn trái', 'mota' => 'An Giang cũng có điều kiện thích hợp để trồng cây ăn trái như bưởi, cam, mãng cầu, măng cụt và các loại cây ăn trái khác. Các doanh nghiệp nông nghiệp thường sản xuất và tiêu thụ các sản phẩm này.', 'hinhanh' => 'trongcayantrai.jpg'],
            ['id' => 3, 'linhvuc_id' => 'nn', 'tenloaihinh' => 'Nuôi trồng thủy sản', 'mota' => 'Sản xuất các loại thủy sản, như cá, tôm, cua,... trong các môi trường nước ngọt, nước lợ, nước mặn. Một ngành kinh tế quan trọng của An Giang, đóng góp đáng kể vào GDP của tỉnh.', 'hinhanh' => 'nuoitrongthuysan.jpg'],

            ['id' => 4, 'linhvuc_id' => 'cn', 'tenloaihinh' => 'Chế biến thực phẩm', 'mota' => 'An Giang có nhiều cơ sở sản xuất và chế biến thực phẩm như bánh kẹo, đồ uống, sản phẩm chế biến từ cá và thủy sản. Các doanh nghiệp trong lĩnh vực này sản xuất và cung cấp sản phẩm thực phẩm cho thị trường nội địa và xuất khẩu.', 'hinhanh' => 'chebienthucpham.jpg'],
            ['id' => 5, 'linhvuc_id' => 'cn', 'tenloaihinh' => 'Chế biến sản phẩm từ gỗ', 'mota' => 'Lâm nghiệp là một ngành quan trọng tại An Giang. Các doanh nghiệp chế biến sản phẩm từ gỗ như nội thất, đồ trang trí, ván ép, và gỗ xây dựng.', 'hinhanh' => 'chebiensanphamtugo.jpg'],
            ['id' => 6, 'linhvuc_id' => 'cn', 'tenloaihinh' => 'Công nghiệp in ấn và sản xuất giấy', 'mota' => 'Có các doanh nghiệp công nghiệp in ấn và sản xuất giấy tại An Giang chuyên sản xuất các sản phẩm in ấn và giấy để đáp ứng nhu cầu trong và ngoài tỉnh.', 'hinhanh' => 'congngheinanvasanxuatgiay.jpg'],

            ['id' => 7, 'linhvuc_id' => 'tmdv', 'tenloaihinh' => 'Nhà hàng và dịch vụ ẩm thực', 'mota' => 'Ngành ẩm thực đóng một vai trò quan trọng trong lĩnh vực dịch vụ ở An Giang. Các nhà hàng, quán ăn và quán cà phê cung cấp các loại thực phẩm và đồ uống đa dạng.', 'hinhanh' => 'nhahang.jpg'],
            ['id' => 8, 'linhvuc_id' => 'tmdv', 'tenloaihinh' => 'Khách sạn và du lịch', 'mota' => 'Với các cảnh quan đẹp và nhiều điểm du lịch quan trọng, An Giang có nhiều khách sạn, nhà nghỉ và dịch vụ liên quan đến du lịch như hướng dẫn du lịch và các hoạt động giải trí.', 'hinhanh' => 'khachsan.jpg'],
            ['id' => 9, 'linhvuc_id' => 'tmdv', 'tenloaihinh' => 'Dịch vụ y tế và chăm sóc sức khỏe', 'mota' => 'Các cơ sở y tế bao gồm bệnh viện, phòng khám, nhà thuốc và các dịch vụ y tế chuyên nghiệp khác. Các chuyên gia y tế, bác sĩ và y tá làm việc để cung cấp chăm sóc sức khỏe cho cộng đồng.', 'hinhanh' => 'dichvuyte.jpg'],

            ['id' => 10, 'linhvuc_id' => 'kh', 'tenloaihinh' => 'Bán lẻ', 'mota' => 'Các doanh nghiệp bán lẻ hoạt động trong các cửa hàng, siêu thị, chợ, và trung tâm mua sắm để cung cấp các sản phẩm tiêu dùng như thực phẩm, đồ dùng gia đình, quần áo, giày dép, và nhiều mặt hàng khác.', 'hinhanh' => 'banle.jpg'],
            ['id' => 11, 'linhvuc_id' => 'kh', 'tenloaihinh' => 'Du lịch nông nghiệp', 'mota' => 'An Giang có nhiều điểm đến du lịch nông nghiệp như vườn cây ăn trái, trang trại nuôi thú, và khu vườn trồng hoa và cây cỏ. Doanh nghiệp trong lĩnh vực này cung cấp dịch vụ du lịch liên quan đến nông nghiệp và quê hương.', 'hinhanh' => 'dulichnongnghiep.jpg'],

            ['id' => 12, 'linhvuc_id' => 'nn', 'tenloaihinh' => 'Du lịch sinh thái vườn', 'mota' => null, 'hinhanh' => null],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doanhnghiep_loaihinh');
    }
};
