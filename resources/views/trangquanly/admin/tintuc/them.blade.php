@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Thêm bài báo</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.tintuc.them') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Lĩnh vực</label>
                                    <select class="form-control @error('linhvuc') is-invalid @enderror" id="sel1"
                                        name="linhvuc_id">
                                        <option selected disabled> --Chọn-- </option>
                                        @foreach ($linhvuc as $value)
                                            <option value="{{ $value->id }}">{{ $value->tenlinhvuc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text"
                                        class="form-control @error('tieude') is-invalid @enderror"name="tieude"
                                        value="{{ old('tieude') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tóm tắt</label>
                                    <textarea class="form-control @error('tomtat') is-invalid @enderror" rows="2" id="editor1" name="tomtat">{{ old('tomtat') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea class="form-control @error('noidung') is-invalid @enderror" rows="2" id="editor2" name="noidung">{{ old('noidung') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ảnh bìa</label>
                                    <div class="custom-file mb-3">
                                        <input type="file"
                                            class="custom-file-input @error('hinhanh') is-invalid @enderror" id="customFile"
                                            name="hinhanh" value="">
                                        <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nguồn Tin Tức</label>
                                    <input type="text"
                                        class="form-control @error('nguon') is-invalid @enderror"name="nguon"
                                        value="{{ old('nguon') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Tạo bài báo</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
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
