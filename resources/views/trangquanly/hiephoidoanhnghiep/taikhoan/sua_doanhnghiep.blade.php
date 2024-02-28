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
                @if ($user->getVaiTro[0]->id == 'dn')
                    <div id="table1" class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h4 class="card-title">Doanh nghiệp</h4> --}}
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                    <li class="nav-item"><a class="nav-link active tab-tab1-dn"
                                            href="#solid-rounded-justified-tab1-dn" data-toggle="tab">Thông tin doanh
                                            nghiệp</a></li>
                                    <li class="nav-item"><a class="nav-link tab-tab2-dn"
                                            href="#solid-rounded-justified-tab2-dn" data-toggle="tab">Thông tin đại diện
                                            doanh nghiệp</a></li>
                                    <li class="nav-item"><a class="nav-link tab-tab3-dn"
                                            href="#solid-rounded-justified-tab3-dn" data-toggle="tab">Thông tin tài
                                            khoản</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="solid-rounded-justified-tab1-dn">
                                        <form
                                            action="{{ route('admin.taikhoan.sua_loai', ['loai' => 'dn-tt', 'id' => $user->id]) }}"
                                            method="POST" enctype="multipart/form-data" class="needs-validation"
                                            novalidate>
                                            @csrf
                                            {{-- <h4 class="card-title">Thông tin doanh nghiệp</h4> --}}
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tên doanh nghiệp tiếng việt</label>
                                                        <input type="text" class="form-control"
                                                            name="doanhnghiep_tentiengviet" required
                                                            value="{{ $user->getdoanhnghiep->tentiengviet }}">
                                                        <div class="invalid-feedback">
                                                            Nhập tên doanh nghiệp!
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tên doanh nghiệp tiếng anh</label>
                                                        <input type="text" class="form-control"
                                                            name="doanhnghiep_tentienganh" required
                                                            value="{{ $user->getdoanhnghiep->tentienganh }}">
                                                        <div class="invalid-feedback">
                                                            Nhập tên doanh nghiệp!
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tên doanh nghiệp viết tắt</label>
                                                        <input type="text" class="form-control"
                                                            name="doanhnghiep_tenviettat"
                                                            value="{{ $user->getdoanhnghiep->tenviettat }}">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Loại hình hoạt động chính</label>
                                                                <select class="form-control" id="sel1"
                                                                    name="doanhnghiep_loaihinh_id" required>
                                                                    <option value="">--Loại hình hoạt động--</option>
                                                                    @foreach ($loaihinh as $value)
                                                                        <option value="{{ $value->id }}"
                                                                            @if ($user->getdoanhnghiep->doanhnghiep_loaihinh_id == $value->id) selected @endif>
                                                                            {{ $value->tenloaihinh }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Chọn loại hình hoạt động chính!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Ngày thành lập</label>
                                                                <div class="cal-icon">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker"
                                                                        name="doanhnghiep_ngaylap"
                                                                        value="{{ Date::parse($user->getdoanhnghiep->ngaylap)->format('d/m/Y') }}"
                                                                        required>
                                                                    <div class="invalid-feedback">
                                                                        Nhập ngày thành lập công ty!
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Mã thuế</label>
                                                                <input type="text" class="form-control"
                                                                    name="doanhnghiep_mathue" required
                                                                    value="{{ $user->getdoanhnghiep->mathue }}">
                                                                <div class="invalid-feedback">
                                                                    Nhập mã thuế!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Fax</label>
                                                                <input type="text" class="form-control"
                                                                    name="doanhnghiep_fax"
                                                                    value="{{ $user->getdoanhnghiep->fax }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Nhân sự</label>
                                                                <input type="number" class="form-control"
                                                                    name="doanhnghiep_soluongnhansu"
                                                                    value="{{ $user->getdoanhnghiep->soluongnhansu }}"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Nhập số lượng nhân sự!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- viết nút tạo vòng lập để có thể thêm nhiều số điện thoại --}}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Số điện thoại</label>
                                                                <input type="text" class="form-control"
                                                                    name="doanhnghiep_sdt"
                                                                    value="{{ $user->getdoanhnghiep->getsdt->sdt }}"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Nhập số điện thoại của doanh nghiệp!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Loại số điện thoại</label>
                                                                <select class="form-control" id="loai_sdt"
                                                                    name="doanhnghiep_loai_sdt" name="loaisdt" required>
                                                                    <option value="">--Chọn--</option>
                                                                    <option
                                                                        @if ($user->getdoanhnghiep->getsdt->loaisdt == 'Văn phòng') selected @endif>
                                                                        Văn phòng</option>
                                                                    <option
                                                                        @if ($user->getdoanhnghiep->getsdt->loaisdt == 'Di động') selected @endif>Di
                                                                        động</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Chọn loại số điện thoại!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tỉnh</label>
                                                                <select class="form-control doanhnghiep_city_1"
                                                                    onclick="this.setAttribute('value', this.value);"
                                                                    value="" id="doanhnghiep_city_1"
                                                                    name="doanhnghiep_thanhpho" required>
                                                                    <option value="">--Chọn tỉnh--</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    value="{{ $user->getdoanhnghiep->thanhpho }}"
                                                                    id="doanhnghiep_city_1_db">
                                                                <div class="invalid-feedback">
                                                                    Chọn tỉnh/thành phố!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Quận / Huyện / Thành phố</label>
                                                                <select class="form-control"
                                                                    onclick="this.setAttribute('value', this.value);"
                                                                    onload="" value=""
                                                                    id="doanhnghiep_district_1" name="doanhnghiep_huyen"
                                                                    required>
                                                                    <option value="">--Chọn quận/huyện--</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    value="{{ $user->getdoanhnghiep->huyen }}"
                                                                    id="doanhnghiep_district_1_db">
                                                                <div class="invalid-feedback">
                                                                    Chọn quận/huyện/thành phố!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Phường / Xã</label>
                                                                <select class="form-control"
                                                                    onclick="this.setAttribute('value', this.value);"
                                                                    value="" id="doanhnghiep_ward_1"
                                                                    name="doanhnghiep_xa" required>
                                                                    <option value="">--Chọn phường/xã--</option>
                                                                    <input type="hidden"
                                                                        value="{{ $user->getdoanhnghiep->xa }}"
                                                                        id="doanhnghiep_ward_1_db">
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Chọn phường/xã!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Địa chỉ</label>
                                                        <textarea rows="4" cols="5" class="form-control" placeholder="Enter message" name="doanhnghiep_diachi"
                                                            required>{{ $user->getdoanhnghiep->diachi }}</textarea>
                                                        <div class="invalid-feedback">
                                                            Nhập địa chỉ chi tiết của doanh nghiệp!
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mô tả chi tiết doanh nghiệp</label>
                                                        <textarea rows="4" cols="5" class="form-control" placeholder="Enter message" name="doanhnghiep_mota">{{ $user->getdoanhnghiep->mota }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Sửa thông tin doanh
                                                    nghiệp</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab2-dn">
                                        <form
                                            action="{{ route('admin.taikhoan.sua_loai', ['loai' => 'dn-dd', 'id' => $user->id]) }}"
                                            method="POST" enctype="multipart/form-data" class="needs-validation"
                                            novalidate>
                                            @csrf
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tên người đại diện</label>
                                                        <input type="text" class="form-control"
                                                            name="doanhnghiep_daidien_tendaidien" required
                                                            value="{{ $user->getdoanhnghiep->getdaidien->tendaidien }}">
                                                        <div class="invalid-feedback">
                                                            Nhập tên người đại diện doanh nghiệp!
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <div class="form-group">
                                                                <label>Số điện thoại</label>
                                                                <input type="email" class="form-control"
                                                                    name="doanhnghiep_daidien_email"
                                                                    value="{{ $user->getdoanhnghiep->getdaidien->email }}"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Nhập email của người đại diện!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Số điện thoại</label>
                                                                <input type="text" class="form-control"
                                                                    name="doanhnghiep_daidien_sdt"
                                                                    value="{{ $user->getdoanhnghiep->getdaidien->sdt }}"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Nhập số điện thoại của người đại diện!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tỉnh</label>
                                                                <select class="form-control"
                                                                    onclick="this.setAttribute('value', this.value);"
                                                                    value="" id="doanhnghiep_city_2"
                                                                    name="doanhnghiep_daidien_thanhpho" required>
                                                                    <option value="">--Chọn tỉnh--</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    value="{{ $user->getdoanhnghiep->getdaidien->thanhpho }}"
                                                                    id="doanhnghiep_city_2_db">
                                                                <div class="invalid-feedback">
                                                                    Chọn tỉnh/thành phố!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Quận / Huyện / Thành phố</label>
                                                                <select class="form-control"
                                                                    onclick="this.setAttribute('value', this.value);"
                                                                    value="" id="doanhnghiep_district_2"
                                                                    name="doanhnghiep_daidien_huyen" required>
                                                                    <option value="">--Chọn quận/huyện--</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    value="{{ $user->getdoanhnghiep->getdaidien->huyen }}"
                                                                    id="doanhnghiep_district_2_db">
                                                                <div class="invalid-feedback">
                                                                    Chọn quận/huyện/thành phố!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Phường / Xã</label>
                                                                <select class="form-control"
                                                                    onclick="this.setAttribute('value', this.value);"
                                                                    value="" id="doanhnghiep_ward_2"
                                                                    name="doanhnghiep_daidien_xa" required>
                                                                    <option value="">--Chọn phường/xã--</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    value="{{ $user->getdoanhnghiep->getdaidien->xa }}"
                                                                    id="doanhnghiep_ward_2_db">
                                                                <div class="invalid-feedback">
                                                                    Chọn phường/xã!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Địa chỉ</label>
                                                        <textarea rows="4" cols="5" class="form-control" placeholder="Enter message"
                                                            name="doanhnghiep_daidien_diachi" required>{{ $user->getdoanhnghiep->getdaidien->diachi }}</textarea>
                                                        <div class="invalid-feedback">
                                                            Nhập địa chỉ chi tiết của người đại diện doanh nghiệp!
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mô tả chi tiết</label>
                                                        <textarea rows="4" cols="5" class="form-control" placeholder="Enter message"
                                                            name="doanhnghiep_daidien_mota">{{ $user->getdoanhnghiep->getdaidien->mota }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <div class="form-group">
                                                                <label>CCCD</label>
                                                                <input type="text" class="form-control"
                                                                    name="doanhnghiep_daidien_cccd" required
                                                                    value="{{ $user->getdoanhnghiep->getdaidien->cccd }}">
                                                                <div class="invalid-feedback">
                                                                    Nhập số căn cước công dân!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Chức vụ</label>
                                                                <select class="form-control" id="sel1"
                                                                    name="doanhnghiep_daidien_chucvu" required>
                                                                    <option value="">--- Chọn ---</option>
                                                                    <option value="Chủ tịch"
                                                                        @if ($user->getdoanhnghiep->getdaidien->chucvu == 'Chủ tịch') selected @endif>
                                                                        Chủ tịch</option>
                                                                    <option value="Giám đốc"
                                                                        @if ($user->getdoanhnghiep->getdaidien->chucvu == 'Giám đốc') selected @endif>
                                                                        Giám đốc</option>
                                                                    <option value="Quản lý"
                                                                        @if ($user->getdoanhnghiep->getdaidien->chucvu == 'Quản lý') selected @endif>
                                                                        Quản lý</option>
                                                                    <option value="Trưởng phòng"
                                                                        @if ($user->getdoanhnghiep->getdaidien->chucvu == 'Trưởng phòng') selected @endif>
                                                                        Trưởng phòng</option>
                                                                    <option value="Khác"
                                                                        @if ($user->getdoanhnghiep->getdaidien->chucvu == 'Khác') selected @endif>
                                                                        Khác</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Chọn chức vụ!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Ảnh mặt trước CCCD</label>
                                                                <input type="file" class="form-control"
                                                                    name="doanhnghiep_daidien_img_mattruoc">
                                                                <div class="invalid-feedback">
                                                                    Chọn hình ảnh CCCD mặt trước!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Hình CCCD mặt trước hiện tại</label>
                                                                <img class="w-100 h-75"
                                                                    src="{{ URL::to('/assets/backend/img/hoso/' . $user->getdoanhnghiep->getdaidien->img_mattruoc) }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Ảnh mặt sau CCCD</label>
                                                                <input type="file" class="form-control"
                                                                    name="doanhnghiep_daidien_img_matsau">
                                                                <div class="invalid-feedback">
                                                                    Chọn hình ảnh CCCD mặt sau!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Hình CCCD mặt sau hiện tại</label>
                                                                <img class="w-100 h-75"
                                                                    src="{{ URL::to('/assets/backend/img/hoso/' . $user->getdoanhnghiep->getdaidien->img_matsau) }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Sửa thông tin đại diện
                                                    doanh
                                                    nghiệp</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab3-dn">
                                        <form
                                            action="{{ route('admin.taikhoan.sua_loai', ['loai' => 'dn-tk', 'id' => $user->id]) }}"
                                            method="POST" enctype="multipart/form-data" class="needs-validation"
                                            novalidate>
                                            @csrf
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6 mx-auto">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" value="{{ $user->email }}" name="email"
                                                            value="{{ old('email') }}" required />
                                                        @error('email')
                                                            <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="margin-right: 30px;">Trạng thái tài khoản</label>
                                                        <div class="form-check form-check-inline rounded border p-2 w-100">
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

                                                    <div class="form-group">
                                                        <label>Hình đại diện doanh nghiệp mới</label>
                                                        <input type="file" class="form-control"
                                                            name="doanhnghiep_img">
                                                        <div class="invalid-feedback">
                                                            Chọn hình ảnh đại diện!
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <h6 class="text-center"> Đổi mật khẩu</h6>

                                                    <div class="form-group">
                                                        <label>Mật khẩu mới</label>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <input type="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    value="" id="password" name="password" />
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-eye" id="toggle-password"></i>
                                                                </span>
                                                                @error('password')
                                                                    <div class="invalid-feedback">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Xác nhận mật khẩu</label>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <input type="password"
                                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                    value="" id="password_confirmation"
                                                                    name="password_confirmation" />
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-eye" id="toggle-password-confirm"></i>
                                                                </span>
                                                                @error('password_confirmation')
                                                                    <div class="invalid-feedback">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Hình hiện tại</label>
                                                        <br>
                                                        <img class="w-50 py-2"
                                                            src="{{ URL::to('/assets/backend/img/hoso/' . $user->image) }}"
                                                            alt="Hình">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Sửa thông tin tài khoản
                                                    doanh
                                                    nghiệp</button>
                                            </div>
                                        </form>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        //lấy data tỉnh huyện xã từ link
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        //lấy dữ liệu lưu trong db
        var doanhnghiep_city_1_db = document.getElementById("doanhnghiep_city_1_db").value;
        var doanhnghiep_district_1_db = document.getElementById("doanhnghiep_district_1_db").value;
        var doanhnghiep_ward_1_db = document.getElementById("doanhnghiep_ward_1_db").value;

        var doanhnghiep_city_2_db = document.getElementById("doanhnghiep_city_2_db").value;
        var doanhnghiep_district_2_db = document.getElementById("doanhnghiep_district_2_db").value;
        var doanhnghiep_ward_2_db = document.getElementById("doanhnghiep_ward_2_db").value;

        //lấy địa chỉ cho form doanh nghiệp
        var doanhnghiep_city_1 = document.getElementById("doanhnghiep_city_1");
        var doanhnghiep_district_1 = document.getElementById("doanhnghiep_district_1");
        var doanhnghiep_ward_1 = document.getElementById("doanhnghiep_ward_1");

        var doanhnghiep_city_2 = document.getElementById("doanhnghiep_city_2");
        var doanhnghiep_district_2 = document.getElementById("doanhnghiep_district_2");
        var doanhnghiep_ward_2 = document.getElementById("doanhnghiep_ward_2");

        // địa chỉ của doanh nghiệp - xử lý bằng promise
        var doanhnghiep_promise_1 = axios(Parameter);
        doanhnghiep_promise_1.then(function(result) {
            renderCity(result.data, doanhnghiep_city_1, doanhnghiep_district_1, doanhnghiep_ward_1,
                doanhnghiep_city_1_db, doanhnghiep_district_1_db, doanhnghiep_ward_1_db);
        });

        //địa chỉ của đại diện doanh nghiệp - xử lý bằng promise
        var doanhnghiep_promise_2 = axios(Parameter);
        doanhnghiep_promise_2.then(function(result) {
            renderCity(result.data, doanhnghiep_city_2, doanhnghiep_district_2, doanhnghiep_ward_2,
                doanhnghiep_city_2_db, doanhnghiep_district_2_db, doanhnghiep_ward_2_db);
        });

        //xử lý lựa chọn tỉnh -> huyện -> xã
        function renderCity(data, citis, districts, wards, citis_db, districts_db, wards_db) {
            for (const x of data) {
                //xử lý chọn thành phố hiện tại theo db
                if (x.Id === citis_db) {
                    citis.options[citis.options.length] = new Option(x.Name, x.Id, true, 1);

                    //xử lý chọn huyện theo thành phố hiện tại theo db
                    const result = data.filter(n => n.Id === x.Id);
                    for (const k of result[0].Districts) {
                        if (k.Id === districts_db) {
                            districts.options[districts.options.length] = new Option(k.Name, k.Id, true, 1);

                            //xử lý chọn xã thoe huyện theo thành phố hiện tại theo db
                            const dataCity = data.filter((n) => n.Id === citis.value);
                            const dataWards = dataCity[0].Districts.filter(n => n.Id === k.Id)[0].Wards;

                            for (const w of dataWards) {
                                if (w.Id === wards_db)
                                    wards.options[wards.options.length] = new Option(w.Name, w.Id, true, 1);
                                else
                                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                            }
                        } else
                            districts.options[districts.options.length] = new Option(k.Name, k.Id);
                    }
                } else
                    citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }

            //lựa chọn huyện sau khi lựa chọn thành phố
            citis.onchange = function() {
                districts.length = 1;
                wards.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Id === this.value);

                    for (const k of result[0].Districts) {
                        districts.options[districts.options.length] = new Option(k.Name, k.Id);
                    }
                }
            };

            //lựa chọn xã sau khi lựa chọn huyện
            districts.onchange = function() {
                wards.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
            };
        }
    </script>
    <script>
        var tendanhsach = document.getElementById('title-tendanhsach');
        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab1-dn").addEventListener("click", function() {
            tendanhsach.innerHTML = 'Sửa đổi thông tin doanh nghiệp';
        });

        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab2-dn").addEventListener("click", function() {
            tendanhsach.innerHTML = 'Sửa đổi thông tin đại diện doanh nghiệp';
        });

        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab3-dn").addEventListener("click", function() {
            tendanhsach.innerHTML = 'Sửa đổi thông tin tài khoản doanh nghiệp';
        });
    </script>
@endsection
