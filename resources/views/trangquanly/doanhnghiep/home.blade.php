@extends('trangquanly.doanhnghiep.layout'){{-- kế thừa form layout --}}
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="../assets/mychart.js"></script>
@endsection
@section('content')
    {{-- thêm content vào form kế thừa chỗ @yield('content') --}}
    {!! Toastr::message() !!}

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row" style="border-bottom : 2px solid #009688">
                    <div class="col-sm-12 mt-5 d-flex align-items-center">
                        <h4 class="mt-3">Xin chào <span class="text-uppercase" style="color:#1460f7;font-weight: 600">
                                {{ Auth::user()->name ?? Auth::user()->getdoanhnghiep->tentiengviet }}
                        </span></h4>
                        <div class="mt-3 col d-flex" style="justify-content: end;margin-bottom:5px">
                            <div class="actions">
                                <span style="padding-right: 12px;font-size:16px;font-weight:600;text-transform:uppercase">Website của doanh nghiệp </span>
                                @if(Auth::user()->getdoanhnghiep->website == null)
                                <a class="btn btn-sm mr-2 bg-warning" href="{{ route('doanhnghiep.profile') }}">Chưa cập nhật
                                </a>
                                @else
                                <a target="_blank" href="{{Auth::user()->getdoanhnghiep->website}}">
                                    <button class="btn btn-primary">Đến website</button>
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="mt-3 col d-flex" style="justify-content: center;margin-bottom:5px">
                            <div class="actions">
                                <span style="padding-right: 12px;font-size:16px;font-weight:600;text-transform:uppercase">Công Khai Thông Tin : </span>
                                <a href="{{ route('doanhnghiep.duyet', Auth::user()->getDoanhNghiep->id) }}"
                                    class="btn btn-sm mr-2 {{ Auth::user()->getDoanhNghiep->trangthai == 1 ?'bg-success-light':'bg-danger-light'}}">
                                    {{ Auth::user()->getDoanhNghiep->trangthai == 1 ? 'Công Khai' : 'Không Công Khai' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($khaosat as $item)
                <div class="row">
                    <div class="col-3">
                        <h5>Khảo sát lần {{ $item['lan'] }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card board1 fill">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <div>
                                        <h3 class="card_widget_header">
                                            {{ $item['trangthai'] == 2 ? 'Đã đề xuất' : ($item['trangthai'] == 1 ? 'Hoàn thành khảo sát' : 'Chưa hoàn thành') }}
                                        </h3>
                                        <h6 class="text-muted">Trạng thái</h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <i class="fa-regular fa-circle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card board1 fill">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <div>
                                        <h3 class="card_widget_header">{{ $item['tongdiem'] }}</h3>
                                        <h6 class="text-muted">Điểm</h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0"> <i class="fa-regular fa-star"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card board1 fill">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <div>
                                        <h3 class="card_widget_header">{{ $item['soluongdanhgia'] }}</h3>
                                        <h6 class="text-muted">Đánh giá và đề xuất từ chuyên gia</h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        @if ($item['trangthai'] == 2)
                                            <a href="{{ route('doanhnghiep.danhgia.xem', ['id' => $item['id']]) }}"><i
                                                    class="fa-solid fa-arrow-right-to-bracket"></i></a>
                                        @else
                                            <a href="#"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card board1 fill">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <div>
                                        <h3 class="card_widget_header">{{ $item['trangthai'] == 2 ? 'Xem' : 'Chưa có'}}</h3>
                                        <h6 class="text-muted">Chiến lược đề xuất</h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        @if ($item['trangthai'] == 2)
                                            <a href="{{ route('doanhnghiep.chienluoc.xem', ['id' => $item['id']]) }}">
                                                <i class="fa-solid fa-arrow-right-to-bracket"></i> </a>
                                        @else
                                            <a href="#">
                                                <i class="fa-solid fa-arrow-right-to-bracket"></i> </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="mx-auto" style="width: 500px; height: 500px;">
                            <canvas id="myChart{{ $item['id'] }}" width="100" height="100"></canvas>
                        </div>
                        <script>
                            // Lấy dữ liệu từ controller và chuyển đổi thành JavaScript
                            var data = @json($item['trucot']);
                            var labels = @json($item['trucot_labels']);
                            var colors = @json($item['colors']);
                            // Vẽ biểu đồ myChart
                            var ctx = document.getElementById('myChart{{ $item['id'] }}').getContext('2d');
                            if (data !== null)
                                drawChart(ctx, labels, data, colors, 'polarArea', 'Kết quả thế mạnh về chuyển đổi số');
                        </script>
                    </div>

                    <div class="col-md-6">
                        <div class="mx-auto" style="width: 500px; height: 500px;">
                            <canvas id="myChart1{{ $item['id'] }}" width="100" height="100"></canvas>
                        </div>
                        <script>
                            var data = @json($item['mucdo']);
                            var labels = @json($item['mucdo_labels']);
                            var colors = @json($item['colors']);

                            var ctx1 = document.getElementById('myChart1{{ $item['id'] }}').getContext('2d');
                            if (data !== null)
                                drawChart(ctx1, labels, data, colors, 'line', 'Kết quả mức độ về chuyển đổi số');
                        </script>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
@endsection
