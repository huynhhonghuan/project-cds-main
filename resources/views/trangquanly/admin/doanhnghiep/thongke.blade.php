@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="../assets/mychart.js"></script>
    <script src="{{ ENV('APP_URL') }}/assets/html12canvas.js"></script>
@endsection
@section('content')
    {{-- thêm content vào form kế thừa chỗ @yield('content') --}}
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row mb-5">
                <div class="col-md-6 mb-5">
                    <div class="mx-auto" style="width: 550px; height: 550px;">
                        <canvas id="myChart" width="100" height="100"></canvas>
                    </div>
                    <div class="text-center">
                        <button id="btnChart" class="btn btn-outline-success mt-2">Xuất biểu đồ số
                            lượng tài khoản</button>
                    </div>
                    <script>
                        // Lấy dữ liệu từ controller và chuyển đổi thành JavaScript
                        var data = @json($taikhoan['taikhoan']);
                        var labels = @json($taikhoan['labels']);
                        var colors = @json($taikhoan['colors']);
                        // Vẽ biểu đồ myChart
                        var ctx = document.getElementById('myChart{{ $taikhoan['id'] }}').getContext('2d');
                        if (data !== null)
                            drawChart(ctx, labels, data, colors, 'bar', 'Sơ đồ số lượng tài khoản');
                    </script>
                    <script>
                        document.getElementById('btnChart{{ $taikhoan['id'] }}').addEventListener('click', function() {
                            html2canvas(document.querySelector("#myChart{{ $taikhoan['id'] }}")).then(canvas => {
                                // Tạo một đường dẫn cho hình ảnh
                                var imageData = canvas.toDataURL("image/png");

                                // Tạo một liên kết để tải xuống hình ảnh
                                var link = document.createElement('a');
                                link.download = 'bieu-do-so-luong-tai-khoan.png';
                                link.href = imageData;
                                link.click();
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
