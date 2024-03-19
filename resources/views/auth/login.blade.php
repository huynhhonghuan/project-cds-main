@extends('trangchu.layout')
@section('content')
    <section class="vh-100" style="margin-top: 90px">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem; background-color: #e5e7ef;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ URL::to('public/assets/frontend/img/login/login.png') }}" alt="login form"
                                    class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 98%;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    {{-- message --}}
                                    {!! Toastr::message() !!}
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <h2 class="fw-normal mb-3 pb-3 text-uppercase fw-bold fs-4 text-secondary"
                                            style="letter-spacing: 1px;">Đăng nhập
                                            vào tài khoản
                                        </h2>

                                        <div class="form-floating mb-4">
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

                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Nhớ đăng nhập
                                            </label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Đăng nhập</button>
                                        </div>

                                        <div class="mb-2">
                                            <a class="small text-muted" href="{{ route('password.request') }}">Quên mật
                                                khẩu?</a>
                                        </div>

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Không có tài khoản doanh nghiệp? <a
                                                href="{{ route('registerdoanhnghiep') }}" style="color: #393f81;">Đăng kí
                                                ngay</a></p>
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
