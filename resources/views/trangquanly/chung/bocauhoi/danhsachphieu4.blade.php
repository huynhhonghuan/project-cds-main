@extends($layout){{-- kế thừa form layout --}}

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
                    <div class="col-7 p-5 bg-light mx-auto">
                        <h4 class="text-center">PHIẾU KHẢO SÁT SỐ 04</h4>
                        <h3 class="text-center mt-3">Ý KIẾN CỦA DOANH NGHIỆP VỀ CHUYỂN ĐỔI SỐ </h3>
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
                        <h5 class="fw-bold mt-3">2. Nhu cầu về dịch vụ Công nghệ thông tin/Chuyển đổi số</h5>
                        <p>……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ………………
                            ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ………………
                            ……………… ……………… ……………… ……………… ……………… ………………</p>
                        <h5 class="fw-bold mt-3">3. Hỏi/ đáp hoặc đề xuất</h5>
                        <p>……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ………………
                            ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ……………… ………………
                            ……………… ……………… ……………… ……………… ……………… ………………</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
@endsection
