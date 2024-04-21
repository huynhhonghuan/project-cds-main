@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Sửa bài báo</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('congtacvien.tintuc.sua',$tintuc->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Lĩnh vực</label>
                                    <select class="form-control @error('linhvuc_id') is-invalid @enderror" id="sel1"
                                        name="linhvuc_id">
                                        <option selected disabled> --Chọn-- </option>
                                        @foreach ($linhvuc as $value)
                                            <option {{ $tintuc->linhvuc_id== $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->tenlinhvuc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text"
                                        class="form-control @error('tieude') is-invalid @enderror"name="tieude"
                                        value="{{$tintuc->tieude}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tóm tắt</label>
                                    <textarea class="form-control @error('tomtat') is-invalid @enderror" rows="2" id="editor1" name="tomtat">{{$tintuc->tomtat}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea class="form-control @error('noidung') is-invalid @enderror" rows="2" id="editor2" name="noidung">{{$tintuc->noidung}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ảnh bìa</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="hinhanh">
                                        <input type="hidden" class="form-control" name="hidden_hinhanh" value="{{ $tintuc->hinhanh }}">
                                        <a href="#" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img rounded-circle" src="{{ URL::to('/assets/frontend/img/trangtin/'.$tintuc->hinhanh) }}" alt="{{ $tintuc->hinhanh }}">
                                        </a>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nguồn Tin Tức</label>
                                    <input type="text"
                                    class="form-control @error('nguon') is-invalid @enderror"name="nguon"
                                    value="{{$tintuc->nguon}}">    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Sửa bài báo</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::to('assets/ckeditor5/ckeditor.js') }} "></script>
    <script>
        ClassicEditor.create(document.querySelector('#editor1'), {
            licenseKey: '',
        }).then(editor => {
            window.editor = editor;
        }).catch(error => {
            console.error(error);
        });

        ClassicEditor.create(document.querySelector('#editor2'), {
            licenseKey: '',
        }).then(editor => {
            window.editor = editor;
        }).catch(error => {
            console.error(error);
        });
    </script>
@endsection
