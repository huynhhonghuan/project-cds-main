@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('style')
    {{-- Ẩn hiện mật khẩu --}}
    </style>
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">
                            {{-- <a href="{{ route('admin.chienluoc.danhsach') }}" class="btn"><i
                                    class="fa-solid fa-arrow-left"></i></a> --}}
                            <span id="title-tendanhsach"> {{ $tendanhsach }} </span>
                        </h3>
                    </div>
                    {{-- <div class="col me-auto mt-5">
                        <a href="{{ route('admin.chienluoc.sua', $user->id) }}"
                            class="btn btn-primary float-right veiwbutton ">{{ $suataikhoan }}</a>
                    </div> --}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card pt-1">
                        <div class="card-header">
                            {{-- <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-light-1" style="width: 1%">0%</div>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                <li class="nav-item"><a class="nav-link active tab-tab1"
                                        href="#solid-rounded-justified-tab1" data-toggle="tab">Mô hình</a></li>
                                <li class="nav-item"><a class="nav-link tab-tab2" href="#solid-rounded-justified-tab2"
                                        data-toggle="tab">Quy mô</a></li>
                                <li class="nav-item"><a class="nav-link tab-tab3" href="#solid-rounded-justified-tab3"
                                        data-toggle="tab">Lộ trình</a></li>
                                <li class="nav-item"><a class="nav-link tab-tab4" href="#solid-rounded-justified-tab4"
                                        data-toggle="tab">Lưu ý</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                                    <div class="row">
                                        @if ($danhsach->hinhanh != null)
                                            <div class="col-4 mt-3 mx-auto">
                                                <img class="w-100 h-75"
                                                    src="{{ URL::to('public/assets/backend/img/mohinh/' . $danhsach->hinhanh) }}"
                                                    alt="Hình">
                                            </div>
                                        @else
                                            <div class="col-4 m-auto">
                                                <h3 class="text-center text-danger">Chưa có hình ảnh!</h3>
                                            </div>
                                        @endif

                                        <div class="col-6 mt-3 mx-auto">
                                            <h3 class="text-center text-info mt-3">{{ $danhsach->tenmohinh }}</h3>
                                            <hr>
                                            <p class="fs-3">{!! $danhsach->noidung !!}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="solid-rounded-justified-tab2">
                                    @if ($danhsach->getlotrinh != null)
                                        <div class="row">
                                            <div class="col-4 mt-3">
                                                <h3 class="text-center text-info">Thời gian chuyển đổi</h3>

                                                <img class="w-100 h-75"
                                                    src="{{ URL::to('public/assets/backend/img/mohinh/thoigian.png') }}"
                                                    alt="Hình">
                                                <hr class="bg-info">

                                                <h3 class="text-center text-info mt-2">Dự tính
                                                    {{ $danhsach->getlotrinh->thoigian }} năm</h3>
                                            </div>

                                            <div class="col-4 mt-3">
                                                <h3 class="text-center text-danger">Số lượng nhân sự</h3>
                                                {{-- <hr class="bg-danger"> --}}

                                                <img class="w-100 h-75"
                                                    src="{{ URL::to('public/assets/backend/img/mohinh/nhansu.png') }}"
                                                    alt="Hình">

                                                <hr class="bg-danger">

                                                <h3 class="text-center text-danger mt-2">Khoảng
                                                    {{ $danhsach->getlotrinh->nhansu }} người
                                                </h3>
                                            </div>

                                            <div class="col-4 mt-3">
                                                <h3 class="text-center text-warning">Kinh tế tài chính</h3>

                                                <img class="w-100 h-75"
                                                    src="{{ URL::to('public/assets/backend/img/mohinh/kinhte.png') }}"
                                                    alt="Hình">
                                                <hr class="bg-warning">

                                                <h3 class="text-center text-warning mt-2">Cần khoảng
                                                    {{ $danhsach->getlotrinh->taichinh }}
                                                    VND</h3>
                                            </div>

                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-12 my-5 py-5">
                                                <h3 class="text-center text-warning"> Chưa có quy mô về thời gian, số lượng
                                                    nhân sự và tài chính kinh tế cho mô hình</h3>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="tab-pane" id="solid-rounded-justified-tab3">
                                    @if ($danhsach->getlotrinh != null)
                                        <div class="row">
                                            <div class="col-3 my-auto">
                                                <img class="w-100 h-75"
                                                    src="{{ URL::to('public/assets/backend/img/mohinh/lotrinh.png') }}"
                                                    alt="Hình">
                                            </div>

                                            @if ($danhsach->getlotrinh->noidung != null)
                                                <div class="col-8 mx-auto my-auto">
                                                    <div class="text-center">{!! $danhsach->getlotrinh->noidung !!}</div>
                                                </div>
                                            @else
                                                <div class="col-8 mx-auto my-auto">
                                                    <h4 class="text-center text-danger">Hiện tại chưa có lộ trình
                                                        chuyển đổi số
                                                        cho mô hình</h4>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-12 my-5 py-5">
                                                <h3 class="text-center text-info"> Chưa có lộ trình cụ thể cho mô hình
                                                </h3>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="tab-pane" id="solid-rounded-justified-tab4">
                                    @if ($danhsach->getlotrinh != null)
                                        <div class="row">
                                            <div class="col-3 my-auto">
                                                <img class="w-100 h-75"
                                                    src="{{ URL::to('public/assets/backend/img/mohinh/luuy.png') }}"
                                                    alt="Hình">
                                            </div>
                                            @if ($danhsach->getlotrinh->luuy != null)
                                                <div class="col-8 mx-auto my-auto">
                                                    <div class="text-center">{!! $danhsach->getlotrinh->luuy !!}</div>
                                                </div>
                                            @else
                                                <div class="col-8 mx-auto my-auto">
                                                    <h4 class="text-center text-danger">Hiện tại chưa có lưu ý cho lộ trình
                                                        chuyển đổi số
                                                        cho mô hình</h4>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-12 my-5 py-5">
                                                <h3 class="text-center text-danger"> Chưa có lưu ý cho mô hình</h3>
                                            </div>
                                        </div>
                                    @endif


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
