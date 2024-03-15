@extends($layout){{-- kế thừa form layout --}}

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
                            {{-- <a href="{{ route('admin.tintuc.them') }}" class="btn btn-primary float-right veiwbutton ">Thêm
                                tin tức</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card pt-1">
                        <div class="card-header">
                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-light-1" style="width: 1%">0%</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                <li class="nav-item"><a class="nav-link active tab-tab1"
                                        href="#solid-rounded-justified-tab1" data-toggle="tab">Mức 0</a></li>
                                <li class="nav-item"><a class="nav-link tab-tab2" href="#solid-rounded-justified-tab2"
                                        data-toggle="tab">Mức 1</a></li>
                                <li class="nav-item"><a class="nav-link tab-tab3" href="#solid-rounded-justified-tab3"
                                        data-toggle="tab">Mức 2</a></li>
                                <li class="nav-item"><a class="nav-link tab-tab4" href="#solid-rounded-justified-tab4"
                                        data-toggle="tab">Mức 3</a></li>
                                <li class="nav-item"><a class="nav-link tab-tab5" href="#solid-rounded-justified-tab5"
                                        data-toggle="tab">Mức 4</a></li>
                                <li class="nav-item"><a class="nav-link tab-tab6" href="#solid-rounded-justified-tab6"
                                        data-toggle="tab">Mức 5</a></li>
                            </ul>
                            <div class="tab-content">
                                @foreach ($mucdo as $value)
                                    @if ($loop->iteration == 1)
                                        <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                                            <div class="row">
                                                <div class="col mt-5">
                                                    <div class="d-flex justify-content-end"> <a
                                                            class="btn btn-outline-info"><i
                                                                class="fa-regular fa-pen-to-square"></i> Sửa</a>
                                                    </div>
                                                    <h3 class="text-center">{{ $value->tenmucdo }}</h3>
                                                    <div class="d-flex justify-content-center mt-3">Từ {{ $value->diem }}
                                                        điểm</div>
                                                    <hr class="w-25">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mt-3 mx-auto">
                                                    <p class="fs-3">{{ $value->noidung }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($loop->iteration == $mucdo->count())
                                        <div class="tab-pane" id="solid-rounded-justified-tab{{ $loop->iteration }}">
                                            <div class="row">
                                                <div class="col mt-5">
                                                    <div class="d-flex justify-content-end"> <a
                                                            class="btn btn-outline-info"><i
                                                                class="fa-regular fa-pen-to-square"></i> Sửa</a>
                                                    </div>
                                                    <h3 class="text-center">{{ $value->tenmucdo }}</h3>
                                                    <div class="d-flex justify-content-center mt-3">Tối đa
                                                        {{ $value->diem }}
                                                        điểm</div>
                                                    <hr class="w-25">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mt-3 mx-auto">
                                                    <p class="fs-3">{{ $value->noidung }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="tab-pane" id="solid-rounded-justified-tab{{ $loop->iteration }}">
                                            <div class="row">
                                                <div class="col mt-5">
                                                    <div class="d-flex justify-content-end"> <a
                                                            class="btn btn-outline-info"><i
                                                                class="fa-regular fa-pen-to-square"></i> Sửa</a>
                                                    </div>
                                                    <h3 class="text-center">{{ $value->tenmucdo }}</h3>
                                                    <div class="d-flex justify-content-center mt-3">Từ {{ $value->diem }}
                                                        điểm</div>
                                                    <hr class="w-25">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mt-3 mx-auto">
                                                    <p class="fs-3">{{ $value->noidung }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Model xem nội dung bao gồm tóm tắt và nội dung chi tiết --}}
        <div id="xem_noidung" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tóm tắt</h1>
                    </div>
                    <div class="modal-body">
                        <div class="" id="xemtomtat"></div>
                    </div>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nội dung</h1>
                    </div>
                    <div class="modal-body">
                        <div class="modal-noidung" id="xemnoidung"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Kết thúc xem nội dung --}}

        {{-- Model delete xóa 1 bài báo --}}
        <div id="delete_asset" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('admin.tintuc.xoa') }}" method="POST">
                        @csrf
                        <div class="modal-body text-center"> <img src="{{ URL::to('assets/img/sent.png') }}"
                                alt="" width="50" height="46">
                            <h3 class="delete_class">Bạn thật sự muốn xóa tin tức này?</h3>
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                                <input class="form-control" type="hidden" id="e_id" name="id"
                                    value="">
                                <input class="form-control" type="hidden" id="e_fileupload" name="hinhanh"
                                    value="">
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Model delete --}}
    </div>
@endsection

@section('footer')
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
@endsection

@section('script')
    <script>
        function setProressbar(bgcolor, width, content) {
            // Lấy phần tử div
            var progressBar = document.querySelector(".progress-bar");
            //xóa màu nền trước đó
            progressBar.classList.remove(progressBar.classList[1]);
            //thêm màu nền
            progressBar.classList.add(bgcolor);
            // Đặt lại giá trị width
            progressBar.style.width = width;
            // Đặt lại nội dung bên trong div
            progressBar.innerHTML = content;
        }
        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab1").addEventListener("click", function() {
            setProressbar('bg-light-1', '1%', '0%');
        });

        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab2").addEventListener("click", function() {
            setProressbar('bg-green', '20%', '20%');
        });

        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab3").addEventListener("click", function() {
            setProressbar('bg-info', '40%', '40%');
        });

        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab4").addEventListener("click", function() {
            setProressbar('bg-success', '60%', '60%');
        });
        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab5").addEventListener("click", function() {
            setProressbar('bg-warning', '80%', '80%');
        });

        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab6").addEventListener("click", function() {
            setProressbar('bg-danger', '100%', '100%');

        });
    </script>
@endsection
