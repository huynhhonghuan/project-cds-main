@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    @foreach($mucdo as $md)
    @endforeach
    <div id="id" style="margin-top: 200px;margin-bottom: 132px;">
        <div class="container">
            <div class="row cdsTitle">
                <h2>Các mức độ chuyển đổi số</h2>
            </div>
            <div class="row" style="padding-top: 200px">
                <ul class="list-md">
                    <li>  
                        <div class="md-content-1">
                            <div class="md-content-head">Mức 0 : Chưa chuyển đổi số</div>
                            <div class="md-content-body">Doanh nghiệp chưa có hoạt động nào, hoặc có nhưng không đáng kể các hoạt động chuyển đổi số.</div>
                        </div>
                        <span>Mức 0</span>
                    </li>
                    <li>
                        <div class="md-content-2">
                            <div class="md-content-head">Mức 1 : Khởi động</div>
                            <div class="md-content-body">Doanh nghiệp đã bắt đầu có một số hoạt động nhỏ trong quá trình chuyển đổi số.</div>
                        </div>
                        <span>Mức 1</span>
                    </li>
                    <li>
                        <div class="md-content-3">
                            <div class="md-content-head">Mức 2 : Bắt Đầu</div>
                            <div class="md-content-body">Doanh nghiệp nhận thức được tầm quan trọng của chuyển đổi số, bắt đầu có những hoạt động chuyển đổi số doanh nghiệp. Theo đó, những hoạt động này cũng bắt đầu mang lại lợi ích trong hoạt động của doanh nghiệp cũng như trải nghiệm khách hàng.</div>
                        </div>
                        <span>Mức 2</span>
                    </li>
                    <li>
                        <div class="md-content-4">
                            <div class="md-content-head">Mức 3 : Hình Thành</div>
                            <div class="md-content-body">Các hoạt động chuyển đổi số trong doanh nghiệp đã cơ bản hình thành theo các trụ cột ở các bộ phận, mang lại lợi ích và hiệu quả thiết thực cho doanh nghiệp cũng như trải nghiệm của khách hàng. Khi đạt được mức này là đang bắt đầu hình thành doanh nghiệp số.</div>
                        </div>
                        <span>Mức 3</span>
                    </li>
                    <li>
                        <div class="md-content-5">
                            <div class="md-content-head">Mức 4 : Nâng Cao</div>
                            <div class="md-content-body">Ở mức này, quá trình chuyển đổi số của doanh nghiệp đã được nâng cao thêm một bước. Các nền tảng, công nghệ, dữ liệu số giúp tối ưu hiệu quả hoạt động sản xuất kinh doanh của doanh nghiệp và trải nghiệm khách hàng. Đạt được mức này, doanh nghiệp đã trở thành doanh nghiệp số với mô thức chính dựa trên nền tảng, dữ liệu số.</div>
                        </div>
                        <span>Mức 4</span>
                    </li>
                    <li>
                        <div class="md-content-6">
                            <div class="md-content-head">Mức 5 : Dẫn Dắt</div>
                            <div class="md-content-body">Chuyển đổi số doanh nghiệp đã sắp hoàn thiện, doanh nghiệp thực sự đã trở thành doanh nghiệp số với hầu hết các phương thức, mô hình kinh doanh chủ yếu dựa trên nền tảng, dữ liệu số. Doanh nghiệp ở mức này có khả năng dẫn dắt, tạo lập hệ sinh thái doanh nghiệp số vệ tinh.</div>
                        </div>
                        <span>Mức 5</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection