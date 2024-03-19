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
        Schema::create('mohinh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('tenmohinh');
            $table->longText('noidung');
            $table->string('hinhanh')->nullable();
            $table->timestamps();
            //thêm khóa ngoại của bảng mohinh_trucot

            //thêm khóa ngoại của bảng doanhnghiep_loaihinh
            $table->engine = 'InnoDB';

        });

        // 1: Khách hàng
        // 2: Chiến lược
        // 3: Công nghệ
        // 4: Vận hành
        // 5: Văn hóa doanh nghiệp
        // 6: Dữ liệu

        DB::table('mohinh')->insert([
            //Chung
            [
                'tenmohinh' => 'Mở rộng mạng lưới kết nối',
                'noidung' => 'Là mô hình chuyển đổi số được hình thành khi doanh nghiệp có đủ cơ sở hạ tầng viễn thông và khả năng đào thải nhóm người dùng “phá đám” của hệ thống. Mô hình này hỗ trợ trao đổi thông tin, giao dịch giữa các nhóm người diễn ra dễ dàng, không bị giới hạn về mặt địa lý và được áp dụng cho các loại hình dịch vụ web. Hiện nay, các doanh nghiệp ứng dụng mô hình chuyển đổi số này một cách hiệu quả có thể kể đến như: các trang mạng xã hội (Facebook, Twitter, Instagram), các trang thương mại điện tử (Amazon, Rakuten, Tiki, Tokopedia), v.v…',
                'hinhanh' => 'mohinh-1.png',
            ],
            [
                // 'user_id' => 4,
                'tenmohinh' => 'Giảm chi phí tìm kiếm và chi phí cơ hội',
                'noidung' => 'Là mô hình kích hoạt sự xuất hiện của bên trung gian – nhóm người chuyên tổng hợp, xử lý, sắp xếp lượng thông tin phức tạp sau đó cung cấp cho người dùng theo định dạng họ mong muốn. Doanh nghiệp muốn áp dụng mô hình này phải đáp ứng được yêu cầu về mặt chuyên môn, đồng thời đảm bảo được tính khách quan và tin cậy. Từ đó giúp người dùng dễ dàng so sánh và đưa ra những lựa chọn. Các lĩnh vực áp dụng mô hình này bao gồm bất động sản, dịch vụ tài chính, bảo hiểm, tuyển dụng.',
                // 'mohinh_trucot_id' => 1,
                'hinhanh' => null,
            ],
            [
                'tenmohinh' => 'Loại bỏ cấu trúc đa tầng và phân mảnh',
                'noidung' => 'Đây là mô hình chuyển đổi số phù hợp với các doanh nghiệp thuộc các ngành hàng yêu cầu tính chuyên môn, có chi phí hàng hóa, dịch vụ cao như giao dịch ô tô, xe máy, kim loại quý, tuyển dụng,… Nếu muốn vận dụng mô hình này, doanh nghiệp cần xây dựng nền tảng có tính năng so sánh và tìm kiếm tiện lợi. Tại Việt Nam, doanh nghiệp vận dụng mô hình chuyển đổi số này có thể kể đến Luxstay – Nền tảng cho thuê căn hộ ngắn hạn. Với mô hình này, Luxstay mở ra cơ hội kết nối trực tiếp giữa chủ căn hộ với khách thuê, đồng thời minh bạch giá cả với tính năng so sánh nhiều kết quả tìm kiếm khiến nhau, giúp người dùng dễ dàng tìm được lựa chọn phù hợp.',
                // 'mohinh_trucot_id' => 1,
                'hinhanh' => '',
            ],
            [
                'tenmohinh' => 'Tổng hợp dữ liệu',
                'noidung' => 'Đây là mô hình chuyển đổi số đánh dấu sự thay đổi trong việc quản lý dữ liệu: doanh nghiệp chia sẻ dữ liệu vào kho tập trung, tạo điều kiện tối ưu hóa các cơ hội từ dữ liệu cho các bên tham gia. Từ đó, tạo tiền đề để xây dựng các dịch vụ giá trị gia tăng, thay vì sử dụng các công ty cung cấp dịch vụ quản lý dữ liệu người dùng.',
                // 'mohinh_trucot_id' => 6,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Tối đa hóa ROI và tài nguyên',
                'noidung' => 'Mô hình Tối đa hóa ROI và tài nguyên được vận dụng khi mạng lưới Internet mở rộng và các dịch vụ số gia tăng. Lúc này, những thay đổi về giá trị và định hướng tiêu dùng do sự khan hiếm nguồn lực trở thành yếu tố mang lại hiệu quả tích cực.',
                // 'mohinh_trucot_id' => 3,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Cung cấp phần cứng đi kèm phần mềm',
                'noidung' => 'Cung cấp phần cứng đi kèm phần mềm là mô hình chuyển đổi thứ 6 trong danh sách. Mô hình này định nghĩa lại việc xây dựng mối quan hệ với khách hàng, bắt đầu từ phần mềm, được kích hoạt khi tốc độ phổ biến của đường truyền Internet tăng nhanh, song song với sự phát triển của phương pháp phân tích dữ liệu.',
                // 'mohinh_trucot_id' => 3,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Bán tự động',
                'noidung' => 'Là mô hình chuyển đổi số vận dụng trong bối cảnh thiếu hụt lao động, đặc biệt là nhóm nhân lực chuyên môn cao. Nhu cầu về tính lưu động nguồn nhân lực tăng cao và quá trình chuyển giao công nghệ giữa các ngành là lý do khiến Bán tự động được nhiều doanh nghiệp vận dụng.',
                // 'mohinh_trucot_id' => 4,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Hiểu khách hàng trước khi sản xuất',
                'noidung' => 'Đây là mô hình chuyển đổi số đảo ngược quy trình sản xuất và bán hàng truyền thống, bắt đầu từ việc tiếp thị khách hàng mục tiêu trước khi sản xuất sản phẩm phù hợp. Mô hình này được vận dụng khi xu hướng cá nhân hóa và đa dạng hóa nhu cầu của người tiêu dùng.',
                // 'mohinh_trucot_id' => 1,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'SaaS cung cấp giải pháp chuyên môn',
                'noidung' => 'SaaS là mô hình chuyển đổi số tập trung vào một hoặc vài nghiệp vụ chuyên môn, từ đó giải quyết bài toán nghiệp vụ. Hiện nay, các ngành vận dụng mô hình này bao gồm Kế toán, F&B, v.v.',
                // 'mohinh_trucot_id' => 2,
                'hinhanh' => '',

            ],
            //Nông nghiệp
            [
                'tenmohinh' => 'Nâng cao chất lượng nguồn nhân lực',
                'noidung' => 'Xây dựng chính phủ điện tử và chuyển đổi số trong công tác quản lý để việc đề xuất, chỉ đạo, thực hiện các chính sách chuyển đổi số nông nghiệp hiệu quả. Khuyến khích doanh nghiệp, lao động trẻ tham gia chuyển đổi số. Đào tạo các chuyên gia chuyển đổi số trong nông nghiệp giỏi cả lý thuyết lẫn thực hành.Tăng cường truyền thông, tổ chức các khóa đào tạo, tập huấn kỹ năng cho nông dân. Đào tạo người dân về việc sử dụng sàn thương mại để quảng bá sản phẩm. Kết nối các tổ chức như hội Phụ nữ, hội Nông dân và hợp tác xã để giúp đỡ lẫn nhau trong quá trình áp dụng công nghệ. Khuyến khích người dân sử dụng các thiết bị điện tử hiện đại, tham gia thảo luận về cách ứng dụng công nghệ cao. Mời các nông dân đã chuyển đổi số thành công chia sẻ kinh nghiệm của mình.',
                // 'mohinh_trucot_id' => 4
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Giải pháp về đất đai',
                'noidung' => 'Khuyến khích tập trung đất đai để sản xuất nông nghiệp. Tăng cường ứng dụng các giải pháp công nghệ trong sản xuất nông nghiệp như: Giải pháp GIS, theo dõi tính trạng đất môi trường… Chính quyền địa phương tham gia vào việc liên kết, làm hợp đồng chuyển nhượng đất giữa nông dân và doanh nghiệp.',
                // 'mohinh_trucot_id' => ,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Giải pháp về vốn đầu tư',
                'noidung' => 'Để nâng cao khả năng tiếp cận nguồn vốn, ngành nông nghiệp cần sớm công bố kế kế hoạch phát triển ngành chi tiết. Đơn giản hóa thủ tục, quy trình; tăng cường số lượng các khu, vùng nông nghiệp; doanh nghiệp nông nghiệp ứng dụng công nghệ cao được cấp phép công nhận. Tăng cường triển khai việc cấp giấy chứng nhận quyền sử dụng đất và tài sản trên đất nông nghiệp. Công nhận các tài sản trong sản xuất là tài sản thế chấp: Ao nuôi, nhà kính… Hỗ trợ nông dân lập kế hoạch kinh doanh và trả nợ. Xây dựng chính sách để  thu hút các tập đoàn nước ngoài đầu tư vốn FDI cho các dự án chuyển đổi số nông nghiệp ở Việt Nam. Để doanh nghiệp chủ động tiếp cận nguồn vốn rồi mới đưa ra chính sách hỗ trợ.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Xây dựng nền tảng cơ sở dữ liệu',
                'noidung' => 'Thực hiện chuyển đổi số, kinh tế số trong nông nghiệp phải dựa trên nền tảng dữ liệu. Thay đổi thổi thói quen ghi chép nhật lý canh tác và nhật ký chăn nuôi của nông dân trên giấy rồi số hóa trên thiết bị điện tử bằng cách tập huấn, hướng dẫn nông dân tham gia mô hình ghi nhật ký sản xuất. Các cơ quan thuộc bộ cần thống kê chi tiết các dữ liệu quan trọng liên quan đến phạm vi quản lý của mình. Cần tập trung xây dựng các hệ thống dữ liệu lớn, trong đó tập trung vào đất trồng lúa, cây ăn quả, cây công nghiệp, đất rừng, chăn nuôi, nuôi trồng thủy sản.. Thiết kế mạng lưới quan sát, giám sát tích hợp trên không và mặt đất phục vụ các hoạt động nông nghiệp. Tăng cường việc cung cấp thông tin về môi trường, đất đai, thời tiết để giúp người nông dân nâng cao năng suất và chất lượng cây trồng. Đồng thời, các cơ quan quản lý cần hỗ trợ chia sẻ các thiết bị nông nghiệp qua các nền tảng số. Thiết kế phần mềm quản trị dữ liệu và phân công cá nhân, tổ chức ở địa phương sử dụng phần mềm để thu thập, cập nhật, khai thác, quản lý và bảo quản cơ sở dữ liệu.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],
            //Công nghiệp
            [
                'tenmohinh' => 'Phân tích dữ liệu nâng cao',
                'noidung' => 'Với sự ra đời của các công nghệ như IoT, việc thu thập các dữ liệu ngày càng trở nên thuận tiện và phổ biến. Theo khảo sát của ITIC, 81% tổ chức cho rằng một giờ ngừng hoạt động có thể tiêu tốn 100.000 USD, và 33% doanh nghiệp cho biết một giờ ngừng hoạt động của họ có thể gây tổn hại tới 1 triệu USD. Vì vậy, việc tận dụng dữ liệu để xác định các vấn đề và đưa ra dự báo về tình trạng và lên kế hoạch bảo trì các thiết bị có thể khiến cho chuỗi vận hành được hoạt động trơn tru, không gặp trở ngại, giúp tiết kiệm được những nguồn chi phí khổng lồ. Việc đưa ra phân tích dữ liệu nâng cao và dự báo còn giúp cho việc tối ưu trong quản lý sự phụ thuộc giữa các bộ phận, giúp cho việc điều phối nhân công diễn ra dễ dàng và chính xác hơn.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Tự động hóa',
                'noidung' => 'Việc ứng dụng tự động hóa quy trình bằng robot (RPA) đang ngày càng phổ biến, đặc biệt trong ngành công nghiệp sản xuất. Chúng sẽ giúp doanh nghiệp hiện thực hóa các mục tiêu liên quan tới cắt giảm chi phí, tối ưu hóa hoạt động, cải thiện trải nghiệm khách hàng, giảm thiểu lỗi và dễ dàng quản lý hệ thống vận hành. Dự kiến chi phí cho các phần mềm RPA sẽ đạt 2.9 tỷ USD vào năm 2021 (Forrester). RPA là yếu tố tiền đề để xác định tính khả thi của các chương trình chuyển đổi số trong các nhà máy thông minh. Việc triển khai RPA xuất phát từ nhu cầu tự động hoá các tác vụ vận hành thủ công, lặp đi lặp lại, từ đó tiết kiệm chi phí, nâng cao hiệu suất.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Ứng dụng IoT',
                'noidung' => 'Mặc dù IoT không còn là một cái tên xa lạ và đã phổ biến rộng rãi, trong các ngành sản xuất, công nghệ này vẫn đứng top đầu trong các xu hướng phát triển nhằm hỗ trợ quá trình chuyển đổi số nhờ vào khả năng thích ứng và đổi mới không ngừng. Hiện nay, có khoảng 34% nhà máy sản xuất công nghệ có kế hoạch kết hợp công nghệ IoT vào các quy trình của họ. Các thiết bị hỗ trợ IoT giúp các nhà sản xuất có thể theo dõi an toàn hiệu suất thiết bị ở khoảng cách xa và dự báo các sự cố tiềm ẩn, cùng như cho phép các kỹ thuật viên hiểu rõ toàn bộ vấn đề và đưa ra các giải pháp tiềm năng.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Trí tuệ nhân tạo và máy học',
                'noidung' => 'Trí tuệ nhân tạo đóng vai trò quan trọng khi chuyển đổi số trong ngành sản xuất công nghiệp, Sự kết hợp hài hòa giữa trí tuệ nhân tạo là máy học sẽ giúp thu thập các bộ dữ liệu, phân tích và sau đó sử dụng chúng để xây dựng các mô hình sản xuất sẽ phát triển trong tương lai. Máy học ứng dụng để các nhà máy dự báo chuẩn xác những biến động về cung và cầu, phân tích dự báo tình trạng hệ thống thiết bị máy móc. Trí tuệ nhân tạo thì được sử dụng để xây dựng Bản sao số (Digital Twins), là một bản sao ảo của một hệ thống sản xuất, với ứng dụng phổ biến nhất là chẩn đoán và đánh giá theo thời gian thực về quy trình sản xuất, dự đoán và hình dung hiệu suất sản phẩm.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],
            //Thương mại - dịch vụ
            [
                'tenmohinh' => 'Ứng dụng mobile',
                'noidung' => 'Các ứng dụng này phù hợp với một đặc trưng của khách hàng (du khách) của các doanh nghiệp du lịch là ở xa nơi có sản phẩm và “tiêu thụ” sản phẩm trong quá trình di chuyển. Các ứng dụng trên điện thoại di động thông minh cho phép khách hàng có thể khai thác thông tin, thực hiện các thao tác giao dịch và tích hợp nhiều tiện ích khác. Ví dụ: điện thoại thông minh còn được sử dụng để mở cửa phòng khách sạn, đặt các bữa ăn phục vụ tại phòng, đặt các dịch bổ sung trong khách sạn... Thực tế cho thấy, với thiết bị di động người ta có thể lên kế hoạch cho toàn bộ chuyến đi từ đặt vé, đặt dịch vụ đến tìm kiếm thông tin về địa điểm tham quan, chọn hướng dẫn viên… trong chuyến đi mà không cần tương tác trực tiếp với bất kỳ người nào.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Rating và Review',
                'noidung' => 'Việc khách hàng có thể chia sẻ các ý kiến của họ một cách nhanh chóng thông qua mạng xã hội như Facebook, Yelp, TripAdvisor hay các trang web du lịch giúp các cơ sở lưu trú, các doanh nghiệp cung cấp dịch vụ du lịch hiểu rõ hơn mong muốn của du khách. Công cụ kỹ thuật này thúc đẩy các doanh nghiệp này quan tâm hơn đến chất lượng để tạo sự hài lòng của du khách, gây dựng uy tín thông qua điểm đánh giá của khách hàng.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Kết nối IoT (Internet of Thing)',
                'noidung' => 'Khi mà có ngày càng nhiều những thiết bị được kết nối với IoT (Internet of Thing) thì các doanh nghiệp du lịch có thể khai thác để giúp cho việc phục vụ nhu cầu khách hàng trở nên hiệu quả hơn. Các dữ liệu IoT (Internet of Thing) thu thập được sẽ cho biết được tổng quan về nhu cầu cũng như thói quen du lịch,… của du khách. Từ đó có thể giúp các doanh nghiệp du lịch có thể dễ dàng phục vụ cả những du khách khó tính nhất. Việc khai thác các dữ liệu IoT (Internet of Thing) sẽ giúp các doanh nghiệp có thể dễ dàng bán được sản phẩm, vừa hiểu rõ khách hàng hơn. Đặc biệt qua đó cũng có thể tiết kiệm được thời gian để tìm kiếm và thực hiện thao tác liên quan tới việc mua các sản phẩm du lịch cho khách hàng.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Tích hợp nhiều kênh bán hàng',
                'noidung' => 'Là chiến lược kết nối các kênh bán hàng khác nhau của doanh nghiệp (cửa hàng truyền thống, website, mạng xã hội, sàn thương mại điện tử, v.v.) thành một hệ thống thống nhất. Việc tích hợp giúp doanh nghiệp quản lý bán hàng hiệu quả hơn, đồng thời mang lại trải nghiệm liền mạch cho khách hàng.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],
            [
                'tenmohinh' => 'Tối ưu chi phí quản lý',
                'noidung' => 'Là việc áp dụng các biện pháp để giảm thiểu chi phí quản lý doanh nghiệp mà vẫn đảm bảo hiệu quả hoạt động. Việc tối ưu chi phí quản lý giúp doanh nghiệp tăng lợi nhuận, nâng cao khả năng cạnh tranh và phát triển bền vững.',
                // 'mohinh_trucot_id' =>,
                'hinhanh' => '',

            ],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mohinh');
    }
};
