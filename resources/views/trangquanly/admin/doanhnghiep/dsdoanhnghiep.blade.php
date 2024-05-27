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
                        <div class="mt-5 d-flex" style="justify-content: space-between">
                            <h4 class="card-title float-left mt-2 text-uppercase" style="color : blue">Danh sách doanh nghiệp</h4>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control mt-2" id="select-1" name="sellist1">
                                        <option selected value="table1">-- Tất cả --</option>
                                        <option value="table2">Thành phố Long Xuyên</option>
                                        <option value="table3">Thành phố Châu Đốc</option>
                                        <option value="table4">An Phú</option>
                                        <option value="table5">Tân Châu</option>
                                        <option value="table6">Châu Phú</option>
                                        <option value="table7">Châu Thành</option>
                                        <option value="table8">Chợ Mới</option>
                                        <option value="table9">Phú Tân</option>
                                        <option value="table10">Thoại Sơn</option>
                                        <option value="table11">Tịnh Biên</option>
                                        <option value="table12">Tri Tôn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="table1" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <h4 class="text-uppercase">Tỉnh an giang có <span style="color: blue;font-weight:700">{{$danhsach->count()}}</span> doanh nghiệp</h4>
                                    <table id="huan" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if ($value->getuser->image != null)
                                                                <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                    <img class="avatar-img"
                                                                        src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                        alt="{{ $value->getuser->image }}">
                                                                </a>
                                                        @else
                                                            <span class="btn bg-danger-light text-danger">Không!</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->tentiengviet }}</td>
                                                    <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                    <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
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
                <div id="table2" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan2" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 883)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table3" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan3" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 884)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table4" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan4" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 886)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table5" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan5" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 887)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table6" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan6" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 889)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table7" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan7" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 892)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table8" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan8" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 893)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table9" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan9" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 888)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table10" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan10" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 894)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table11" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan11" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 890)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table12" class="col-md-12" style="display: none;">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table id="huan12" class="table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Logo doanh nghiệp</th>
                                                <th scope="col">Tên doanh nghiệp</th>
                                                <th scope="col">Lĩnh vực</th>
                                                <th scope="col">Loại hình hoạt động</th>
                                                <th scope="col" class="text-center" width="10%">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($danhsach as $value)
                                                @if($value->huyen == 891)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($value->getuser->image != null)
                                                                    <a href="#" class="avatar avatar-sm mr-2" style="width:100px;height:100px">
                                                                        <img class="avatar-img"
                                                                            src="{{ asset('assets/backend/img/hoso/'. $value->getuser->image) }}"
                                                                            alt="{{ $value->getuser->image }}">
                                                                    </a>
                                                            @else
                                                                <span class="btn bg-danger-light text-danger">Không!</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->tentiengviet }}</td>
                                                        <td>{{ $value->getloaihinh->getlinhvuc->tenlinhvuc ?? ''}}</td>
                                                        <td>{{ $value->getloaihinh->tenloaihinh ?? ''}}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.doanhnghiep.xemdn', $value->user_id) }}"
                                                                class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                                    style="color:orange;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
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
    </div>
@endsection

@section('script')
    <script>
        function handleSelectChange(event) {
            const select = event.target;
            const value = select.value;

            // Hiển thị thẻ tương ứng với value được chọn
            document.getElementById(value).style.display = "block";

            sessionStorage.setItem("table-select", value);

            // Ẩn các thẻ khác
            document.querySelectorAll("div[id^='table']").forEach((div) => {
                if (div.id !== value) {
                    div.style.display = "none";
                }
            });
        }
        // Gắn sự kiện click cho thẻ select
        document.getElementById("select-1").addEventListener("change", handleSelectChange);
    </script>

    <script>
        //load lại trang và set lại select
        window.addEventListener("load", function() {
            try {
                const loaiSession = sessionStorage.getItem("table-select");
                if (loaiSession != null) {
                    document.getElementById(loaiSession).style.display = "block";
                    document.querySelector('#select-1 [value="' + loaiSession + '"]').selected = true;
                } else {
                    document.getElementById('table1').style.display = "block";
                    document.querySelector('#select-1 [value="table1"]').selected = true;
                }
            } catch (error) {
                console.error("Lỗi:", error);
            }
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan2').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan3').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan4').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan5').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan6').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan7').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan8').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan9').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan10').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan11').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#huan12').DataTable({
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

                "zeroRecords": "Không có doanh nghiệp nào!",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                "search": "Tìm kiếm:",
            }
        })
    });
</script>

@endsection
