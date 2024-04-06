@extends('trangquanly.chuyengia.layout'){{-- kế thừa form layout --}}

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
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table id="table-custom" class="table table-stripped table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="7%">STT</th>
                                            <th scope="col">Tên doanh nghiệp</th>
                                            <th scope="col">Lần khảo sát</th>
                                            <th scope="col" class="text-center" width="8%">Trạng thái khảo sát</th>
                                            <th scope="col" class="text-center" width="10%">Xem khảo sát</th>
                                            <th scope="col" class="text-center" width="10%">Xem chiến lược
                                            </th>
                                            <th scope="col" class="text-center" width="5%">Xem đánh giá</th>
                                            <th scope="col" class="text-center" width="5%">Thêm đánh giá</th>
                                            <th scope="col" class="text-center" width="5%">Sửa đánh giá</th>
                                            <th scope="col" class="text-center" width="5%">Xóa đánh giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhsach as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->tentiengviet }}</td>
                                                <td class="text-center">
                                                    @if (count($value->getkhaosat) > 0)
                                                        @foreach ($value->getkhaosat as $key => $item)
                                                            <span
                                                                class="btn btn-sm bg-info-light">{{ $key + 1 }}</span>
                                                            <hr>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (count($value->getkhaosat) > 0)
                                                        @foreach ($value->getkhaosat as $key => $item)
                                                            <div class="my-2">
                                                                @if ($item->trangthai == 1)
                                                                    <div class="btn btn-sm bg-success-light mr-2"> Hoàn
                                                                        thành
                                                                    </div>
                                                                @elseif ($item->trangthai == 2)
                                                                    <div class="btn btn-sm bg-success-light mr-2">Đã được đề
                                                                        xuất
                                                                    </div>
                                                                @else
                                                                    <div class="btn btn-sm bg-warning-light mr-2">Chưa hoàn
                                                                        thành
                                                                    </div>
                                                                @endif
                                                                <hr>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="btn btn-sm bg-danger-light mr-2">Chưa khảo sát
                                                        </div>
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    @if (count($value->getkhaosat) > 0)
                                                        @foreach ($value->getkhaosat as $key => $item)
                                                            <a href="{{ route('chuyengia.danhgia.xemkhaosat', ['id' => $item->id]) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <a href="#" class="btn btn-sm mr-2"><i
                                                                class="fa-regular fa-eye" style="color:orange;"></i></a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (count($value->getkhaosat) > 0)
                                                        @foreach ($value->getkhaosat as $key => $item)
                                                            <a href="{{ route('chuyengia.danhgia.xemchienluoc', ['id' => $item->id]) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <a href="#" class="btn btn-sm mr-2"><i
                                                                class="fa-regular fa-eye" style="color:orange;"></i></a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (count($value->getkhaosat) > 0)
                                                        @foreach ($value->getkhaosat as $key => $item)
                                                            <a href="{{ route('chuyengia.danhgia.xemdanhgia', ['id' => $item->id]) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <a href="#" class="btn btn-sm mr-2"><i
                                                                class="fa-regular fa-eye" style="color:orange;"></i></a>
                                                    @endif

                                                </td>
                                                <td class="text-center">
                                                    @if (count($value->getkhaosat) > 0)
                                                        @foreach ($value->getkhaosat as $key => $item)
                                                            @if ($item->trangthai == 2)
                                                                <a href="#" data-toggle="modal"
                                                                    class="themdanhgia_modal"
                                                                    data-target="#themdanhgia_modal"
                                                                    data-khaosat_id= "{{ $item->id }}"
                                                                    data-tendoanhnghiep ="{{ $value->tentiengviet }}">
                                                                    <i
                                                                        class="fa-solid fa-circle-plus"style="color:green;"></i>
                                                                </a>
                                                                <hr>
                                                            @else
                                                                <a href="#">
                                                                    <i
                                                                        class="fa-solid fa-circle-plus"style="color:green;"></i>
                                                                </a>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <a href="#">
                                                            <i class="fa-solid fa-circle-plus"style="color:green;"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (count($value->getkhaosat) > 0)
                                                        @foreach ($value->getkhaosat as $key => $item)
                                                            @if ($item->trangthai == 2)
                                                                <a href="#" data-toggle="modal"
                                                                    class="suadanhgia_modal" data-target="#suadanhgia_modal"
                                                                    data-khaosat_id= "{{ $item->id }}"
                                                                    data-chuyengia_id="{{ Auth::user()->id }}"
                                                                    data-tendoanhnghiep ="{{ $value->tentiengviet }}">
                                                                    <i class="fas fa-pencil-alt m-r-5"></i>
                                                                </a>
                                                                <hr>
                                                            @else
                                                                <a href="#">
                                                                    <i class="fas fa-pencil-alt m-r-5"></i>

                                                                </a>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <a href="#">
                                                            <i class="fas fa-pencil-alt m-r-5"></i>

                                                        </a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (count($value->getkhaosat) > 0)
                                                        @foreach ($value->getkhaosat as $key => $item)
                                                            @if ($item->trangthai == 2)
                                                                <a href="#" data-toggle="modal"
                                                                    class="xoadanhgia_modal"
                                                                    data-target="#xoadanhgia_modal"
                                                                    data-khaosat_id= "{{ $item->id }}"
                                                                    data-chuyengia_id="{{ Auth::user()->id }}"
                                                                    data-tendoanhnghiep ="{{ $value->tentiengviet }}">
                                                                    <i class="fas fa-trash-alt m-r-5"
                                                                        style="color: rgb(205, 133, 50);"></i>
                                                                </a>
                                                                <hr>
                                                            @else
                                                                <a href="#">
                                                                    <i class="fas fa-trash-alt m-r-5"
                                                                        style="color: rgb(205, 133, 50);"></i>

                                                                </a>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <a href="#">
                                                            <i class="fas fa-trash-alt m-r-5"
                                                                style="color: rgb(205, 133, 50);"></i>
                                                        </a>
                                                    @endif
                                                </td>
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
    {{-- Modal thêm đánh giá --}}
    <div id="themdanhgia_modal" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('chuyengia.danhgia.themdanhgia') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <h3 class="delete_class text-center">Thêm đánh giá cho <br><span class="text-info"
                                id="tendoanhnghieptiengviet"></span></h3>
                        <hr>
                        <div class="m-t-20">
                            <input class="form-control mb-3" type="hidden" name="khaosat_id" id="khaosat_id">
                            <div class="form-group">
                                <label for="danhgia" class="form-label align-items-start">Đánh giá</label>
                                <textarea class="form-control" type="text" name="danhgia" id="danhgia" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="dexuat" class="form-label align-items-start">Đề xuất</label>
                                <textarea class="form-control" type="text" name="dexuat" id="dexuat" rows="3"></textarea>
                            </div>

                            <div class="text-center">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                                <button type="submit" class="btn btn-danger">Thêm</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="suadanhgia_modal" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('chuyengia.danhgia.suadanhgia') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <h3 class="delete_class text-center">Sửa đánh giá cho <br><span class="text-info"
                                id="tendoanhnghieptiengviet_sua"></span></h3>
                        <hr>
                        <div class="m-t-20">
                            <input class="form-control mb-3" type="hidden" name="chuyengia_danhgia_id_sua"
                                id="chuyengia_danhgia_id_sua">
                            <div class="form-group">
                                <label for="danhgia" class="form-label align-items-start">Đánh giá</label>
                                <textarea class="form-control" type="text" name="danhgia_sua" id="danhgia_sua" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="dexuat" class="form-label align-items-start">Đề xuất</label>
                                <textarea class="form-control" type="text" name="dexuat_sua" id="dexuat_sua" rows="3"></textarea>
                            </div>

                            <div class="text-center">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                                <button type="submit" class="btn btn-danger">Sửa</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="xoadanhgia_modal" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('chuyengia.danhgia.xoadanhgia') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <h3 class="delete_class text-center">Xóa đánh giá cho <br><span class="text-info"
                                id="tendoanhnghieptiengviet_xoa"></span></h3>
                        <hr>
                        <div class="m-t-20">
                            <input class="form-control mb-3" type="hidden" name="chuyengia_danhgia_id_xoa"
                                id="chuyengia_danhgia_id_xoa">
                            <div class="text-center">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </div>

                        </div>
                    </div>
                </form>
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
                    "targets": 2
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
    {{-- Modal thêm đánh giá --}}
    <script>
        $(document).on('click', '.themdanhgia_modal', function() {
            $('#khaosat_id').val($(this).data('khaosat_id')); // gán id vào input (hidden)
            document.getElementById("tendoanhnghieptiengviet").innerHTML = $(this).data('tendoanhnghiep');
        });
    </script>
    {{-- Modal sửa đánh giá --}}
    <script>
        $(document).on('click', '.suadanhgia_modal', function() {
            document.getElementById("tendoanhnghieptiengviet_sua").innerHTML = $(this).data('tendoanhnghiep');

            var khaosat_id = $(this).data('khaosat_id');
            var chuyengia_id = $(this).data('chuyengia_id');
            if (khaosat_id !== '') {
                $.ajax({
                    url: "{{ route('chuyengia.danhgia.laythongtindanhgia') }}", // Đường dẫn tới route hoặc controller xử lý yêu cầu
                    method: 'GET',
                    data: {
                        khaosat_id: khaosat_id,
                        chuyengia_id: chuyengia_id
                    },
                    success: function(response) {
                        $('#chuyengia_danhgia_id_sua').val(response.id);
                        $('#danhgia_sua').val(response.danhgia);
                        $('#dexuat_sua').val(response.dexuat);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        // Xử lý lỗi nếu có
                    }
                });
            }
        });
    </script>
    {{-- Modal xóa đánh giá --}}
    <script>
        $(document).on('click', '.xoadanhgia_modal', function() {
            document.getElementById("tendoanhnghieptiengviet_xoa").innerHTML = $(this).data('tendoanhnghiep');

            var khaosat_id = $(this).data('khaosat_id');
            var chuyengia_id = $(this).data('chuyengia_id');
            if (khaosat_id !== '') {
                $.ajax({
                    url: "{{ route('chuyengia.danhgia.laythongtindanhgia') }}", // Đường dẫn tới route hoặc controller xử lý yêu cầu
                    method: 'GET',
                    data: {
                        khaosat_id: khaosat_id,
                        chuyengia_id: chuyengia_id
                    },
                    success: function(response) {
                        $('#chuyengia_danhgia_id_xoa').val(response.id);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        // Xử lý lỗi nếu có
                    }
                });
            }
        });
    </script>
@endsection
