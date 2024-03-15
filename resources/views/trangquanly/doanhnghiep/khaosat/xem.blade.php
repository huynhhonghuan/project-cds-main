@extends('trangquanly.doanhnghiep.layout'){{-- kế thừa form layout --}}

@section('head')
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
@endsection

@section('style')
    <style>
        .bg-light-1 {
            background-color: rgb(131, 199, 131);
        }

        .bg-green {
            background-color: rgb(122, 201, 43);
        }
    </style>
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

                            <a href="{{ route('admin.chienluoc.them') }}"
                                class="btn btn-primary float-right veiwbutton ">Chưa có đánh giá và đề xuất</a>

                            <a href="{{ route('admin.chienluoc.them') }}"
                                class="btn btn-primary float-right veiwbutton mx-2">Chưa có chiến lược đề xuất</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-2 mt-1">
                    <h6> Phần trăm hoàn thành:</h6>
                </div>
                <div class="col-10 mt-2">
                    <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-light"
                            style="width: {{ $khaosat->getdanhsachphieu1->soluonghoanthanh + $khaosat->getdanhsachphieu2->soluonghoanthanh + $khaosat->getdanhsachphieu3->soluonghoanthanh + $khaosat->getdanhsachphieu4->soluonghoanthanh }}%">
                            {{ $khaosat->getdanhsachphieu1->soluonghoanthanh + $khaosat->getdanhsachphieu2->soluonghoanthanh + $khaosat->getdanhsachphieu3->soluonghoanthanh + $khaosat->getdanhsachphieu4->soluonghoanthanh }}%
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="">
                        <h4 class="text-center text-secondary">Khảo sát lần {{ $solankhaosat }} - ngày
                            {{ $khaosat->thoigiantao }}</h4>
                        <hr class="col-3">
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mx-auto">
                        <div class="mx-auto border  border-warning p-4">
                            <div class="row">
                                <div class="col-7">
                                    @if ($khaosat->getdanhsachphieu1->trangthai == 1)
                                        <h4 class="btn btn-outline-success"> Hoàn thành</h4>
                                    @else
                                        <h4 class="btn btn-outline-warning"> Chưa hoàn thành</h4>
                                    @endif
                                </div>
                                <div class="col-5">
                                    <h4 class="btn btn-outline-warning">
                                        {{ $khaosat->getdanhsachphieu1->soluonghoanthanh }}/60 câu hỏi</h4>
                                </div>
                            </div>
                            <img src="{{ URL::to('public/assets/backend/img/khaosat/phieu1.png') }}" alt=""
                                style="height: 50%;">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="px-5 text-warning mt-2"> Phiếu 1</h4>

                                </div>
                                <div class="col-4">
                                    <a href="{{ route('doanhnghiep.khaosat.phieu1', ['id' => $khaosat->id]) }}"
                                        class="btn"><i class="fa-solid fa-circle-right"
                                            style="font-size: 40px; color: rgb(72, 72, 182);"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mx-auto">
                        <div class="mx-auto border  border-info p-4">
                            <div class="row">
                                <div class="col-7">
                                    @if ($khaosat->getdanhsachphieu1->trangthai == 1)
                                        <h4 class="btn btn-outline-success"> Hoàn thành</h4>
                                    @else
                                        <h4 class="btn btn-outline-info"> Chưa hoàn thành</h4>
                                    @endif
                                </div>
                                <div class="col-5">
                                    <h4 class="btn btn-outline-info">{{ $khaosat->getdanhsachphieu2->soluonghoanthanh }}/29
                                        câu hỏi</h4>
                                </div>
                            </div>
                            <img src="{{ URL::to('public/assets/backend/img/khaosat/phieu2.png') }}" alt=""
                                style="height: 50%;">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="px-5 text-warning mt-2"> Phiếu 2</h4>

                                </div>
                                <div class="col-4">
                                    <a href="{{ route('doanhnghiep.khaosat.phieu2', ['id' => $khaosat->id]) }}"
                                        class="btn"><i class="fa-solid fa-circle-right"
                                            style="font-size: 40px; color: rgb(72, 72, 182);"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mx-auto">
                        <div class="mx-auto border border-danger p-4">
                            <div class="row">
                                <div class="col-7">
                                    @if ($khaosat->getdanhsachphieu3->trangthai == 1)
                                        <h4 class="btn btn-outline-success"> Hoàn thành</h4>
                                    @else
                                        <h4 class="btn btn-outline-danger"> Chưa hoàn thành</h4>
                                    @endif
                                </div>
                                <div class="col-5">
                                    <h4 class="btn btn-outline-danger">
                                        {{ $khaosat->getdanhsachphieu3->soluonghoanthanh }}/9
                                        câu hỏi</h4>
                                </div>
                            </div>
                            <img src="{{ URL::to('public/assets/backend/img/khaosat/phieu3.png') }}" alt=""
                                style="height: 50%;">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="px-5 text-warning mt-2"> Phiếu 3</h4>

                                </div>
                                <div class="col-4">
                                    <a href="{{ route('doanhnghiep.khaosat.phieu3', ['id' => $khaosat->id]) }}"
                                        class="btn"><i class="fa-solid fa-circle-right"
                                            style="font-size: 40px; color: rgb(72, 72, 182);"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mx-auto">
                        <div class="mx-auto border  border-success p-4">
                            <div class="row">
                                <div class="col-7">
                                    @if ($khaosat->getdanhsachphieu4->trangthai == 1)
                                        <h4 class="btn btn-outline-success"> Hoàn thành</h4>
                                    @else
                                        <h4 class="btn btn-outline-success"> Chưa hoàn thành</h4>
                                    @endif
                                </div>
                                <div class="col-5">
                                    <h4 class="btn btn-outline-success">
                                        {{ $khaosat->getdanhsachphieu4->soluonghoanthanh }}/2 câu hỏi</h4>
                                </div>
                            </div>
                            <img src="{{ URL::to('public/assets/backend/img/khaosat/phieu4.png') }}" alt=""
                                style="height: 50%;">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="px-5 text-warning mt-2"> Phiếu 4</h4>

                                </div>
                                <div class="col-4">
                                    <a href="{{ route('doanhnghiep.khaosat.phieu4', ['id' => $khaosat->id]) }}"
                                        class="btn"><i class="fa-solid fa-circle-right"
                                            style="font-size: 40px; color: rgb(72, 72, 182);"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                </div>

            </div>

        </div>

    </div>
