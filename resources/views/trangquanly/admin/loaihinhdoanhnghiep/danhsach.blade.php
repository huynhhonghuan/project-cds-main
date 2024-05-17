@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}

@section('head')
@endsection

@section('style')
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
                            <a href="{{ route('admin.loaihinhdoanhnghiep.them') }}"
                                class="btn btn-primary float-right veiwbutton ">Thêm
                                loại hình hoạt động</a>
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
                                            <th scope="col" width="8%">STT</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên loại hình hoạt động</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Lĩnh vực</th>
                                            <th class="text-center" width="5%">Sửa</th>
                                            <th class="text-center" width="5%">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhsach as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->tenloaihinh }}</td>
                                                <td>
                                                    @if ($value->hinhanh != null)
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" {{-- src="{{ URL::to('/assets/backend/img/loaihinhdoanhnghiep/' . $value->hinhanh) }}" --}}
                                                                    src="{{ env('APP_URL') }}/assets/backend/img/loaihinhdoanhnghiep/{{ $value->hinhanh }}"
                                                                    alt="{{ $value->hinhanh }}">
                                                            </a>
                                                        </h2>
                                                    @else
                                                        <span class="btn bg-danger-light text-danger">Không!</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $value->getlinhvuc->tenlinhvuc }}
                                                </td>


                                                {{-- <td class="text-center">
                                                    <a href="{{ route('admin.chienluoc.xem', ['id' => $value->id]) }}"
                                                        class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                            style="color:orange;"></i></a>
                                                </td> --}}

                                                <td class="text-center">
                                                    <a class="form-sua"
                                                        href="{{ route('admin.loaihinhdoanhnghiep.sua', $value->id) }}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i>
                                                    </a>

                                                </td>

                                                <td class="text-right">
                                                    <a class="dropdown-item bookingDelete" data-toggle="modal"
                                                        data-target="#delete_asset" data-id="{{ $value->id }}"
                                                        data-loaihinhhoatdong="{{ $value->tenloaihinh }}">
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

        {{-- Model delete xóa 1 bài báo --}}
        <div id="delete_asset" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('admin.loaihinhdoanhnghiep.xoa') }}" method="POST">
                        @csrf
                        <div class="modal-body text-center">
                            <h3 class="delete_class">Bạn thật sự muốn xóa loại hình hoạt động <span class="text-warning"
                                    id="delete_email"></span> này?</h3>
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                                <input class="form-control" type="hidden" id="e_id" name="id" value="">
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
@endsection

@section('script')
    {{-- delete modal --}}
    <script>
        $(document).on('click', '.bookingDelete', function() {
            $('#e_id').val($(this).data('id')); // gán id vào input (hidden)
            document.getElementById("delete_email").innerHTML = $(this).data('loaihinhhoatdong');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table-custom').DataTable({
                //disable sorting on last column
                "columnDefs": [{
                    "orderable": false,
                    "targets": 4
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
