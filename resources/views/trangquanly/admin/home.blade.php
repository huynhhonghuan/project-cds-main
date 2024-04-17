@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="../assets/mychart.js"></script>
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
                                    <h3 class="card_widget_header">{{$khaosat['soluong']}}</h3>
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
                                    <h3 class="card_widget_header">{{$danhgia_soluong}}</h3>
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
                <div class="col-md-6">
                    <div class="mx-auto" style="width: 500px; height: 500px;">
                        <canvas id="myChart{{ $taikhoan['id'] }}" width="100" height="100"></canvas>
                    </div>
                    <script>
                        // Lấy dữ liệu từ controller và chuyển đổi thành JavaScript
                        var data = @json($taikhoan['taikhoan']);
                        var labels = @json($taikhoan['labels']);
                        var colors = @json($taikhoan['colors']);
                        // Vẽ biểu đồ myChart
                        var ctx = document.getElementById('myChart{{ $taikhoan['id'] }}').getContext('2d');
                        if (data !== null)
                            drawChart(ctx, labels, data, colors, 'doughnut', 'Sơ đồ số lượng tài khoản');
                    </script>
                </div>

                <div class="col-md-6">
                    <div class="mx-auto" style="width: 500px; height: 500px;">
                        <canvas id="myChart1{{ $khaosat['id'] }}" width="100" height="100"></canvas>
                    </div>
                    <script>
                        var data = @json($khaosat['khaosat']);
                        var labels = @json($khaosat['labels']);
                        var colors = @json($khaosat['colors']);

                        var ctx1 = document.getElementById('myChart1{{ $khaosat['id'] }}').getContext('2d');
                        if (data !== null)
                            drawChart(ctx1, labels, data, colors, 'doughnut', 'Quy mô phiếu khảo sát của doanh nghiệp');
                    </script>
                </div>
            </div>

        </div>
    </div>
@endsection
