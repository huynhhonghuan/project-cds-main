@extends('trangquanly.congtacvien.layout'){{--kế thừa form layout--}}
@section('content'){{--thêm content vào form kế thừa chỗ @yield('content')--}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">{{ $tendanhsach }}</h4>
                        <a href="{{ route('congtacvien.tintuccd.them') }}" class="btn btn-primary float-right veiwbutton ">Thêm
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
                                        <th scope="col">Lượt xem</th>
                                        <th scope="col">Duyệt</th>
                                        <th scope="col" class="text-center">Xem chi tiết</th>
                                        <th scope="col" width="5%">Sửa</th>
                                        <th scope="col" class="text-center" width="5%">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($danhsach as $value)
                                        @if($value->duyet == 1)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($value->hinhanh != null)
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle"
                                                                    src="{{ URL::to('/assets/frontend/img/trangtin/' . $value->hinhanh) }}"
                                                                    alt="{{ $value->hinhanh }}">
                                                            </a>
                                                        </h2>
                                                    @else
                                                        <span class="btn bg-danger-light text-danger">Không!</span>
                                                    @endif
                                                </td>

                                                <td>{{ $value->getLinhvuc->tenlinhvuc }}</td>
                                                <td>{{ $value->getUser->name }}</td>
                                                <td>
                                                    <div
                                                        style="max-width: 200px; text-overflow: ellipsis; overflow: hidden;">
                                                        {{ $value->tieude }}
                                                    </div>
                                                </td>

                                                <td>{{ $value->luotxem }}</td>

                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('congtacvien.tintuccd.duyet', $value->id) }}"
                                                            class="btn btn-sm mr-2 {{ $value->duyet == 1 ? 'bg-success-light' : 'bg-danger-light' }}">{{ $value->duyet == 1 ? 'Duyệt' : 'Chưa' }}</a>
                                                    </div>
                                                </td>

                                                <td class="text-center">
                                                    <div class="actions">
                                                        <a class="btn xem_noidung" data-toggle="modal"
                                                            data-target="#xem_noidung" data-tomtat="{{ $value->tomtat }}"
                                                            data-noidung="{{ $value->noidung }}">
                                                            <i class="fa-regular fa-eye" style="color:orange;"></i></a> </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="form-sua"
                                                        href="{{ route('congtacvien.tintuccd.sua', $value->id) }}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i>
                                                    </a>
                                                </td>

                                                <td class="text-right">
                                                    <a class="btn dropdown-item bookingDelete" data-toggle="modal"
                                                        data-target="#delete_asset" data-id="{{ $value->id }}"
                                                        data-fileupload="{{ $value->hinhanh }}">
                                                        <i class="fas fa-trash-alt m-r-5" style="color: limegreen;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @else @endif
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
                <form action="{{ route('congtacvien.tintuccd.xoa', $value->id) }}" method="POST">
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
    {{-- delete model --}}
    <script>
        $(document).on('click', '.bookingDelete', function() {
            $('#e_id').val($(this).data('id'));
            $('#e_fileupload').val($(this).data('fileupload'));
            $('#e_hinhanh').attr('src', '{{ URL::to('/assets/frontend/img/trangtin/') }}' + '/' + $(this).data(
                'fileupload'));
        });
    </script>
</div>
@endsection