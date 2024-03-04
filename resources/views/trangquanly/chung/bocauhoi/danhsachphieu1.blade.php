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
                        {{-- <div class="card-header">
                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-light-1" style="width: 1%">0%</div>
                            </div>
                        </div> --}}
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                <li class="nav-item"><a class="nav-link active tab-tab1 h-100"
                                        href="#solid-rounded-justified-tab1" data-toggle="tab">Thông tin chung</a></li>
                                <li class="nav-item"><a class="nav-link tab-tab2 h-100" href="#solid-rounded-justified-tab2"
                                        data-toggle="tab">Chi tiết phiếu khảo sát</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                                    <div class="row mt-3">
                                        <div class="col-8 p-5 bg-light mx-auto">
                                            <h4 class="text-center">PHIẾU KHẢO SÁT SỐ 01</h4>
                                            <h3 class="text-center mt-3">TỔNG HỢP THÔNG TIN CHỈ SỐ ĐÁNH GIÁ MỨC ĐỘ
                                                CHUYỂN ĐỔI SỐ CỦA DOANH NGHIỆP
                                            </h3>
                                            <p class="text-center mt-3">(Theo quyết định số 1970/QĐ-BTTTT, ngày 13
                                                tháng 12 năm 2021 của Bộ Thông tin và Truyền thông về việc “Phê
                                                duyệt đề án xác định chỉ số đánh giá mức độ chuyển đổi số doanh
                                                nghiệp và hỗ trợ thúc đẩy doanh nghiệp chuyển đổi số”)</p>
                                            <h5 class="fw-bold mt-5">I. Thông tin doanh nghiệp</h5>
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
                                            <h5 class="fw-bold mt-3">II. Điểm đánh giá</h5>
                                            <h6 class="fw-bold mt-2">1. Thang điểm đánh giá mức độ chuyển đổi số
                                                doanh nghiệp nhỏ và vừa</h6>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="">
                                                        <div class="card-body p-3">
                                                            <h6 class="text-center">Bảng 1: Thang điểm đánh giá mức
                                                                độ
                                                                chuyển đổi số doanh
                                                                nghiệp nhỏ và vừa</h6>
                                                            <div class="table-responsive border">
                                                                <table class="table table-bordered mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th rowspan="2" width="5%">TT
                                                                            </th>
                                                                            <th rowspan="2" width="30%">Chỉ số
                                                                            </th>
                                                                            <th rowspan="2" width="8%">Số
                                                                                lượng tiêu chí</th>
                                                                            <th scope="col" colspan="9"
                                                                                class="text-center">
                                                                                Thang điểm tối đa
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>
                                                                                Mức 1
                                                                            </th>
                                                                            <th>
                                                                                Mức 2
                                                                            </th>
                                                                            <th>
                                                                                Mức 3
                                                                            </th>
                                                                            <th>
                                                                                Mức 4
                                                                            </th>
                                                                            <th>
                                                                                Mức 5
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="2">Đánh giá tổng thể
                                                                            </th>
                                                                            <th>60</th>
                                                                            <th>64</th>
                                                                            <th>128</th>
                                                                            <th>192</th>
                                                                            <th>256</th>
                                                                            <th>320</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>Trải nghiệm số cho khách hàng</td>
                                                                            <td>13</td>
                                                                            <td>13</td>
                                                                            <td>26</td>
                                                                            <td>39</td>
                                                                            <td>52</td>
                                                                            <td>65</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>Chiến lược số</td>
                                                                            <td>1</td>
                                                                            <td>5</td>
                                                                            <td>10</td>
                                                                            <td>15</td>
                                                                            <td>20</td>
                                                                            <td>25</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>3</td>
                                                                            <td>Hạ tầng và Công nghệ số</td>
                                                                            <td>16</td>
                                                                            <td>16</td>
                                                                            <td>32</td>
                                                                            <td>48</td>
                                                                            <td>64</td>
                                                                            <td>80</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>4</td>
                                                                            <td>Vận hành</td>
                                                                            <td>13</td>
                                                                            <td>13</td>
                                                                            <td>26</td>
                                                                            <td>39</td>
                                                                            <td>52</td>
                                                                            <td>65</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5</td>
                                                                            <td>Chuyển đổi số văn hóa doanh nghiệp
                                                                            </td>
                                                                            <td>10</td>
                                                                            <td>10</td>
                                                                            <td>20</td>
                                                                            <td>30</td>
                                                                            <td>40</td>
                                                                            <td>50</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>6</td>
                                                                            <td>Dữ liệu và tài sản thông tin</td>
                                                                            <td>7</td>
                                                                            <td>7</td>
                                                                            <td>14</td>
                                                                            <td>21</td>
                                                                            <td>28</td>
                                                                            <td>35</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="fw-bold mt-2">2. Phương pháp đánh giá, xếp loại mức độ chuyển
                                                đổi số doanh nghiệp nhỏ và vừa</h6>
                                            <p style="margin-left: 20px;">Tùy theo kết quả đánh giá (điểm tổng đạt
                                                được của tất cả các tiêu
                                                chí) doanh nghiệp sẽ được xếp loại mức độ chuyển đổi số theo nguyên
                                                tắc sau:</p>
                                            <h6 class="fw-bold mt-2">2.1. Đánh giá từng trụ cột</h6>
                                            <p style="margin-left: 20px;">Căn cứ vào kết quả đánh giá điểm tổng đạt
                                                được của các tiêu chí trong trụ cột, đối chiếu với thang điểm đánh
                                                giá trong Bảng 1 để xếp loại Trụ cột đó đang ở mức nào trong 5 mức:
                                                Mức 1 - Khởi động; Mức 2 - Bắt đầu; Mức 3 - Hình thành: Mức 4 - Nâng
                                                cao; Mức 5 - Dẫn dắt.</p>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="">
                                                        <div class="card-body p-3">
                                                            <h6 class="text-center">Bảng 2: Thang điểm đánh giá mức
                                                                độ chuyển đổi số theo từng trụ cột của doanh nghiệp
                                                                nhỏ và vừa</h6>
                                                            <div class="table-responsive border">
                                                                <table class="table table-bordered mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col" width="15%"
                                                                                class="text-center">Mức độ
                                                                            </th>
                                                                            <th scope="col">Thang điểm đánh giá
                                                                                theo từng trụ
                                                                                cột
                                                                            </th>
                                                                            <th scope="col" width="30%">Mức
                                                                                độ
                                                                                chuyển đổi số
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-center">0</td>
                                                                            <td>Nhỏ hơn 10% điểm tối đa từng trụ cột
                                                                            </td>
                                                                            <td>Chưa khởi động</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center">1</td>
                                                                            <td>Từ trên 10% đến 20% điểm tối đa từng
                                                                                trụ cột</td>
                                                                            <td>Khởi động</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center">2</td>
                                                                            <td>Trên 20% đến 40% điểm tối đa từng
                                                                                trụ cột</td>
                                                                            <td>Bắt đầu</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center">3</td>
                                                                            <td>Trên 40% đến 60% điểm tối đa từng
                                                                                trụ cột</td>
                                                                            <td>Hình thành</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center">4</td>
                                                                            <td>Trên 60% đến 80% điểm tối đa từng
                                                                                trụ cột</td>
                                                                            <td>Nâng cao</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center">5</td>
                                                                            <td>Trên 80% đến 100% điểm tối đa từng
                                                                                trụ cột</td>
                                                                            <td>Dẫn dắt</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p style="margin-left: 20px;">Ví dụ: Doanh nghiệp có tổng điểm của trụ
                                                cột Trải nghiệm số cho khách hàng là 39 điểm thì sẽ được đánh giá:
                                                “trụ cột Trải nghiệm số cho khách hàng của doanh nghiệp đạt mức 3 -
                                                đã hình thành”.</p>
                                            <p style="margin-left: 20px;">Ngoài 5 mức chuyển đổi số này, sẽ có một
                                                mức nữa là mức 0 - mức chưa khởi động chuyển đổi số. Đây là mức đánh
                                                giá đối với doanh nghiệp mà hầu như chưa có động thái gì cho chuyển
                                                đổi số.</p>
                                            <h6 class="fw-bold mt-2">2.2. Đánh giá tổng thể:</h6>
                                            <p style="margin-left: 20px;">- Mức 0 - Chưa khởi động chuyển đổi số:
                                                Điểm tổng tối đa nhỏ hơn hoặc
                                                bằng 20 điểm;
                                            </p>
                                            <p class="mt-2" style="margin-left: 20px;">- Mức 1- Khởi động: Điểm
                                                tổng tối đa trên 20 điểm, có tối thiểu 4
                                                trụ cột đạt mức 1 hoặc cao hơn nhưng chưa đạt yêu cầu để xếp mức cao
                                                hơn mức 1;
                                            </p>
                                            <p class="mt-2" style="margin-left: 20px;">- Mức 2 - Bắt đầu: Điểm
                                                tổng tối đa trên 64 điểm, có tối thiểu 4 trụ cột đạt mức 2 hoặc cao
                                                hơn nhưng chưa đạt yêu cầu để xếp mức cao hơn mức 2;
                                            </p>
                                            <p class="mt-2" style="margin-left: 20px;">- Mức 3 - Hình thành:
                                                Điểm tối đa trên 128 điểm, có tối thiểu 4 trụ cột đạt mức 3 hoặc cao
                                                hơn nhưng chưa đạt yêu cầu để xếp mức cao hơn mức 3;
                                            </p>
                                            <p class="mt-2" style="margin-left: 20px;">- Mức 4 - Nâng cao: Điểm
                                                tối đa trên 192 điểm, có tối thiểu 5 trụ cột đạt mức 4 hoặc cao hơn
                                                nhưng chưa đạt yêu cầu để xếp mức cao hơn mức 4;
                                            </p>
                                            <p class="mt-2" style="margin-left: 20px;">- Mức 5 - Dẫn dắt: Điểm
                                                tối đa từ trên 256 cả 6 trụ cột đều đạt mức 5.
                                            </p>
                                        </div>
                                    </div>
                                </div>
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
                                                                                            <td> {!! $item_2->noidung !!} </td>
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

                                                                                                @foreach ($danhsach as $item_4)
                                                                                                    @if ($item_3->id == $item_4->cauhoiphieu1_id && $item_4->tieude == null)
                                                                                                        <tr>
                                                                                                            <td> {{ $count_1 }}.{{ $count_2 }}.{{ $count_3 }}
                                                                                                            </td>
                                                                                                            <td>{{ $item_4->tencauhoi }}
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                {!! $item_4->noidung !!}
                                                                                                            </td>
                                                                                                            <td>0 1 2 3 4 5
                                                                                                            </td>
                                                                                                        </tr>

                                                                                                        @php
                                                                                                            $count_3++;
                                                                                                        @endphp
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @elseif($item_2->id == $item_3->cauhoiphieu1_id && $item_3->tieude == null)
                                                                                                <tr>
                                                                                                    <td> {{ $count_1 }}.{{ $count_2 }}.{{ $count_3 }}
                                                                                                    </td>
                                                                                                    <td>{{ $item_3->tencauhoi }}
                                                                                                    </td>
                                                                                                    <td>{!! $item_3->noidung !!}
                                                                                                    </td>
                                                                                                    <td>0 5 10 15 20 25</td>
                                                                                                </tr>
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
