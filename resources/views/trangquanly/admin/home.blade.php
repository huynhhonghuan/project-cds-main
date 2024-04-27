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
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <h3 class="page-title mt-3">Good Morning {{ Auth::user()->name }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">{{ $taikhoan['soluong'] }}</h3>
                                    <h6 class="text-muted">Tài khoản trong hệ thống</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user-plus">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="20" y1="8" x2="20" y2="14"></line>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">{{ $chienluoc_soluong }}</h3>
                                    <h6 class="text-muted">Chiến lược trong hệ thống</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">{{ ($khaosat['soluong']) }}</h3>
                                    <h6 class="text-muted">Phiếu khảo sát</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-file-plus">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                            </path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="12" y1="18" x2="12" y2="12"></line>
                                            <line x1="9" y1="15" x2="15" y2="15"></line>
                                        </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">{{ $danhgia_soluong }}</h3>
                                    <h6 class="text-muted">Đánh giá và đề xuất</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 mb-5">
                    <div class="mx-auto" style="width: 550px; height: 550px;">
                        <canvas id="myChart{{ $taikhoan['id'] }}" width="100" height="100"></canvas>
                    </div>
                    <div class="text-center">
                        <button id="btnChart{{ $taikhoan['id'] }}" class="btn btn-outline-success mt-2">Xuất biểu đồ số
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

                <div class="col-md-6 mb-5">
                    <div class="mx-auto" style="width: 550px; height: 550px;">
                        <canvas id="myChart1{{ $khaosat['id'] }}" width="100" height="100"></canvas>
                    </div>
                    <div class="text-center">
                        <button id="btnChart{{ $khaosat['id'] }}" class="btn btn-outline-success mt-2">Xuất biểu đồ quy
                            mô phiếu khảo sát</button>
                    </div>
                    <script>
                        var data = @json($khaosat['khaosat']);
                        var labels = @json($khaosat['labels']);
                        var colors = @json($khaosat['colors']);

                        var ctx1 = document.getElementById('myChart1{{ $khaosat['id'] }}').getContext('2d');
                        if (data !== null)
                            drawChart(ctx1, labels, data, colors, 'doughnut', 'Quy mô phiếu khảo sát của doanh nghiệp');
                    </script>
                    <script>
                        document.getElementById('btnChart{{ $khaosat['id'] }}').addEventListener('click', function() {
                            html2canvas(document.querySelector("#myChart1{{ $khaosat['id'] }}")).then(canvas => {
                                // Tạo một đường dẫn cho hình ảnh
                                var imageData = canvas.toDataURL("image/png");

                                // Tạo một liên kết để tải xuống hình ảnh
                                var link = document.createElement('a');
                                link.download = 'bieu-do-quy-mo-khao-sat.png';
                                link.href = imageData;
                                link.click();
                            });
                        });
                    </script>
                </div>

                <div class="col-md-6 mb-5">
                    <div class="mx-auto" style="width: 550px; height: 550px;">
                        <canvas id="myChart1{{ $khaosat_huyen['id'] }}" width="100" height="100"></canvas>
                    </div>
                    <div class="text-center">
                        <button id="btnChart{{ $khaosat_huyen['id'] }}" class="btn btn-outline-success mt-2">Xuất biểu đồ phân bổ khảo sát</button>
                    </div>
                    <script>
                        var data = @json($khaosat_huyen['khaosat']);
                        var labels = @json($khaosat_huyen['labels']);
                        var colors = @json($khaosat_huyen['colors']);

                        var ctx2 = document.getElementById('myChart1{{ $khaosat_huyen['id'] }}').getContext('2d');
                        if (data !== null)
                            drawChart(ctx2, labels, data, colors, 'pie', 'Phân bổ theo huyện của các doanh nghiệp tham gia khảo sát');
                    </script>
                    <script>
                        document.getElementById('btnChart{{ $khaosat_huyen['id'] }}').addEventListener('click', function() {
                            html2canvas(document.querySelector("#myChart1{{ $khaosat_huyen['id'] }}")).then(canvas => {
                                // Tạo một đường dẫn cho hình ảnh
                                var imageData = canvas.toDataURL("image/png");

                                // Tạo một liên kết để tải xuống hình ảnh
                                var link = document.createElement('a');
                                link.download = 'bieu-phan-bo-khao-sat.png';
                                link.href = imageData;
                                link.click();
                            });
                        });
                    </script>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="mx-auto" style="width: 550px; height: 550px;">
                        <canvas id="myChart1{{ $mucdo_huyen['id'] }}" width="100" height="100"></canvas>
                        <div class="text-center">
                            <button id="btnChart{{ $mucdo_huyen['id'] }}" class="btn btn-outline-success mt-2">Xuất biểu đồ mức độ khảo sát</button>
                        </div>
                    </div>
                    <script>
                        var data1 = @json($mucdo_huyen['data1']);
                        var data2 = @json($mucdo_huyen['data2']);
                        var labels = @json($mucdo_huyen['labels']);
                        var colors = @json($mucdo_huyen['colors']);

                        var ctx4 = document.getElementById('myChart1{{ $mucdo_huyen['id'] }}').getContext('2d');

                        if (data1 !== null) {
                            const mixedChart = new Chart(ctx4, {
                                data: {
                                    datasets: [{
                                        type: 'bar',
                                        label: 'Điểm mức độ khảo sát',
                                        data: data1,
                                        backgroundColor: colors.map(color => color),
                                        borderColor: colors.map(color => color.replace('0.2', '1')),
                                        borderWidth: 2
                                    }, {
                                        type: 'line',
                                        label: 'Mức độ trung bình',
                                        data: data2,
                                        borderColor: 'rgb(54, 162, 235)'
                                    }],
                                    labels: labels
                                },
                                options: {
                                    scales: {
                                        x: {
                                            beginAtZero: true
                                        }
                                    },
                                    plugins: {
                                        title: {
                                            display: true,
                                            text: 'Biểu đồ thống kê mức độ khảo sát trung bình của các doanh nghiệp' // Tên của biểu đồ
                                        }
                                    }
                                }
                            });
                        }
                    </script>
                     <script>
                        document.getElementById('btnChart{{ $mucdo_huyen['id'] }}').addEventListener('click', function() {
                            html2canvas(document.querySelector("#myChart1{{ $mucdo_huyen['id'] }}")).then(canvas => {
                                // Tạo một đường dẫn cho hình ảnh
                                var imageData = canvas.toDataURL("image/png");

                                // Tạo một liên kết để tải xuống hình ảnh
                                var link = document.createElement('a');
                                link.download = 'bieu-do-muc-do-khao-sat.png';
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
