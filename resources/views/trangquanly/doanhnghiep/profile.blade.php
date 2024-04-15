@extends('trangquanly.doanhnghiep.layout')
@section('content')
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Thông tin chi tiết doanh nghiệp</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thông tin chi tiết doanh nghiệp</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#"> <img class="rounded-circle" alt="User Image"
                                        src="assets/img/profiles/avatar-02.jpg"> </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-3">{{ Auth::user()->name ?? Auth::user()->getdoanhnghiep->tentiengviet}}</h4>
                                <h6 class="text-muted mt-1">Mô tả</h6>
                                {{-- <div class="user-Location mt-1"><i class="fas fa-map-marker-alt"></i> Florida, United States
                                </div> --}}
                                <div class="about-text">{{Auth::user()->getdoanhnghiep->mota}}</div>
                            </div>
                            {{-- <div class="col-auto profile-btn"> <a href="" class="btn btn-primary">
                                    Message
                                </a> <a href="edit-profile.html" class="btn btn-primary">
                                    Edit
                                </a> </div> --}}
                        </div>
                    </div>
                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#per_details_tab">Thông
                                    tin</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password_tab">Mật khẩu</a>
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
                                                <span>Thông tin doanh nghiệp</span>
                                                <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
                                                        class="fa fa-edit mr-1"></i>Sửa</a>
                                            </h5>
                                            <div class="row mt-5">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Tên doanh nghiệp tiếng việt</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->tentiengviet}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Tên doanh nghiệp tiếng anh</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->tentienganh}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Tên doanh nghiệp viết tắt</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->tenviettat}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Loại hình hoạt động</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getloaihinh->tenloaihinh}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Mã thuế</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->mathue}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Fax</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->fax}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Số lượng nhân sự</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->soluongnhansu}}</p>
                                            </div>
                                            {{-- <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email ID </p>
                                                <p class="col-sm-9"><a href="/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="caaeabbca3aeaba6bcabb8afb08aafb2aba7baa6afe4a9a5a7">[email&#160;protected]</a>
                                                </p>
                                            </div> --}}
                                            {{-- <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                <p class="col-sm-9">305-310-5857</p>
                                            </div> --}}
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0">Địa chỉ</p>
                                                <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->diachi}},
                                                    <br> Miami,
                                                    <br> Florida - 33165,
                                                    <br> United States.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
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
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Thông tin đại diện</span>
                                                <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
                                                        class="fa fa-edit mr-1"></i>Sửa</a>
                                            </h5>
                                            <div class="row mt-5">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Tên người đại diện</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->tendaidien}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email</p>
                                                <p class="col-sm-9"><a href="/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="385c594e515c59544e594a5d42785d40595548545d165b5755">[{{Auth::user()->getdoanhnghiep->getdaidien->email}}]</a>
                                                </p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Chức vụ</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->chucvu}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Số điện thoại</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->sdt}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">CCCD</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->cccd}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0">Địa chỉ</p>
                                                <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->getdaidien->diachi}},
                                                    <br> Miami,
                                                    <br> Florida - 33165,
                                                    <br> United States.
                                                </p>
                                            </div>

                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Mô tả chi tiết đại diện doanh nghiệp</p>
                                                <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->mota}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="edit_personal_details1" aria-hidden="true"
                                        role="dialog">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="password_tab" class="tab-pane fade">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Đổi mật khẩu</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-lg-6">
                                            <form action="{{ route('doanhnghiep.doimatkhau', [Auth::user()->id]) }}"
                                                method="POST" enctype="multipart/form-data" class="needs-validation"
                                                novalidate>
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Mật khẩu cũ</label>
                                                    <input type="password"
                                                        class="form-control @error('password_old') is-invalid @enderror"
                                                        id="password_old" name="password_old" required />
                                                    @error('password_old')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Mật khẩu mới</label>

                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="password" name="password" required />
                                                    @error('password')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Xác nhận mật khẩu mới</label>
                                                    <input type="password"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                                        id="password_confirmation" name="password_confirmation"
                                                        required />
                                                    @error('password_confirmation')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                        </div>
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
