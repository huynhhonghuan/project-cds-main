@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Sửa Thông Tin Sản Phẩm</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('doanhnghiep.sanpham.sua', $sanpham->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tên Sản Phẩm</label>
                                    <input type="text"
                                        class="form-control @error('tensanpham') is-invalid @enderror"name="tensanpham"
                                        value="{{$sanpham->tensanpham}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá Sản Phẩm</label>
                                    <input type="number"
                                        class="form-control @error('gia') is-invalid @enderror"name="gia"
                                        value="{{$sanpham->gia}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Hình Ảnh Sản Phẩm</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="hinhanh">
                                        <input type="hidden" class="form-control" name="hidden_hinhanh" value="{{ $sanpham->getAnh->hinhanh }}">
                                        <a href="#" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img rounded-circle" src="{{ URL::to('assets/backend/img/sanpham/'.$sanpham->getAnh->hinhanh) }}" alt="{{ $sanpham->hinhanh }}">
                                        </a>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Mô tả Sản Phẩm</label>
                                    <input type="text"
                                        class="form-control @error('mota') is-invalid @enderror"name="mota"
                                        value="{{$sanpham->mota}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Cập Nhật Sản Phẩm</button>
            </form>
        </div>
    </div>
@endsection
