@extends('auth.layout')
@section('content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left"> <img class="img-fluid" src="assets/img/logo.png" alt="Logo" style=" border-radius: 5px;"> </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1 class="mb-3">Register</h1>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email" value="{{ old('email') }}" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password" required autocomplete="off">
                                </div>
                                 <div class="form-group">
                                     <select class="form-control" id="role_name" name="role_name">
                                        <option value="doanhnghiep">Doanh nghiệp</option>
                                        <option value="chuyengia">Chuyên gia</option>
                                        <option value="hoidoanhnghiep">Hội doanh nghiệp</option>
                                        <option value="nhadautu">Nhà đầu tư</option>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                </div>
                            </form>
                            <div class="login-or">
                                <span class="or-line"></span> 
                                <span class="span-or">or</span> 
                            </div>
                            <div class="text-center dont-have">Đã có tài khoản? 
                                <a href="{{ route('login') }}">Đăng nhập</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection