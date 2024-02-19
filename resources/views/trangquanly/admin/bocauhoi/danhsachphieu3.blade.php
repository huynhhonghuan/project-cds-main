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
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-8 p-5 bg-light mx-auto">
                        <h4 class="text-center">PHIẾU KHẢO SÁT SỐ 03</h4>
                        <h3 class="text-center mt-3">RÀO CẢN CHUYỂN ĐỔI SỐ TRONG DOANH NGHIỆP NHỎ VÀ VỪA</h3>
                        <h5 class="fw-bold mt-5">1. Thông tin doanh nghiệp</h5>
                        <div style="margin-left: 25px;">
                            <h6 class="mt-3">Tên doanh nghiệp:</h6>
                            <h6 class="mt-3">Người đại diện:</h6>
                            <h6 class="mt-3">Lĩnh vực hoạt động:</h6>
                            <h6 class="mt-3">Ngày thành lập:</h6>
                            <h6 class="mt-3">Địa chỉ:</h6>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="mt-2">Điện thoại:</h6>
                                </div>
                                <div class="col-6">
                                    <h6 class="mt-2">Fax:</h6>
                                </div>
                            </div>
                            <h6 class="mt-2">Email:</h6>
                        </div>
                        <h5 class="fw-bold mt-3">2. Nội dung</h5>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="">
                                    <div class="card-body p-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" rowspan="2" class="pb-5">TT</th>
                                                        <th scope="col" width="60%" rowspan="2" class="pb-5">Câu
                                                            hỏi</th>
                                                        <th scope="col" colspan="5">
                                                            Mức độ <br> (Đánh dấu X vào 1 trong 5 ô bên dưới)
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            1- hoàn <br> toàn <br> không <br> đồng <br> ý
                                                        </th>
                                                        <th>
                                                            2-phần <br> lớn <br> không <br> đồng <br> ý
                                                        </th>
                                                        <th>
                                                            3-phân <br> vân
                                                        </th>
                                                        <th>
                                                            4-phần <br> lớn <br> đồng <br> ý
                                                        </th>
                                                        <th>
                                                            5-hoàn <br> toàn <br> đồng <br> ý
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($danhsach as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->tencauhoi }}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
@endsection
