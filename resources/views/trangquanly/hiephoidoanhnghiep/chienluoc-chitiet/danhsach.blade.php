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
                            {{-- <a href="{{ route('chuyengia.chienluoc.them') }}"
                                class="btn btn-primary float-right veiwbutton ">Thêm
                                chiến lược</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row bg-white">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 roles_class">
                    <div class="roles-menu mb-4">
                        <h6 class="mx-1">Doanh nghiệp</h6>
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified bg-white"
                            style="display: block; overflow-y: scroll; height: 500px;">
                            @foreach ($danhsach as $item)
                                <li class="nav-item text-left"><a
                                        class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}"
                                        href="#bottom-justified-tab{{ $loop->iteration }}"
                                        data-toggle="tab">{{ $item->tenloaihinh }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 roles_class">
                    <div class="tab-content">
                        @foreach ($danhsach as $item1)
                            <div class="tab-pane show {{ $loop->iteration == 1 ? 'active' : '' }}"
                                id="bottom-justified-tab{{ $loop->iteration }}">
                                <h6 class="card-title m-b-20">Chiến lược cho doanh nghiệp <span
                                        class="text-info">{{ $item1->tenloaihinh }}</span> </h6>
                                <div class="m-b-30">
                                    <ul class="list-group">
                                        @foreach ($mohinh_trucot as $item2)
                                            @php
                                                $h = 0;
                                            @endphp
                                            <li class="list-group-item">
                                                @foreach ($item1->getmohinh_doanhnghiep_trucot as $it)
                                                    @if ($item2->id == $it->gettrucot->id)
                                                        <span class="text-success">{{ $item2->tentrucot }}:</span>
                                                        {{ $it->getmohinh->tenmohinh }}
                                                        <div class="material-switch float-right">
                                                            <a
                                                                href="{{ route('hiephoidoanhnghiep.chienluocchitiet.xem', ['id' => $it->getmohinh->id]) }}">Xem
                                                                chi tiết</a>
                                                        </div>
                                                        @php
                                                            $h = 1;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @if ($h == 0)
                                                    <span class="text-danger">{{ $item2->tentrucot }}:</span>
                                                    <p class="btn btn-sm bg-danger-light btn-ms mx-2">Chưa có</p>

                                                @endif
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>

    </div>
    {{-- Modal thêm chiến lược --}}
    <div id="modal_them" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('chuyengia.chienluocchitiet.them') }}" method="POST">
                    @csrf
                    <div class="modal-body text-center">
                        <h3 class="delete_class">Thêm chiến lược cho <span class="text-info" id="delete_email"></span>
                        </h3>
                        <hr>
                        <div class="form-group">
                            <label>Loại hình hoạt động chính</label>
                            <select class="form-control" id="sel1" name="mohinh_id" required>
                                <option value="">--Chọn mô hình--</option>
                                @foreach ($mohinh as $value)
                                    <option value="{{ $value->id }}">{{ $value->tenmohinh }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Chọn mô hình chuyển đổi số!
                            </div>
                        </div>
                        <hr>
                        <div class="m-t-20">
                            <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                            <input class="form-control" type="hidden" id="iddoanhnghieploaihinh"
                                name="iddoanhnghieploaihinh" value="">
                            <input class="form-control" type="hidden" id="idmohinhtrucot" name="idmohinhtrucot"
                                value="">
                            <button type="submit" class="btn btn-danger">Thêm chiến lược</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Model thêm chiến lược --}}

    {{-- Modal thay thế chiến lược --}}
    <div id="modal_sua" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('chuyengia.chienluocchitiet.sua') }}" method="POST">
                    @csrf
                    <div class="modal-body text-center">
                        <h3 class="delete_class">Thay thế chiến lược cho <span class="text-info" id="delete_email1"></span>
                        </h3>
                        <hr>
                        <div class="form-group">
                            <label>Loại hình hoạt động chính</label>
                            <select class="form-control" id="sel1" name="mohinh_id1" required>
                                <option value="">--Chọn mô hình--</option>
                                @foreach ($mohinh as $value)
                                    <option value="{{ $value->id }}">{{ $value->tenmohinh }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Chọn mô hình chuyển đổi số!
                            </div>
                        </div>
                        <hr>
                        <div class="m-t-20">
                            <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                            <input class="form-control" type="hidden" id="idmohinhdoanhnghieptrucot"
                                name="idmohinhdoanhnghieptrucot" value="">
                            {{-- <input class="form-control" type="hidden" id="iddoanhnghieploaihinh1"
                                name="iddoanhnghieploaihinh1" value="">
                            <input class="form-control" type="hidden" id="idmohinhtrucot1" name="idmohinhtrucot1"
                                value=""> --}}
                            <button type="submit" class="btn btn-danger">Thay thế chiến lược</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal thay thế chiến lược --}}
@endsection

@section('script')
    {{-- Modal thêm chiến lược --}}
    <script>
        $(document).on('click', '.modalThem', function() {
            $('#iddoanhnghieploaihinh').val($(this).data('iddoanhnghieploaihinh')); // gán id vào input (hidden)
            $('#idmohinhtrucot').val($(this).data('idmohinhtrucot')); // gán id vào input (hidden)
            document.getElementById("delete_email").innerHTML = $(this).data('tenloaihinh');
        });
    </script>

    {{-- Modal thay thế chiến lược --}}
    <script>
        $(document).on('click', '.modalSua', function() {
            $('#idmohinhdoanhnghieptrucot').val($(this).data(
                'idmohinhdoanhnghieptrucot')); // gán id vào input (hidden)
            // $('#iddoanhnghieploaihinh1').val($(this).data('iddoanhnghieploaihinh1')); // gán id vào input (hidden)
            // $('#idmohinhtrucot1').val($(this).data('idmohinhtrucot1')); // gán id vào input (hidden)
            document.getElementById("delete_email1").innerHTML = $(this).data('tenloaihinh1');
        });
    </script>
@endsection
