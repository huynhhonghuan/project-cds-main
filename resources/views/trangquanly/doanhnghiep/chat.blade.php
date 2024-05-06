@extends('trangquanly.doanhnghiep.layout'){{-- kế thừa form layout --}}
@section('content')
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h5 class="card-title float-left mt-2 text-uppercase" style="color: blue">Danh Sách Chuyên Gia</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @foreach ($hoiThoais as $item)
            <div class="row" style="margin: 10px">
                <div class="col-xl-4">
                    <div class="item-img-2">
                        <img style="width: 100%;height:250px;object-fit:cover" src="{{ asset('assets/backend/img/hoso/'.$item->getChuyenGiaUser->image) }}" alt="">
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="item-content">
                        <div class="item-content--main" style="font-size:22px;font-weight:700;padding-top: 16px;width:100%;text-transform:uppercase;color:#deb10c">{{$item->getChuyenGia->tenchuyengia}}</div>
                    </div>
                    <div class="item-footer" style="">
                        <div class="item-header row">
                            <div class="col-xl-9" style="">
                                @if($item->getChuyenGia->linhvuc_id == 'nn') 
                                    <span style="font-size: 16px;font-weight : 500">Nghiệp vụ tư vấn : </span>
                                    <span style="background-color: green;padding:2px 6px;border-radius:10px;color:#fff;font-weight:600;font-size:14px">Nông Nghiệp</span>
                                @elseif($item->getChuyenGia->linhvuc_id == 'cn') 
                                    <span style="font-size: 16px;font-weight : 500">Nghiệp vụ tư vấn : </span>
                                    <span style="background-color: blue;padding:2px 6px;border-radius:10px;color:#fff;font-weight:600;font-size:14px">Công Nghiệp</span>
                                @elseif($item->getChuyenGia->linhvuc_id == 'tmdv') 
                                    <span style="font-size: 16px;font-weight : 500">Nghiệp vụ tư vấn : </span>
                                    <span style="background-color: yellow;padding:2px 6px;border-radius:10px;font-weight:600;font-size:14px">Thương mại - Dịch vụ</span>
                                @elseif($item->getChuyenGia->linhvuc_id == 'kh') 
                                    <span style="font-size: 16px;font-weight : 500">Nghiệp vụ tư vấn : </span>
                                    <span style="background-color: rgb(9, 153, 243);padding:2px 6px;border-radius:10px;font-weight:600;font-size:14px">Chuyển đổi số</span>
                                @endif    
                            </div>
                        </div>
                    </div>
                    <div class="item-sdt"><span style="font-size: 16px;font-weight : 500"> Kinh Nghiệm : </span><span style="color: blue">Trên 5 năm kinh nghiệp về chuyển đổi số</span></div>
                    <div class="item-sdt"><span style="font-size: 16px;font-weight : 500"> Số điện thoại : </span><span style="color: blue">{{$item->getChuyenGia->sdt}}</span></div>
                    <div class="item-sdt"><span style="font-size: 16px;font-weight : 500"> Email : </span><span style="color: blue">{{$item->getChuyenGiaUser->email}}</span></div>
                    <div class="item-button" style="display: flex">
                        <div class="item-button--1">
                            <a class="form-sua" href="{{ route('doanhnghiep.tinnhan' ,$item->id) }}">
                                <div style="background: rgb(255, 242, 0);border:none;color:#000;margin-top: 16px;padding:6px 12px;margin-right:8px">Chi tiết</div>
                            </a>
                        </div>
                        <div class="item-button--2">
                            <a class="bh" href="{{ route('doanhnghiep.tinnhan' ,$item->id) }}">
                                <div style="background: blue;border:none;color:#fff;margin-top: 16px;padding:6px 12px">Nhắn tin</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="row">
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
                                                <a class="form-sua" href="{{ route('doanhnghiep.tinnhan' ,$value->id) }}">
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
        </div> --}}
    </div>
</div>
@endsection