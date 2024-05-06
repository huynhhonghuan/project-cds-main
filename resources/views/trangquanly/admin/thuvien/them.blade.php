@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Thêm Văn Bản</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.thuvien.them') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Ký Hiệu</label>
                                    <input type="text"
                                        class="form-control @error('kyhieu') is-invalid @enderror"name="kyhieu"
                                        value="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Trích Yếu</label>
                                    <textarea type="text"
                                        class="form-control @error('tieude') is-invalid @enderror"name="tieude"
                                        value=""></textarea>    
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Phân Loại Văn Bản :</label>
                                    <select class="form-control @error('loai') is-invalid @enderror" id="sel1"
                                        name="loai">
                                        <option selected disabled> --Chọn-- </option>
                                        <option value="1">Văn bản địa phương</option>
                                        <option value="0">Văn bản trung ương</option>
                                        <option value="2">Văn bản tập huấn chuyển đổi số</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>File Văn bản</label>
                                    <input type="file"
                                        class="form-control @error('file') is-invalid @enderror"name="file"
                                        value="">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Ngày phát hành</label>
                                    <input type="date"
                                        class="form-control @error('namphathanh') is-invalid @enderror"name="namphathanh"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Thêm Văn Bản</button>
            </form>
        </div>
    </div>
@endsection