@endsection

@section('script')
    <script>
        function setProressbar(bgcolor) {
            // Lấy phần tử div
            var progressBar = document.querySelector(".progress-bar");
            //xóa màu nền trước đó
            progressBar.classList.remove(progressBar.classList[1]);
            //thêm màu nền
            progressBar.classList.add(bgcolor);
            // // // Đặt lại giá trị width
            // progressBar.style.width = width;
            // // // Đặt lại nội dung bên trong div
            // progressBar.innerHTML = content;
            // alert(progressBar);
        }
        //load lại trang và set lại select
        window.addEventListener("load", function() {
            try {
                var progressBar = document.querySelector(".progress-bar");
                var width = progressBar.style.width.replace(/%/g, "");
                if (width >= 0 && width <= 20) {
                    setProressbar('bg-light-1');
                }
                if (width > 20 && width <= 40) {
                    setProressbar('bg-green');
                }
                if (width > 40 && width <= 60) {
                    setProressbar('bg-success');
                }
                if (width > 60 && width <= 80) {
                    setProressbar('bg-warning');
                }
                if (width > 80 && width <= 100) {
                    setProressbar('bg-danger');
                }
            } catch (error) {
                console.error("Lỗi:", error);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table-custom').DataTable({
                //disable sorting on last column
                "columnDefs": [{
                    "orderable": false,
                    "targets": 3
                }],
                language: {
                    //customize pagination prev and next buttons: use arrows instead of words
                    'paginate': {
                        'previous': '<span class="fa fa-chevron-left"></span>',
                        'next': '<span class="fa fa-chevron-right"></span>'
                    },
                    //customize number of elements to be displayed
                    "lengthMenu": 'Hiển thị <select class="form-control input-sm">' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="30">30</option>' +
                        '<option value="40">40</option>' +
                        '<option value="50">50</option>' +
                        '<option value="100">100</option>' +
                        '<option value="-1">Tất cả</option>' +
                        '</select> số lượng',

                    "zeroRecords": "Nothing found - sorry",
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                    "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                    "search": "Tìm kiếm:",
                }
            })
        });
    </script>
@endsection
