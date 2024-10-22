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
                            <h4 class="card-title float-left mt-2">{{ $tendanhsach }}</h4>
                            <a href="{{ route('admin.taikhoan.them') }}" class="btn btn-primary float-right veiwbutton ">Thêm
                                vai trò</a>
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
                                            <th scope="col">Id vai trò</th>
                                            <th scope="col" width="30%">Tên vai trò</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th class="text-center" width="5%">Sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhsach as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->id }}</td>

                                                <td>{{ $value->tenvaitro }}</td>

                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ URL::to('/assets/backend/img/vaitro/' . $value->hinhanh) }}"
                                                                alt="{{ $value->hinhanh }}">
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <a class="dropdown-item sua_modal" data-toggle="modal"
                                                        data-target="#sua_modal" data-id="{{ $value->id }}"
                                                        data-tenvaitro="{{ $value->tenvaitro }}"
                                                        data-hinhanh="{{ $value->hinhanh }}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i>
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

        {{-- Model duyệt tài khoản --}}
        <div id="sua_modal" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Chỉnh sửa vai trò</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                aria-hidden="true">×</span> </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row form-row">
                                <div class="col-12 col-sm-8">

                                    <input type="hidden" class="form-control" value="" id="sua_id">

                                    <div class="form-group">
                                        <label>Tên vai trò</label>
                                        <input type="text" class="form-control" value="" id="sua_tenvaitro">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h6>Hình ảnh</h6>
                                    <img class="img-vaitro" src="" alt="Hình" id="sua_hinhanh">
                                </div>

                                <div class="col-12 mt-3">
                                    <h5 class="form-title"><span>Chọn hình ảnh mới</span></h5>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="file" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Model duyệt tài khoản --}}

    </div>
@endsection

@section('script')
    {{-- duyệt modal --}}
    <script>
        $(document).on('click', '.sua_modal', function() {
            $('#sua_id').val($(this).data('id')); // gán id vào input (hidden)
            $('#sua_tenvaitro').val($(this).data('tenvaitro')); // gán
            $('#sua_hinhanh').attr('src', '{{ URL::to('/assets/backend/img/vaitro/') }}' +'/'+ $(this).data(
                'hinhanh'));
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
