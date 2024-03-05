@extends('trangquanly.doanhnghiep.layout'){{-- kế thừa form layout --}}

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
                        <div class="progress-bar bg-light-1" style="width: 1%">0%</div>
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
                                    <h4 class="btn btn-outline-warning"> Chưa hoàn thành</h4>
                                </div>
                                <div class="col-5">
                                    <h4 class="btn btn-outline-warning">0/60 câu hỏi</h4>
                                </div>
                            </div>
                            <img src="{{ URL::to('public/assets/backend/img/khaosat/phieu1.png') }}" alt=""
                                style="height: 50%;">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="px-5 text-warning mt-2"> Phiếu 1</h4>

                                </div>
                                <div class="col-4">
                                    <a href="" class="btn"><i class="fa-solid fa-circle-right"
                                            style="font-size: 40px; color: rgb(72, 72, 182);"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mx-auto">
                        <div class="mx-auto border  border-info p-4">
                            <div class="row">
                                <div class="col-7">
                                    <h4 class="btn btn-outline-info"> Chưa hoàn thành</h4>
                                </div>
                                <div class="col-5">
                                    <h4 class="btn btn-outline-info">0/29 câu hỏi</h4>
                                </div>
                            </div>
                            <img src="{{ URL::to('public/assets/backend/img/khaosat/phieu2.png') }}" alt=""
                                style="height: 50%;">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="px-5 text-warning mt-2"> Phiếu 2</h4>

                                </div>
                                <div class="col-4">
                                    <a href="" class="btn"><i class="fa-solid fa-circle-right"
                                            style="font-size: 40px; color: rgb(72, 72, 182);"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mx-auto">
                        <div class="mx-auto border border-danger p-4">
                            <div class="row">
                                <div class="col-7">
                                    <h4 class="btn btn-outline-danger"> Chưa hoàn thành</h4>
                                </div>
                                <div class="col-5">
                                    <h4 class="btn btn-outline-danger">0/9 câu hỏi</h4>
                                </div>
                            </div>
                            <img src="{{ URL::to('public/assets/backend/img/khaosat/phieu3.png') }}" alt=""
                                style="height: 50%;">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="px-5 text-warning mt-2"> Phiếu 3</h4>

                                </div>
                                <div class="col-4">
                                    <a href="" class="btn"><i class="fa-solid fa-circle-right"
                                            style="font-size: 40px; color: rgb(72, 72, 182);"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mx-auto">
                        <div class="mx-auto border  border-success p-4">
                            <div class="row">
                                <div class="col-7">
                                    <h4 class="btn btn-outline-success"> Chưa hoàn thành</h4>
                                </div>
                                <div class="col-5">
                                    <h4 class="btn btn-outline-success">0/2 câu hỏi</h4>
                                </div>
                            </div>
                            <img src="{{ URL::to('public/assets/backend/img/khaosat/phieu4.png') }}" alt=""
                                style="height: 50%;">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="px-5 text-warning mt-2"> Phiếu 4</h4>

                                </div>
                                <div class="col-4">
                                    <a href="" class="btn"><i class="fa-solid fa-circle-right"
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