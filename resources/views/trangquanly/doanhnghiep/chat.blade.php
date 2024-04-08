@extends('trangquanly.doanhnghiep.layout'){{-- kế thừa form layout --}}
@section('content')
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">Danh Sách Chuyên Gia</h4>
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
                                        <th scope="col" class="text-center">STT</th>
                                        <th scope="col" class="text-center">Tên Chuyên Gia</th>
                                        <th scope="col" class="text-center">Lĩnh Vực Của Chuyên Gia</th>
                                        <th scope="col" class="text-center" width="5%">Thông tin chi tiết</th>
                                        <th scope="col" class="text-center" width="5%">Hỏi đáp chuyên gia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hoiThoais as $value)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>

                                            <td class="text-center">{{ $value->getChuyenGia->tenchuyengia }}</td>
                                            
                                            <td class="text-center">
                                                @if($value->getChuyenGia->linhvuc_id == 'nn')
                                                    <div class="btn btn-md bg-success-light mr-2">Nông Nghiêp</div>
                                                @elseif($value->getChuyenGia->linhvuc_id == 'cn')
                                                    <div class="btn btn-md bg-primary-light mr-2">Công Nghiệp</div>
                                                @elseif($value->getChuyenGia->linhvuc_id == 'tmdv')
                                                    <div class="btn btn-md bg-warning-light mr-2">Thương Mại - Dịch Vụ</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="form-sua"
                                                    href="{{ route('admin.tintuc.sua', $value->id) }}">
                                                    <i class="fa-solid fa-circle-info" style="font-size: 22px"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="form-sua"
                                                    href="{{ route('doanhnghiep.tinnhan', $value->id) }}">
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