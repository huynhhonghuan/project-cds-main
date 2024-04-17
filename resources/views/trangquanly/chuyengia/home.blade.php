@extends('trangquanly.chuyengia.layout'){{-- kế thừa form layout --}}
@section('content'){{-- thêm content vào form kế thừa chỗ @yield('content') --}}
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <h3 class="page-title mt-3">Good Morning {{ Auth::user()->id }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card board1 fill">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <div>
                                        <h3 class="card_widget_header">150
                                        </h3>
                                        <h6 class="text-muted">Chiến lược trong hệ thống</h6>
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
                                        <h3 class="card_widget_header">12</h3>
                                        <h6 class="text-muted">Chiên lược tự đề xuất</h6>
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
                                        <h3 class="card_widget_header">130</h3>
                                        <h6 class="text-muted">Phiếu khảo sát - cùng lĩnh vực</h6>
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
                                        <h3 class="card_widget_header">120</h3>
                                        <h6 class="text-muted">Số lần đánh giá</h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        {{-- @if ($item['trangthai'] == 2)
                                            <a href="{{ route('doanhnghiep.danhgia.xem', ['id' => $item['id']]) }}"><i
                                                    class="fa-solid fa-arrow-right-to-bracket"></i></a>
                                        @else
                                            <a href="#"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                                        @endif --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    @endsection
