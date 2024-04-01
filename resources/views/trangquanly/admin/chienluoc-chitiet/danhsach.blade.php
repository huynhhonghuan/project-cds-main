@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}

@section('head')
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
@endsection

@section('content')
    {{-- thêm content vào form kế thừa chỗ @yield('content') --}}
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">{{ $tendanhsach }}</h4>
                            {{-- <a href="{{ route('admin.chienluoc.them') }}"
                                class="btn btn-primary float-right veiwbutton ">Thêm
                                chiến lược</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row bg-white">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 roles_class">
                    <div class="roles-menu">
                        <h6 class="mx-1">Doanh nghiệp</h6>
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified bg-white" style="display: block;">
                            <li class="nav-item text-left"><a class="nav-link active" href="#bottom-justified-tab1"
                                    data-toggle="tab">Trồng lúa nước</a>
                            </li>
                            <li class="nav-item text-left"><a class="nav-link" href="#bottom-justified-tab2"
                                    data-toggle="tab">Profile</a>
                            </li>
                            <li class="nav-item text-left"><a class="nav-link" href="#bottom-justified-tab3"
                                    data-toggle="tab">Messages</a>
                            </li>
                            <li class="nav-item text-left"><a class="nav-link" href="#bottom-justified-tab2"
                                    data-toggle="tab">Profile</a>
                            </li>
                            <li class="nav-item text-left"><a class="nav-link" href="#bottom-justified-tab3"
                                    data-toggle="tab">Messages</a>
                            </li>
                            <li class="nav-item text-left"><a class="nav-link" href="#bottom-justified-tab2"
                                    data-toggle="tab">Profile</a>
                            </li>
                            <li class="nav-item text-left"><a class="nav-link" href="#bottom-justified-tab3"
                                    data-toggle="tab">Messages</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 roles_class">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="bottom-justified-tab1">
                            <h6 class="card-title m-b-20">Doanh nghiệp Trồng lúa nước thuộc lĩnh vực Nông nghiệp</h6>
                            <div class="m-b-30">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="text-success">Khách hàng:</span>
                                        Employee
                                        <div class="material-switch float-right">
                                            {{-- <a href="#">Xem chi tiết</a> | --}}
                                            <a href="#" class="text-warning"> Thay thế</a>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="text-success">Chiến lược:</span>
                                        Employee
                                        <div class="material-switch float-right">
                                            {{-- <a href="#">Xem chi tiết</a> | --}}
                                            <a href="#" class="text-warning"> Thay thế</a>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="text-success">Công nghệ:</span>
                                        Employee
                                        <div class="material-switch float-right">
                                            {{-- <a href="#">Xem chi tiết</a> | --}}
                                            <a href="#" class="text-warning"> Thay thế</a>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="text-success">Vận hành:</span>
                                        Employee
                                        <div class="material-switch float-right">
                                            {{-- <a href="#">Xem chi tiết</a> | --}}
                                            <a href="#" class="text-warning"> Thay thế</a>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="text-success">Văn hóa:</span>
                                        Employee
                                        <div class="material-switch float-right">
                                            {{-- <a href="#">Xem chi tiết</a> | --}}
                                            <a href="#" class="text-warning"> Thay thế</a>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="text-success">Dữ liệu:</span>
                                        Employee
                                        <div class="material-switch float-right">
                                            {{-- <a href="#">Xem chi tiết</a> | --}}
                                            <a href="#" class="text-warning"> Thay thế</a>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-justified-tab2">
                            Tab content 2
                        </div>
                        <div class="tab-pane" id="bottom-justified-tab3">
                            Tab content 3
                        </div>
                    </div>



                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
@endsection
