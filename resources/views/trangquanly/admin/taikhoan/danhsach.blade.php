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
                            <h4 class="card-title float-left mt-2">Doanh sách tài khoản người dùng</h4>
                            <a href="{{ route('admin.taikhoan.them') }}" class="btn btn-primary float-right veiwbutton ">Thêm
                                tài khoản</a>
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
                                            <th scope="col">Email</th>
                                            <th scope="col" width="15%">Mật khẩu</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Loại tài khoản</th>
                                            <th scope="col">Người cấp</th>
                                            <th scope="col">Người duyệt</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col" width="5%">Sửa</th>
                                            <th scope="col" class="text-center" width="5%">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhsach as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->email }}</td>

                                                <td>
                                                    <div style="max-width: 75px; text-overflow: ellipsis; overflow: hidden;">
                                                        {{ $value->password }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ URL::to('/assets/backend/img/user/' . $value->hinhanh) }}"
                                                                alt="{{ $value->hinhanh }}">
                                                        </a>
                                                    </h2>
                                                </td>

                                                <td>
                                                    @if ($value->getVaiTro[0]->id == 'ad')
                                                        <div class="btn btn-sm bg-primary-light mr-2"> Quản trị viên</div>
                                                    @elseif ($value->getVaiTro[0]->id == 'dn')
                                                        <div class="btn btn-sm bg-info-light mr-2"> Doanh nghiệp</div>
                                                    @elseif ($value->getVaiTro[0]->id == 'cg')
                                                        <div class="btn btn-sm bg-warning-light mr-2"> Chuyên gia</div>
                                                    @elseif ($value->getVaiTro[0]->id == 'hhdn')
                                                        <div class="btn btn-sm bg-success-light mr-2"> Hiệp hội doanh nghiệp
                                                        </div>
                                                    @elseif ($value->getVaiTro[0]->id == 'ctv')
                                                        <div class="btn btn-sm bg-danger-light mr-2"> Cộng tác viên</div>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="actions">
                                                        <a data-toggle="modal" data-target="#cap_modal"
                                                            data-id="{{ $value->id }}" data-status="{{ $value->status }}"
                                                            data-email="{{ $value->email }}"
                                                            class="btn btn-sm mr-2 {{  $value->getCapVaitro[0]->id == 'dn' ? 'bg-info-light' : ($value->getCapVaitro[0]->id == 'hhdn' ? 'bg-success-light' : 'bg-danger-light') }} duyet_modal">{{  $value->getCapVaitro[0]->id == 'dn' ? 'Doanh nghiệp đăng ký' : ($value->getCapVaitro[0]->id == 'hhdn' ? 'Hiệp hội doanh nghiệp' : 'Quản trị viên') }}</a>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="actions">
                                                        <a data-toggle="modal" data-target="#duyet_modal"
                                                            data-id="{{ $value->id }}"
                                                            data-email="{{ $value->email }}"
                                                            class="btn btn-sm {{ $value->getDuyet[0]->duyet_user_id == 1 ? 'bg-danger-light' : 'bg-success-light' }} mr-2 duyet_modal">{{ $value->getDuyet[0]->duyet_user_id == 1  ? 'Quản trị viên' : 'Hiệp hội doanh nghiệp' }}</a>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="actions">
                                                        <a data-toggle="modal" data-target="#trangthai_modal"
                                                            data-id="{{ $value->id }}"
                                                            data-status="{{ $value->status }}"
                                                            data-email="{{ $value->email }}"
                                                            class="btn btn-sm {{ $value->status == 'Active' ? 'bg-success-light' : 'bg-danger-light' }} mr-2 duyet_modal">{{ $value->status == 'Active' ? 'Hoạt động' : 'Không hoạt động' }}</a>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a class="" href="{{ route('admin.taikhoan.sua', $value->id) }}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i>
                                                    </a>
                                                </td>

                                                <td class="text-right">
                                                    <a class="dropdown-item bookingDelete" data-toggle="modal"
                                                        data-target="#delete_asset" data-id="{{ $value->id }}"
                                                        data-email="{{ $value->email }}">
                                                        <i class="fas fa-trash-alt m-r-5"></i>
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

        {{-- Modal sửa thông tin tài khoản --}}
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
                    <form action="{{ route('admin.taikhoan.xoa') }}" method="POST">
                        @csrf
                        <div class="modal-body text-center">
                            <h3 class="delete_class">Bạn thật sự muốn xóa tài khoản <span class="text-warning"
                                    id="delete_email"></span> này?</h3>
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                                <input class="form-control" type="hidden" id="e_id" name="id"
                                    value="">
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Model delete --}}

        {{-- Model duyệt tài khoản --}}
        <div id="trangthai_modal" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('admin.taikhoan.duyet') }}" method="POST">
                        @csrf
                        <div class="modal-body text-center">
                            <h3 class="delete_class">Bạn thật sự muốn cập nhật trạng thái tài khoản <span class="text-warning"
                                    id="duyet_email"></span> này?</h3>
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                                <input class="form-control" type="hidden" id="duyet_id" name="id"
                                    value="">
                                <input class="form-control" type="hidden" id="duyet_status" name="status"
                                    value="">
                                <button type="submit" class="btn btn-danger">Duyệt</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Model duyệt tài khoản --}}
    </div>
@endsection

@section('script')
    {{-- xem nội dung --}}
    <script>
        $(document).on('click', '.xem_noidung', function() {
            document.getElementById("xemtomtat").innerHTML = $(this).data('tomtat');
            document.getElementById("xemnoidung").innerHTML = $(this).data('noidung');
        });
    </script>

    {{-- delete modal --}}
    <script>
        $(document).on('click', '.bookingDelete', function() {
            $('#e_id').val($(this).data('id')); // gán id vào input (hidden)
            document.getElementById("delete_email").innerHTML = $(this).data('email');
        });
    </script>

    {{-- duyệt modal --}}
    <script>
        $(document).on('click', '.duyet_modal', function() {
            $('#duyet_id').val($(this).data('id')); // gán id vào input (hidden)
            $('#duyet_status').val($(this).data('status')); // gán id vào input (hidden)
            document.getElementById("duyet_email").innerHTML = $(this).data('email');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#table-custom').DataTable({
                //disable sorting on last column
                "columnDefs": [{
                    "orderable": false,
                    "targets": 5
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
