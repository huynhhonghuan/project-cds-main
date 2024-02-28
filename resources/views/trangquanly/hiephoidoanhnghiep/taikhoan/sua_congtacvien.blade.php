@extends('trangquanly.hiephoidoanhnghiep.layout'){{-- kế thừa form layout --}}
@section('style')
    {{-- Ẩn hiện mật khẩu --}}
    <style>
        #toggle-password,
        #toggle-password-confirm {
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">
                            <a href="{{ route('admin.taikhoan.danhsach') }}" class="btn"><i
                                    class="fa-solid fa-arrow-left"></i></a>
                            <span id="title-tendanhsach"> {{ $tendanhsach }} </span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($user->getVaiTro[0]->id == 'ctv')
                    <div id="table4" class="col-md-10 mx-auto">
                        <div class="col d-flex">
                            <div class="card rounded-top rounded-bottom w-100 border border-success-subtle">
                                <div class="card-header">
                                    <h4 class="card-title">Thông tin cộng tác viên</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <form
                                                action="{{ route('admin.taikhoan.sua_loai', ['loai' => 'ctv', 'id' => $user->id]) }}"
                                                method="POST" enctype="multipart/form-data" class="needs-validation"
                                                novalidate>
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Họ và tên</label>
                                                    <div class="col-lg-9">
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            value="{{ $user->name }}" id="name" name="name"
                                                            value="{{ old('name') }}" required />
                                                        @error('name')
                                                            <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Email</label>
                                                    <div class="col-lg-9">
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" value="{{ $user->email }}" name="email"
                                                            value="{{ old('email') }}" required />
                                                        @error('email')
                                                            <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Hình ảnh đại diện mới</label>
                                                    <div class="col-lg-7 custom-file mx-3">
                                                        <input type="file"
                                                            class="form-control @error('congtacvien_img') is-invalid @enderror custom-file-input"
                                                            id="congtacvien_img" name="congtacvien_img" required />
                                                        <label class="custom-file-label" for="congtacvien_img">Chọn file
                                                            hình
                                                            ảnh</label>
                                                        @error('congtacvien_img')
                                                            <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Trạng thái tài khoản</label>
                                                    <div class="col-lg-9">
                                                        <div class="form-check form-check-inline rounded border p-2">
                                                            <input class="form-check-input" type="radio" name="status"
                                                                id="blog_active" value="Active"
                                                                @if ($user->status == 'Active') checked="true" @endif>
                                                            <label class="form-check-label" for="blog_active"> Hoạt động
                                                            </label>
                                                            <span style="width: 30px;"></span>
                                                            <input class="form-check-input" type="radio" name="status"
                                                                id="blog_active_1" value="Inactive"
                                                                @if ($user->status == 'Inactive') checked="true" @endif>
                                                            <label class="form-check-label" for="blog_active_1"> Không
                                                                hoạt động
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h6 class="pt-3">Đổi mật khẩu</h6>
                                                <hr>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Mật khẩu</label>
                                                    <div class="col-lg-9">
                                                        <input type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            value="" id="password" name="password" />
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-eye" id="toggle-password"></i>
                                                        </span>
                                                        @error('password')
                                                            <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Xác nhận mật khẩu</label>
                                                    <div class="col-lg-9">
                                                        <input type="password"
                                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            value="" id="password_confirmation"
                                                            name="password_confirmation" />
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-eye" id="toggle-password-confirm"></i>
                                                        </span>
                                                        @error('password_confirmation')
                                                            <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary">Sửa đổi cộng tác
                                                        viên</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Hình đại diện hiện tại</p>
                                            <img class="w-100 h-75"
                                                src="{{ URL::to('/assets/backend/img/hoso/' . $user->image) }}"
                                                alt="Hình">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $("#password");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

            $("#toggle-password-confirm").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $("#password_confirmation");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
