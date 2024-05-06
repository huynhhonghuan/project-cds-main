@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Sửa thông tin Văn Bản</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.thuvien.sua', $vanban->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Ký Hiệu</label>
                                    <input type="text"
                                        class="form-control @error('kyhieu') is-invalid @enderror"name="kyhieu"
                                        value="{{$vanban->kyhieu}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Trích Yếu</label>
                                    <input type="text"
                                        class="form-control @error('tieude') is-invalid @enderror"name="tieude"
                                        value="{{$vanban->tieude}}"></input>    
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Phân Loại Văn Bản :</label>
                                    <select class="form-control @error('loai') is-invalid @enderror" id="sel1"
                                        name="loai">
                                        {{-- <option selected disabled> --Chọn-- </option> --}}
                                        {{-- <option value="{{ $vanban->loai }}"> --}}
                                        @if ($vanban->loai == 1)
                                            <option selected value="1">Văn Bản Địa Phương</option>
                                            <option value="0">Văn bản trung ương</option>
                                            <option value="2">Văn bản tập huấn chuyển đổi số</option>
                                        @else 
                                        @if ($vanban->loai == 0)
                                            <option selected value="0">Văn Bản Trung Ương</option>
                                            <option value="1">Văn bản địa phương</option>
                                            <option value="2">Văn bản tập huấn chuyển đổi số</option>
                                        @else
                                        @if ($vanban->loai == 2)
                                            <option selected value="2">Văn bản tập huấn chuyển đổi số</option>
                                            <option value="0">Văn bản trung ương</option>
                                            <option value="1">Văn bản địa phương</option>
                                        @else   
                                        @endif @endif @endif
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>File Văn bản</label>
                                    <input type="file" id="filevb" src="{{ URL::to('/assets/frontend/file/'.$vanban->file)}}"
                                        class="form-control @error('file') is-invalid @enderror"name="file"
                                        value="">
                                    <input type="hidden" class="form-control" name="hidden_hinhanh" value="{{ $vanban->file }}">
                                    <label for="filevb">{{$vanban->file}}</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Ngày phát hành</label>
                                    <input type="date"
                                        class="form-control @error('namphathanh') is-invalid @enderror" name="namphathanh"
                                        value="{{ date('d/m/Y', strtotime($vanban->namphathanh))}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Sửa Văn Bản</button>
            </form>
        </div>
    </div>
@endsection
