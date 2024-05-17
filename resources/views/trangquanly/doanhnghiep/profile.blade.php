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
                                <a href="#">
                                    <img src="{{ asset('assets/backend/img/hoso/'. Auth::user()->image) }}" alt="">    
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-3">{{Auth::user()->getdoanhnghiep->tentiengviet}}</h4>
                                <div class="about-text"><span style="font-weight: 600">Mô tả : </span>{{Auth::user()->getdoanhnghiep->mota}}</div>
                            </div>
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
                                                <span class="text-uppercase" style="color: blue">Thông tin doanh nghiệp</span>
                                                <a class="edit-link" style="color:#009688" data-toggle="modal" href="#edit_personal_details"><i
                                                        class="fa fa-edit mr-1"></i>Sửa</a>
                                            </h5>
                                            <div class="row mt-5">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Tên doanh nghiệp tiếng việt</p>
                                                @if(Auth::user()->getdoanhnghiep->tentiengviet == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->tentiengviet}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Tên doanh nghiệp tiếng anh</p>
                                                @if(Auth::user()->getdoanhnghiep->tentienganh == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->tentienganh}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Tên doanh nghiệp viết tắt</p>
                                                @if(Auth::user()->getdoanhnghiep->tenviettat == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->tenviettat}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Loại hình hoạt động</p>
                                                @if(Auth::user()->getdoanhnghiep->getloaihinh->tenloaihinh == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->getloaihinh->tenloaihinh}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Link website</p>
                                                @if(Auth::user()->getdoanhnghiep->website == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->website}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Mã thuế</p>
                                                @if(Auth::user()->getdoanhnghiep->mathue == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->mathue}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Fax</p>
                                                @if(Auth::user()->getdoanhnghiep->fax == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->fax}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Số lượng nhân sự</p>
                                                @if(Auth::user()->getdoanhnghiep->soluongnhansu == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->soluongnhansu}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0">Địa chỉ</p>
                                                @if(Auth::user()->getdoanhnghiep->diachi == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9 mb-0">{{Auth::user()->getdoanhnghiep->diachi}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-uppercase" style="color:#009688;font-weight:600">cập nhật Thông tin doanh nghiệp</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="row form-row">
                                                            <div class="col-12">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Tên doanh nghiệp tiếng việt</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->tentiengviet}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Tên doanh nghiệp tiếng anh</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->tentienganh}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Tên doanh nghiệp viết tắt</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->tenviettat}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Loại hình hoạt động</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->getloaihinh->tenloaihinh}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Link website</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->website}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Mã số thuế</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->mathue}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Fax</label>
                                                                    <input type="text" value="{{Auth::user()->getdoanhnghiep->fax}}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Số lượng nhân sự</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->soluongnhansu}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group"  style="margin-bottom: 18px">
                                                                    <label>Địa chỉ</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->diachi}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
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
                                                <span class="text-uppercase" style="color: blue">Thông tin đại diện</span>
                                                <a class="edit-link"  style="color: #009688" data-toggle="modal" href="#edit_personal_details1"><i
                                                        class="fa fa-edit mr-1"></i>Sửa</a>
                                            </h5>
                                            <div class="row mt-5">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Tên người đại diện</p>
                                                @if(Auth::user()->getdoanhnghiep->getdaidien->tendaidien == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->tendaidien}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email</p>
                                                @if(Auth::user()->getdoanhnghiep->getdaidien->email == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9" style="color: blue">[{{Auth::user()->getdoanhnghiep->getdaidien->email}}]</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Chức vụ</p>
                                                @if(Auth::user()->getdoanhnghiep->getdaidien->chucvu == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->chucvu}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Số điện thoại</p>
                                                @if(Auth::user()->getdoanhnghiep->getdaidien->sdt == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->sdt}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">CCCD</p>
                                                @if(Auth::user()->getdoanhnghiep->getdaidien->cccd == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->cccd}}</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Địa chỉ</p>
                                                @if(Auth::user()->getdoanhnghiep->getdaidien->diachi == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->diachi}}</p>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Mô tả</p>
                                                @if(Auth::user()->getdoanhnghiep->getdaidien->mota == null)
                                                    <div class="col-sm-9 d-flex">
                                                        <div class="">Chưa cập nhật...</div>
                                                        <span style="color: red;font-weight:800;margin-left:16px">*</span>
                                                    </div>
                                                @else 
                                                    <p class="col-sm-9">{{Auth::user()->getdoanhnghiep->getdaidien->mota}}</p>
                                                @endif    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="edit_personal_details1" aria-hidden="true"
                                        role="dialog">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-uppercase" style="color:#009688;font-weight:600">Cập nhật thông tin đại diện doanh nghiệp</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="row form-row">
                                                            <div class="col-12">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Họ tên người đại diện</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->getdaidien->tendaidien}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Chức vụ</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->getdaidien->chucvu}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Email</label>
                                                                    <input type="email" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->getdaidien->email}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Số điện thoại</label>
                                                                    <input type="text" value="{{Auth::user()->getdoanhnghiep->getdaidien->sdt}}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group"  style="margin-bottom: 6px">
                                                                    <label>Số CCCD</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->getdaidien->cccd}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group"  style="margin-bottom: 12px">
                                                                    <label>Địa chỉ</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->getdaidien->diachi}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group"  style="margin-bottom: 12px">
                                                                    <label>Mô tả</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{Auth::user()->getdoanhnghiep->getdaidien->mota}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
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
                                                <div class="form-group"  style="margin-bottom: 6px">
                                                    <label for="">Mật khẩu cũ</label>
                                                    <input type="password"
                                                        class="form-control @error('password_old') is-invalid @enderror"
                                                        id="password_old" name="password_old" required />
                                                    @error('password_old')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group"  style="margin-bottom: 6px">
                                                    <label for="">Mật khẩu mới</label>

                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="password" name="password" required />
                                                    @error('password')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group"  style="margin-bottom: 6px">
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
