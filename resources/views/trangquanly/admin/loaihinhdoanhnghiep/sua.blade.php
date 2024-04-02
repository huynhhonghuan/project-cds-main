@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5"> <a href="{{ route('admin.loaihinhdoanhnghiep.danhsach') }}"
                                class="btn"><i class="fa-solid fa-arrow-left"></i></a>{{ $tendanhsach }}</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.loaihinhdoanhnghiep.sua', ['id' => $danhsach->id]) }}" method="POST"
                enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-lg-6 mx-auto bg-light">
                        <div class="row formtype">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tên loại hình hoạt động</label>
                                    <input type="text"
                                        class="form-control @error('tenloaihinh') is-invalid @enderror"name="tenloaihinh"
                                        value="{{ $danhsach->tenloaihinh }}">
                                    @error('tenloaihinh')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lĩnh vực</label>
                                    <select class="form-control @error('linhvuc_id') is-invalid @enderror" id="sel1"
                                        name="linhvuc_id">
                                        <option value=''> --Chọn-- </option>
                                        @foreach ($linhvuc as $value)
                                            <option {{ $value->id == $danhsach->linhvuc_id ? 'selected' : '' }}
                                                value="{{ $value->id }}">{{ $value->tenlinhvuc }}</option>
                                        @endforeach
                                    </select>
                                    @error('linhvuc_id')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <div class="custom-file mb-3">
                                        <input type="file"
                                            class="custom-file-input @error('hinhanh') is-invalid @enderror" id="customFile"
                                            name="hinhanh" value="{{ old('hinhanh') }}">
                                        <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
                                    </div>
                                    @error('hinhanh')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary buttonedit1 mb-3">Sửa loại hình</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
