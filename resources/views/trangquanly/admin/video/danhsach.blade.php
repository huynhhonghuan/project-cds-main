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
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">{{ $tendanhsach }}</h4>
                            <a href="{{ route('admin.video.them') }}" class="btn btn-primary float-right veiwbutton ">Thêm
                                Video</a>
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
                                            <th scope="col" width="10%">STT</th>
                                            <th scope="col" width="40%">Tiêu Đề Video</th>
                                            <th scope="col" width="35%">Đường dẫn Video</th>
                                            <th scope="col" width="5%">Duyệt</th>
                                            <th scope="col" width="5%">Sửa</th>
                                            <th scope="col" class="text-center" width="5%">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td style="font-size:16px">{{ $value->tieude }}</td>
                                                <td style="font-size:16px">{{ $value->file }}</td>
                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('admin.video.duyet', $value->id) }}"
                                                            class="btn btn-sm mr-2 {{ $value->duyet == 1 ? 'bg-success-light' : 'bg-danger-light' }}">{{ $value->duyet == 1 ? 'Duyệt' : 'Chưa' }}</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="form-sua"
                                                        href="{{ route('admin.video.sua', $value->id) }}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i>
                                                    </a>
                                                </td>

                                                <td class="text-right">
                                                    <a class="btn dropdown-item bookingDelete" data-toggle="modal"
                                                        data-target="#delete_asset" data-id="{{ $value->id}}"
                                                        data-fileupload="{{ $value->tieude }}">
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


        {{-- Model xem nội dung bao gồm tóm tắt và nội dung chi tiết --}}
        {{-- <div id="xem_noidung" class="modal fade" role="dialog">
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
        </div> --}}
        {{-- Kết thúc xem nội dung --}}

        {{-- Model delete xóa 1 bài báo --}}
        <div id="delete_asset" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('admin.video.xoa' , $value->id) }}" method="POST">
                        @csrf
                        <div class="modal-body text-center">
                            <h3 class="delete_class">Bạn thật sự muốn xóa video này?</h3>
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
        });
    </script>
    </div>
@endsection


@section('footer')
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
@endsection