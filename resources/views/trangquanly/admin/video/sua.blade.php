@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Thêm Video</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.video.sua' , $videos->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col">
                                <div class="form-group">
                                    <label>Tiêu đề video</label>
                                    <input type="text"
                                        class="form-control @error('tieude') is-invalid @enderror"name="tieude"
                                        value="{{ $videos->tieude }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Đường dẫn Video</label>
                                    <input type="text"
                                        class="form-control @error('file') is-invalid @enderror"name="file"
                                        value="{{ $videos->file }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Sửa Video</button>
            </form>
        </div>
    </div>
@endsection
