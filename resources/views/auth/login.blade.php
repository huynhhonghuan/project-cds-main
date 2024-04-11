@extends('trangchu.layout')
@section('content')
    <section class="vh-100" style="margin-top: 90px;background-image: url(../image/AnhNen/title-area-pattern.png);">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-9">
                    <div class="card" style="box-shadow: 1px 1px 2px 1.5px #999">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block" style="">
                                <img src="{{ URL::to('assets/frontend/img/login/login.png') }}" alt="login form"
                                    class="img-fluid" style="height: 100%;border-radius: 4px 0 0px 4px;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    {{-- message --}}
                                    {!! Toastr::message() !!}
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <h2 class="mb-3 pb-3 text-uppercase text-center fw-bolder text-warning"
                                            style="letter-spacing: 1px;font-size: 28px">Đăng nhập
                                            vào tài khoản
                                        </h2>

                                        <div class="form-floating mb-4 mt-4">
                                            <input type="text" id="floatingEmail" name="email"
                                                class="form-control form-control-lg {{ $errors->has('email') || $errors->has('phone') ? 'is-invalid' : '' }}"
                                                placeholder="Email" />
                                            <label class="form-label" for="floatingEmail">Email</label>

                                            {{-- @if ($errors->has('email') || $errors->has('username'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}</strong>
                                                </div>
                                            @enderror --}}
                                        </div>

                                        <div class="form-floating mb-2">
                                            <input type="password" id="floatingPassword" name="password"
                                                class="form-control form-control-lg" placeholder="Password" />
                                            <label class="form-label" for="floatingPassword">Password</label>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <div class="form-check mb-4">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Nhớ đăng nhập
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6" style="display:flex;justify-content:flex-end;">
                                                <div class="mb-2">
                                                    <a class="small text-muted" href="{{ route('password.request') }}">Quên mật
                                                        khẩu?
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-1 d-flex justify-content-center">
                                            <button class="col-12 btn btn-dark btn-lg btn-block text-uppercase" type="submit">Đăng nhập</button>
                                        </div>
                                        <div class="col d-flex" style="justify-content: center">
                                            <div class="mt-4 d-flex pe-3 fw-bold" style="align-items: center">Hoặc</div>
                                            <div class="mt-4" style="display:flex;justify-content: center">
                                                <a href="{{ route('auth.google') }}">
                                                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                                                </a>
                                            </div>
                                        </div>
                                        

                                        <p class="mt-4 pb-lg-2 text-center" style="color: #000000;">Không có tài khoản doanh nghiệp ? 
                                            <a class="fw-bold text-uppercase" href="{{ route('registerdoanhnghiep') }}" style="color: #ffc107;">Đăng kí
                                                ngay
                                            </a>
                                        </p>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
