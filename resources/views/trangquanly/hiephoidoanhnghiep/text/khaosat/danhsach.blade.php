@extends('trangquanly.hiephoidoanhnghiep.layout'){{-- kế thừa form layout --}}

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
                                            <th scope="col" class="text-center" width="7%">Trạng thái khảo sát</th>
                                            <th scope="col" class="text-center" width="10%">Xem chi tiết khảo sát</th>
                                            <th scope="col" class="text-center" width="10%">Xem chi tiết chiến lược
                                            </th>
                                            <th scope="col" class="text-center" width="5%">Xem đánh giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhsach as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->tentiengviet }}</td>
                                                <td class="text-center">
                                                    @if ($value->getkhaosat->last() == null)
                                                        <div class="actions">
                                                            <a class="btn btn-sm bg-danger-light mr-2 ">Chưa khảo sát</a>
                                                        </div>
                                                    @elseif($value->getkhaosat->last() != null)
                                                        @if ($value->getkhaosat->last()->trangthai == 1)
                                                            <div class="actions">
                                                                <a class="btn btn-sm bg-success-light mr-2">Hoàn thành</a>
                                                            </div>
                                                        @else
                                                            <div class="actions">
                                                                <a class="btn btn-sm bg-warning-light mr-2">Đang khảo
                                                                    sát</a>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('hiephoidoanhnghiep.khaosat.xemkhaosat', ['id' => $value->id]) }}"
                                                        class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                            style="color:orange;"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('hiephoidoanhnghiep.khaosat.xemchienluoc', ['id' => $value->id]) }}"
                                                        class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                            style="color:orange;"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('hiephoidoanhnghiep.khaosat.xemdanhgia', ['id' => $value->id]) }}"
                                                        class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                            style="color:orange;"></i></a>
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
