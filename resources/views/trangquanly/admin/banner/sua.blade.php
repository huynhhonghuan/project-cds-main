@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Thêm Banner</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.banner.sua', $slides->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col">
                                <div class="form-group">
                                    <label>Hình Ảnh Banner</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="hinhanh">
                                        <input type="hidden" class="form-control" name="hidden_hinhanh" value="{{ $slides->hinhanh }}">
                                        <a href="#" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/frontend/img/slide/'.$slides->hinhanh) }}" alt="{{ $slides->hinhanh }}">
                                        </a>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Tiêu đề banner</label>
                                    <input type="text"
                                        class="form-control @error('tenbanner') is-invalid @enderror"name="tenbanner"
                                        value="{{$slides->tenbanner}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Sửa Banner</button>
            </form>
        </div>
    </div>
@endsection
