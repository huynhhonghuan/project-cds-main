@extends('trangquanly.doanhnghiep.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Thêm Sản Phẩm</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('doanhnghiep.sanpham.them') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tên Sản Phẩm</label>
                                    <input type="text"
                                        class="form-control @error('tensanpham') is-invalid @enderror"name="tensanpham"
                                        value="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá Sản Phẩm</label>
                                    <input type="number"
                                        class="form-control @error('gia') is-invalid @enderror"name="gia"
                                        value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Hình Ảnh Sản Phẩm</label>
                                    <div class="custom-file mb-3">
                                        <input type="file"
                                            class="custom-file-input @error('hinhanh') is-invalid @enderror" id="customFile"
                                            name="hinhanh" value="{{ old('hinhanh') }}">
                                        <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <input type="text"
                                        class="form-control @error('mota') is-invalid @enderror"name="mota"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Thêm Sản Phẩm</button>
            </form>
        </div>
    </div>
@endsection
