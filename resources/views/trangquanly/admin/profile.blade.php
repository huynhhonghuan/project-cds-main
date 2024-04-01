@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
@section('content')
    {{-- thêm content vào form kế thừa chỗ @yield('content') --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Thông tin</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thông tin</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#per_details_tab">Thông
                                    tin</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password_tab">Đổi mật
                                    khẩu</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Thông tin cá nhân</span>
                                                <a class="edit-link" data-toggle="modal" href="#"><i
                                                        class="fa fa-edit mr-1"></i>Sửa</a>
                                            </h5>
                                            <div class="row mt-5">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Tên</p>
                                                <p class="col-sm-9">{{ Auth::user()->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Personal Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="row form-row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>First Name</label>
                                                                    <input type="text" class="form-control"
                                                                        value="John">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Last Name</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Doe">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Date of Birth</label>
                                                                    <div class="cal-icon">
                                                                        <input type="text" class="form-control"
                                                                            value="24-07-1983">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Email ID</label>
                                                                    <input type="email" class="form-control"
                                                                        value="johndoe@example.com">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Mobile</label>
                                                                    <input type="text" value="+1 202-555-0125"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <h5 class="form-title"><span>Address</span></h5>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <input type="text" class="form-control"
                                                                        value="4663 Agriculture Lane">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>City</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Miami">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>State</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Florida">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Zip Code</label>
                                                                    <input type="text" class="form-control"
                                                                        value="22434">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                                    <input type="text" class="form-control"
                                                                        value="United States">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-block">Save
                                                            Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div id="password_tab" class="tab-pane fade">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Đổi mật khẩu</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-lg-6">
                                            <form action="{{ route('admin.doimatkhau', [Auth::user()->id]) }}"
                                                method="POST" enctype="multipart/form-data" class="needs-validation"
                                                novalidate>
                                                @csrf
                                                <div class="form-group">
                                                    <input type="password"
                                                        class="form-control @error('password_old') is-invalid @enderror"
                                                        id="password_old" name="password_old" required />
                                                    @error('password_old')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="password" name="password" required />
                                                    @error('password')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="password"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                                        id="password_confirmation" name="password_confirmation" required />
                                                    @error('password_confirmation')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                </div>

                                                <button class="btn btn-primary" type="submit">Lưu mật khẩu</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
