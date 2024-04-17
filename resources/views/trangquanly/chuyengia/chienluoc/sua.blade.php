@extends('trangquanly.chuyengia.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Lưu chiến lược</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('chuyengia.chienluoc.sua', [$mohinh->id]) }}" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Tên mô hình</label>
                                    <input type="text"
                                        class="form-control @error('tenmohinh') is-invalid @enderror"name="tenmohinh"
                                        value="{{ $mohinh->tenmohinh }}" required>
                                    @error('tenmohinh')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Chọn hình ảnh mô hình</label>
                                    <div class="custom-file mb-3">
                                        <input type="file"
                                            class="custom-file-input @error('hinhanh') is-invalid @enderror" id="customFile"
                                            name="hinhanh" value="{{ old('hinhanh') }}" required>
                                        <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
                                    </div>
                                    @error('hinhanh')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Thời gian (tính theo năm)</label>
                                    <input type="number" min="1" step="0.5"
                                        class="form-control @error('thoigian') is-invalid @enderror"name="thoigian"
                                        value="{{ $mohinh->getlotrinh->thoigian ?? '' }}" required>
                                    @error('thoigian')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Số lượng nhân sự / người</label>
                                    <input type="number" min="1"
                                        class="form-control @error('nhansu') is-invalid @enderror"name="nhansu"
                                        value="{{ $mohinh->getlotrinh->nhansu ?? '' }}" required>
                                    @error('nhansu')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tài chính (VND)</label>
                                    <input type="number" min="1"
                                        class="form-control @error('taichinh') is-invalid @enderror"name="taichinh"
                                        value="{{ $mohinh->getlotrinh->taichinh ?? '' }}" required>
                                    @error('taichinh')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nội dung mô tả mô hình</label>
                                    <textarea class="form-control @error('noidung_mota') is-invalid @enderror" rows="5" id="editor1"
                                        name="noidung_mota" required>{{ $mohinh->noidung ?? ''}}</textarea>
                                    @error('noidung_mota')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Lộ trình chuyển đổi từng bước (Ghi rõ ràng từng bước chuyển đổi)</label>
                                    <textarea class="form-control @error('noidung_lotrinh') is-invalid @enderror" rows="5" id="editor2"
                                        name="noidung_lotrinh" required>{{ $mohinh->getlotrinh->noidung ?? '' }}</textarea>
                                    @error('noidung_lotrinh')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Lưu ý cho lộ trình chuyển đổi (nếu không có hãy ghi: "Không")</label>
                                    <textarea class="form-control @error('luuy') is-invalid @enderror" rows="5" id="editor3" name="luuy">{{ $mohinh->getlotrinh->luuy ?? ''}}</textarea>
                                    @error('luuy')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Lưu chiến lược</button>
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

        ClassicEditor.create(document.querySelector('#editor3'), {
            licenseKey: '',
        }).then(editor => {
            window.editor = editor;
        }).catch(error => {
            console.error(error);
        });
    </script>
@endsection
