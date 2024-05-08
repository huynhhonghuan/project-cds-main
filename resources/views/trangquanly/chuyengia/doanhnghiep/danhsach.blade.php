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
                            <h4 class="card-title float-left mt-2 text-uppercase">Doanh sách doanh nghiệp</h4>
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
                                            <th scope="col" width="10%">STT</th>
                                            <th scope="col">Tên doanh nghiệp</th>
                                            <th scope="col">Đại diện doanh nghiệp</th>
                                            <th scope="col">Lĩnh vực hoạt động</th>
                                            <th scope="col" class="text-center" width="10%">Xem chi tiết doanh nghiệp</th>
                                            <th scope="col" class="text-center" width="5%">Liên hệ doanh nghiệp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhsach as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td style="max-width: 300px; text-overflow: ellipsis; overflow: hidden;">{{ $value->tentiengviet}}</td>
                                                <td>{{ $value->getDaidien->tendaidien }}</td>
                                                <td>
                                                    @if($value->getLoaiHinh->linhvuc_id == 'cn')
                                                        <span>Công Nghiệp</span>
                                                    @else @if($value->getLoaiHinh->linhvuc_id == 'nn')
                                                        <span>Nông Nghiệp</span>
                                                    @else @if($value->getLoaiHinh->linhvuc_id == 'tmdv') 
                                                        <span>Thương Mại - Dịch Vụ</span> 
                                                    @else @endif @endif @endif 
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('chuyengia.doanhnghiep.xemdoanhnghiep', ['id' => $value->id]) }}"
                                                        class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                            style="color:orange;"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="form-sua"
                                                        href="{{ route('chuyengia.tinnhan', $value->id) }}">
                                                        <i class="fa-regular fa-message" style="font-size: 22px"></i>
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

    {{-- duyệt tài khoản modal --}}
    <script>
        $(document).on('click', '.nguoiduyet_modal', function() {
            $('#duyet_id_1').val($(this).data('id')); // gán id vào input (hidden)
            document.getElementById("duyet_email_1").innerHTML = $(this).data('email');
        });
    </script>

    {{-- cập nhật trạng thái modal --}}
    <script>
        $(document).on('click', '.trangthai_modal', function() {
            $('#duyet_id_2').val($(this).data('id')); // gán id vào input (hidden)
            $('#duyet_status').val($(this).data('status')); // gán id vào input (hidden)
            document.getElementById("duyet_email_2").innerHTML = $(this).data('email');
        });
    </script>

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
@endsection
