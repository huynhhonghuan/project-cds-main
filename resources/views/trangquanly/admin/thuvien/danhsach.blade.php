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
                            <a href="{{ route('admin.thuvien.them') }}" class="btn btn-primary float-right veiwbutton ">Thêm
                                Văn Bản</a>
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
                                            <th scope="col" width="10%" class="text-center">STT</th>
                                            <th scope="col" width="20%" class="text-center">Ký Hiệu</th>
                                            <th scope="col" width="20%" class="text-center">Loại Văn Bản</th>
                                            <th scope="col" width="45%" class="text-center" style="text-align: center">Trích Yếu</th>
                                            <th scope="col" width="15%" class="text-center">Ngày Ban Hành</th>
                                            <th scope="col" width="5%">Sửa</th>
                                            <th scope="col" class="text-center" width="5%">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($thuviens as $tv)
                                            <div class="lib-content-body" style="background: #545446">
                                                <tr>
                                                    <td style="text-align: center; font-size:16px">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center; font-size:16px">{{ $tv->kyhieu }}</td>
                                                    <td style="font-size:16px">
                                                        @if($tv->loai == 0)
                                                            <div
                                                                style="max-width: 200px; text-overflow: ellipsis; overflow: hidden;">
                                                                <span>Văn Bản Trung Ương</span>
                                                            </div>
                                                        @else @if($tv->loai == 1) 
                                                            <div
                                                                style="max-width: 200px; text-overflow: ellipsis; overflow: hidden;">
                                                                <span>Văn Bản Địa Phương</span>
                                                            </div>
                                                        @else
                                                            <div
                                                                style="max-width: 200px; text-overflow: ellipsis; overflow: hidden;">
                                                                <span>Văn Bản Tập huấn Chuyển đổi số</span>
                                                            </div>
                                                        @endif @endif
                                                    </td>
                                                    <td style="font-size:16px">
                                                        <div title="{{$tv->tieude}}"
                                                            style="max-width: 400px; text-overflow: ellipsis; overflow: hidden;">
                                                            {{ $tv->tieude }}
                                                        </div>
                                                    </td>
                                                    <td class="date" style="text-align: center; font-size:16px">{{ date('d/m/Y', strtotime($tv->namphathanh))}}</td>
                                                    <td>
                                                        <a class="form-sua"
                                                            href="{{ route('admin.thuvien.sua', $tv->id) }}">
                                                            <i class="fas fa-pencil-alt m-r-5"></i>
                                                        </a>
                                                    </td>
    
                                                    <td class="text-right">
                                                        <a class="btn dropdown-item bookingDelete" data-toggle="modal"
                                                            data-target="#delete_asset" data-id="{{ $tv->id }}"
                                                            data-fileupload="{{ $tv->file }}">
                                                            <i class="fas fa-trash-alt m-r-5" style="color: limegreen;"></i>
                                                        </a>
                                                    </td>
    
                                                </tr>
                                            </div>
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
                    <form action="{{ route('admin.thuvien.xoa')}}" method="POST">
                        @csrf
                        <h3 class="delete_class">Bạn thật sự muốn xóa văn bản này?</h3>
                        <div class="m-t-20">
                            <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                            <input class="form-control" type="hidden" id="e_id" name="id" value="">
                            <input class="form-control" type="hidden" id="e_fileupload" name="file"
                                value="">
                            <button type="submit" class="btn btn-danger">Xóa</button>
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
            $('#e_hinhanh').attr('src', '{{ URL::to('/assets/frontend/img/slide/') }}' + '/' + $(this).data(
                'fileupload'));
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#huan').DataTable({
                //disable sorting on last column
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
