@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}

@section('head')
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
@endsection

@section('style')
    <style>
        .modal-noidung img {
            width: 100%;
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
                            <a href="{{ route('admin.tintuc.them') }}" class="btn btn-primary float-right veiwbutton ">Thêm
                                tin tức</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table id="huan" class="table table-stripped table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col" width="5%">Hình ảnh</th>
                                            <th scope="col">Tên lĩnh vực</th>
                                            <th scope="col">Tên người đăng</th>
                                            <th scope="col" width="20%">Tiêu đề</th>
                                            <th scope="col">Nội dung chi tiết</th>
                                            <th scope="col">Lượt xem</th>
                                            <th scope="col">Duyệt</th>
                                            <th class="text-right">Chỉnh sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhsach as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ URL::to('/assets/frontend/img/trangtin/' . $value->hinhanh) }}"
                                                                alt="{{ $value->hinhanh }}">
                                                        </a>
                                                    </h2>
                                                </td>

                                                <td>{{ $value->getLinhvuc->tenlinhvuc }}</td>
                                                <td>{{ $value->getUser->name }}</td>
                                                <td>
                                                    <div
                                                        style="max-width: 200px; text-overflow: ellipsis; overflow: hidden;">
                                                        {{ $value->tieude }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn bg-info-light xem_noidung" data-toggle="modal"
                                                            data-target="#xem_noidung" data-tomtat="{{ $value->tomtat }}"
                                                            data-noidung="{{ $value->noidung }}">
                                                            Xem chi tiết
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $value->luotxem }}</td>

                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('admin.tintuc.duyet', $value->id) }}"
                                                            class="btn btn-sm mr-2 {{ $value->duyet == 1 ? 'bg-success-light' : 'bg-danger-light' }}">{{ $value->duyet == 1 ? 'Duyệt' : 'Chưa' }}</a>
                                                    </div>
                                                </td>

                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="btn dropdown-item"
                                                                href="{{ route('admin.tintuc.sua', $value->id) }}">
                                                                <i class="fas fa-pencil-alt m-r-5"></i> Sửa
                                                            </a>
                                                            <a class="btn dropdown-item bookingDelete" data-toggle="modal"
                                                                data-target="#delete_asset" data-id="{{ $value->id }}"
                                                                data-fileupload="{{ $value->hinhanh }}">
                                                                <i class="fas fa-trash-alt m-r-5"></i> Xóa
                                                            </a>
                                                        </div>
                                                    </div>
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
                        <div class="modal-body text-center"> <img alt="Hình ảnh" width="30%" height="25%"
                                id="e_hinhanh">
                            <h3 class="delete_class">Bạn thật sự muốn xóa tin tức này?</h3>
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                                <input class="form-control" type="hidden" id="e_id" name="id" value="">
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
    {{-- xem nội dung --}}
    <script>
        $(document).on('click', '.xem_noidung', function() {
            document.getElementById("xemtomtat").innerHTML = $(this).data('tomtat');
            document.getElementById("xemnoidung").innerHTML = $(this).data('noidung');
        });
    </script>

    {{-- delete model --}}
    <script>
        $(document).on('click', '.bookingDelete', function() {
            $('#e_id').val($(this).data('id'));
            $('#e_fileupload').val($(this).data('fileupload'));
            $('#e_hinhanh').attr('src', '{{ URL::to('/assets/frontend/img/trangtin/') }}' + '/' + $(this).data(
                'fileupload'));
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#huan').DataTable({
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
                        '<option value="-1">All</option>' +
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
