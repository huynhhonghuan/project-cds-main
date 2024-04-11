@extends('trangquanly.chuyengia.layout'){{-- kế thừa form layout --}}

@section('head')
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>

    @livewireStyles
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
                            <a href="#" class="btn btn-primary float-right veiwbutton ">Lưu khảo sát 1</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card pt-1">
                        {{-- <div class="card-header">
                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-light-1" style="width: 1%">0%</div>
                            </div>
                        </div> --}}
                        <div class="card-body">
                            <div class="tab-pane" id="solid-rounded-justified-tab2">
                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                    <li class="nav-item"><a class="nav-link active tab-tab-1 h-100 pt-3"
                                            href="#solid-rounded-justified-tab-1" data-toggle="tab">Trải nghiệm số cho
                                            khách hàng</a></li>
                                    <li class="nav-item"><a class="nav-link tab-tab-2 h-100 pt-3"
                                            href="#solid-rounded-justified-tab-2" data-toggle="tab">Chiến lược</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link tab-tab-3 h-100 pt-3"
                                            href="#solid-rounded-justified-tab-3" data-toggle="tab">Hạ tầng và Công
                                            nghệ số</a></li>
                                    <li class="nav-item"><a class="nav-link tab-tab-4 h-100 pt-3"
                                            href="#solid-rounded-justified-tab-4" data-toggle="tab">Vận hành</a></li>
                                    <li class="nav-item"><a class="nav-link tab-tab-5 h-100"
                                            href="#solid-rounded-justified-tab-5" data-toggle="tab">Chuyển đổi số văn
                                            hóa doanh nghiệp</a></li>
                                    <li class="nav-item"><a class="nav-link tab-tab-6 h-100"
                                            href="#solid-rounded-justified-tab-6" data-toggle="tab">Dữ liệu và tài sản
                                            thông tin</a></li>
                                </ul>
                                <div class="tab-content">
                                    @php
                                        $count_1 = 1;
                                    @endphp
                                    @foreach ($danhsach as $item_1)
                                        @if ($item_1->cauhoiphieu1_id == null)
                                            <div class="tab-pane @if ($count_1 == 1) show active @endif "
                                                id="solid-rounded-justified-tab-{{ $count_1 }}">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="">
                                                            <div class="card-body p-3">
                                                                <div class="table-responsive border">
                                                                    <table class="table table-bordered mb-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col" width="5%">TT
                                                                                </th>
                                                                                <th scope="col" width="20%">Trụ
                                                                                    cột/
                                                                                    Thành phần/ Tiêu chí
                                                                                </th>
                                                                                <th scope="col">Câu hỏi/Kê khai số
                                                                                    liệu
                                                                                </th>
                                                                                <th scope="col" width="20%">
                                                                                    Thang điểm tối đa
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-weight: bold;">
                                                                                    {{ $count_1 }}</td>
                                                                                <td colspan="2"
                                                                                    style="font-weight: bold;">
                                                                                    {{ $item_1->tencauhoi }}</td>
                                                                                <td> {!! $item_1->noidung !!}</td>
                                                                            </tr>

                                                                            @php
                                                                                $count_2 = 1;
                                                                            @endphp

                                                                            @foreach ($danhsach as $item_2)
                                                                                @if ($item_1->id == $item_2->cauhoiphieu1_id && $item_2->tieude == null)
                                                                                    <tr>
                                                                                        <td style="font-weight: bold;">
                                                                                            {{ $count_1 }}.{{ $count_2 }}
                                                                                        </td>
                                                                                        <td colspan="2"
                                                                                            style="font-weight: bold;">
                                                                                            {{ $item_2->tencauhoi }}
                                                                                        </td>
                                                                                        <td> {!! $item_2->noidung !!}
                                                                                        </td>
                                                                                    </tr>

                                                                                    @php
                                                                                        $count_3 = 1;
                                                                                    @endphp

                                                                                    @foreach ($danhsach as $item_3)
                                                                                        @if ($item_2->id == $item_3->cauhoiphieu1_id && $item_3->tieude == 1)
                                                                                            <tr>
                                                                                                <td colspan="4"
                                                                                                    style="font-weight: bold;">
                                                                                                    {{ $item_3->tencauhoi }}
                                                                                                </td>
                                                                                            </tr>

                                                                                            @foreach ($phieu1 as $item_4)
                                                                                                @if ($item_3->id == $item_4->getcauhoiphieu1->cauhoiphieu1_id)
                                                                                                    <tr>
                                                                                                        <td> {{ $count_1 }}.{{ $count_2 }}.{{ $count_3 }}
                                                                                                        </td>
                                                                                                        <td>{{ $item_4->getcauhoiphieu1->tencauhoi }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {!! $item_4->getcauhoiphieu1->noidung !!}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            @livewire('clickphieu1', ['id' => $item_4->id, 'diem' => $item_4->diem, 'trangthai' => $item_4->trangthai])
                                                                                                        </td>
                                                                                                    </tr>

                                                                                                    @php
                                                                                                        $count_3++;
                                                                                                    @endphp
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @elseif($item_2->id == $item_3->cauhoiphieu1_id && $item_3->tieude == null)
                                                                                            @foreach ($phieu1 as $item_5)
                                                                                                @if ($item_2->id == $item_3->cauhoiphieu1_id && $item_5->getcauhoiphieu1->cauhoiphieu1_id == $item_3->cauhoiphieu1_id)
                                                                                                    <tr>
                                                                                                        <td> {{ $count_1 }}.{{ $count_2 }}.{{ $count_3 }}
                                                                                                        </td>
                                                                                                        <td>{{ $item_5->getcauhoiphieu1->tencauhoi }}
                                                                                                        </td>
                                                                                                        <td>{!! $item_5->getcauhoiphieu1->noidung !!}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            @livewire('clickphieu1-chienluoc', ['id' => $item_5->id, 'diem' => $item_5->diem, 'trangthai' => $item_5->trangthai])
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endif
                                                                                    @endforeach

                                                                                    @php
                                                                                        $count_2++;
                                                                                    @endphp
                                                                                @endif
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $count_1++;
                                            @endphp
                                        @else
                                        @endif
                                    @endforeach
                                </div>
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
                        <div class="modal-body text-center"> <img src="{{ URL::to('assets/img/sent.png') }}" alt=""
                                width="50" height="46">
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
    @livewireScripts

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
