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
                            <a href="{{ route('chuyengia.chienluoc.them') }}"
                                class="btn btn-primary float-right veiwbutton ">Thêm
                                chiến lược</a>
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
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên mô hình</th>
                                            <th scope="col">Hình ảnh</th>
                                            {{-- <th scope="col" width="30%">Nội dung</th> --}}
                                            <th scope="col">Đề xuất</th>
                                            <th class="text-center" width="5%">Xem chi tiết</th>
                                            <th class="text-center" width="5%">Sửa</th>
                                            <th class="text-center" width="5%">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhsach as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->tenmohinh }}</td>
                                                <td>
                                                    @if ($value->hinhanh != null)
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle"
                                                                    src="{{ URL::to('/assets/backend/img/mohinh/' . $value->hinhanh) }}"
                                                                    alt="{{ $value->hinhanh }}">
                                                            </a>
                                                        </h2>
                                                    @else
                                                        <span class="btn bg-danger-light text-danger">Không!</span>
                                                    @endif
                                                </td>

                                                {{-- <td>
                                                    <div
                                                        style="max-width: 300px; text-overflow: ellipsis; overflow: hidden;">
                                                        {{ $value->noidung }}
                                                    </div>
                                                </td> --}}
                                                <td>
                                                    @if ($value->user_id == null)
                                                        <div class="btn bg-primary-light text-primary">
                                                            Hệ thống
                                                        </div>
                                                    @else
                                                        <div class="btn bg-warning-light text-warning">
                                                            Chuyên gia
                                                        </div>
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('chuyengia.chienluoc.xem', ['id' => $value->id]) }}"
                                                        class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                            style="color:orange;"></i></a>
                                                </td>

                                                <td>
                                                    <a class="form-sua"
                                                        href="{{ route('chuyengia.chienluoc.sua', $value->id) }}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i>
                                                    </a>
                                                    {{-- <input type="hidden" id="form-sua-value"
                                                        value="{{ $value->getVaiTro[0]->id }}"> --}}
                                                </td>

                                                <td class="text-right">
                                                    <a class="dropdown-item xoa_modal" data-toggle="modal"
                                                        data-target="#xoa_modal" data-id="{{ $value->id }}"
                                                        data-tenmohinh="{{ $value->tenmohinh }}">
                                                        <i class="fas fa-trash-alt m-r-5" style="color: limegreen;"></i>
                                                    </a>
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

        {{-- Model xóa chiến lược --}}
        {{-- <div id="xoa_modal" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa chiến lược <span id="tenmohinh" class="text-info"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                aria-hidden="true">×</span> </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('chuyengia.chienluoc.xoa') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <input type="text" class="form-control" value="" id="xoa_id">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Xóa chiến lược</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

        <div id="xoa_modal" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('chuyengia.chienluoc.xoa') }}" method="POST">
                        @csrf
                        <div class="modal-body text-center">
                            <h3 class="delete_class">Xóa chiến lược <span class="text-info" id="tenmohinh"></span>
                            </h3>
                            <hr>
                            <input type="hidden" id="xoa_id" name="xoa_id">
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                                <button type="submit" class="btn btn-danger">Xóa chiến lược</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Model xóa chiến lược --}}


    </div>
@endsection

@section('script')
    {{-- xóa modal --}}
    <script>
        $(document).on('click', '.xoa_modal', function() {
            $('#xoa_id').val($(this).data('id')); // gán id vào input (hidden)
            // $('#tenmohinh').val($(this).data('tenmohinh')); // gán
            document.getElementById("tenmohinh").innerHTML = $(this).data('tenmohinh');

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
