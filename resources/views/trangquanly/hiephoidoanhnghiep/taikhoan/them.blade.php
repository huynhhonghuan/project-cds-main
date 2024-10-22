@extends('trangquanly.hiephoidoanhnghiep.layout'){{-- kế thừa form layout --}}
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">
                            <a href="{{ route('admin.taikhoan.danhsach') }}" class="btn"><i
                                    class="fa-solid fa-arrow-left"></i></a>
                            Thêm mới tài khoản
                        </h3>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control mt-5" id="select-1" name="sellist1">
                                <option value="table1">Doanh nghiệp</option>
                                <option value="table2">Chuyên gia</option>
                                {{-- <option value="table3">Hiệp hội doanh nghiệp</option>
                                <option value="table4">Cộng tác viên</option> --}}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="table1" class="col-md-12" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Doanh nghiệp</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.taikhoan.them_loai', ['loai' => 'dn']) }}" method="POST"
                                enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                <h4 class="card-title">Thông tin doanh nghiệp</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên doanh nghiệp tiếng việt</label>
                                            <input type="text" class="form-control" name="doanhnghiep_tentiengviet"
                                                required value="Công ty TNHH 3H">
                                            <div class="invalid-feedback">
                                                Nhập tên doanh nghiệp!
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Tên doanh nghiệp tiếng anh</label>
                                            <input type="text" class="form-control" name="doanhnghiep_tentienganh"
                                                required value="3H Company Limited">
                                            <div class="invalid-feedback">
                                                Nhập tên doanh nghiệp!
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Tên doanh nghiệp viết tắt</label>
                                            <input type="text" class="form-control" name="doanhnghiep_tenviettat"
                                                value="">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Loại hình hoạt động chính</label>
                                                    <select class="form-control" id="sel1"
                                                        name="doanhnghiep_loaihinh_id" required>
                                                        <option value="">--Loại hình hoạt động--</option>
                                                        @foreach ($loaihinh as $value)
                                                            <option value="{{ $value->id }}">{{ $value->tenloaihinh }}
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
                                                        <input type="text" class="form-control datetimepicker"
                                                            name="doanhnghiep_ngaylap" required>
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
                                                    <input type="text" class="form-control" name="doanhnghiep_mathue"
                                                        required value="810000">
                                                    <div class="invalid-feedback">
                                                        Nhập mã thuế!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fax</label>
                                                    <input type="text" class="form-control" name="doanhnghiep_fax"
                                                        value="0321456789">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nhân sự</label>
                                                    <input type="number" class="form-control"
                                                        name="doanhnghiep_soluongnhansu" value="100" required>
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
                                                    <input type="text" class="form-control" name="doanhnghiep_sdt"
                                                        value="0123456789" required>
                                                    <div class="invalid-feedback">
                                                        Nhập số điện thoại của doanh nghiệp!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Loại số điện thoại</label>
                                                    <select class="form-control" id="loai_sdt" name="doanhnghiep_loai_sdt"
                                                        name="loaisdt" required>
                                                        <option value="">--Chọn--</option>
                                                        <option value="Văn phòng">Văn phòng</option>
                                                        <option value="Di động">Di động</option>
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
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="doanhnghiep_city_1" name="doanhnghiep_thanhpho" required>
                                                        <option value="">--Chọn tỉnh--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn tỉnh/thành phố!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Quận / Huyện / Thành phố</label>
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="doanhnghiep_district_1" name="doanhnghiep_huyen" required>
                                                        <option value="">--Chọn quận/huyện--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn quận/huyện/thành phố!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Phường / Xã</label>
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="doanhnghiep_ward_1" name="doanhnghiep_xa" required>
                                                        <option value="">--Chọn phường/xã--</option>
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
                                                required></textarea>
                                            <div class="invalid-feedback">
                                                Nhập địa chỉ chi tiết của doanh nghiệp!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả chi tiết doanh nghiệp</label>
                                            <textarea rows="4" cols="5" class="form-control" placeholder="Enter message" name="doanhnghiep_mota"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="card-title">Thông tin đại diện</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên người đại diện</label>
                                            <input type="text" class="form-control"
                                                name="doanhnghiep_daidien_tendaidien" required value="Huỳnh Hồng Huân">
                                            <div class="invalid-feedback">
                                                Nhập tên người đại diện doanh nghiệp!
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label>Số điện thoại</label>
                                                    <input type="email" class="form-control"
                                                        name="doanhnghiep_daidien_email" value="huan1@gmail.com" required>
                                                    <div class="invalid-feedback">
                                                        Nhập email của người đại diện!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" class="form-control"
                                                        name="doanhnghiep_daidien_sdt" value="0398521471" required>
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
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="doanhnghiep_city_2" name="doanhnghiep_daidien_thanhpho"
                                                        required>
                                                        <option value="">--Chọn tỉnh--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn tỉnh/thành phố!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Quận / Huyện / Thành phố</label>
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="doanhnghiep_district_2" name="doanhnghiep_daidien_huyen"
                                                        required>
                                                        <option value="">--Chọn quận/huyện--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn quận/huyện/thành phố!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Phường / Xã</label>
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="doanhnghiep_ward_2" name="doanhnghiep_daidien_xa" required>
                                                        <option value="">--Chọn phường/xã--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn phường/xã!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <textarea rows="4" cols="5" class="form-control" placeholder="Enter message"
                                                name="doanhnghiep_daidien_diachi" required></textarea>
                                            <div class="invalid-feedback">
                                                Nhập địa chỉ chi tiết của người đại diện doanh nghiệp!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label>CCCD</label>
                                                    <input type="text" class="form-control"
                                                        name="doanhnghiep_daidien_cccd" required value="014785236932">
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
                                                        <option value="Chủ tịch">Chủ tịch</option>
                                                        <option value="Giám đốc">Giám đốc</option>
                                                        <option value="Quản lý">Quản lý</option>
                                                        <option value="Trưởng phòng">Trưởng phòng</option>
                                                        <option value="Khác">Khác</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn chức vụ!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Ảnh mặt trước CCCD</label>
                                            <input type="file" class="form-control"
                                                name="doanhnghiep_daidien_img_mattruoc" required>

                                            <div class="invalid-feedback">
                                                Chọn hình ảnh CCCD mặt trước!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh mặt sau CCCD</label>
                                            <input type="file" class="form-control"
                                                name="doanhnghiep_daidien_img_matsau" required>
                                            <div class="invalid-feedback">
                                                Chọn hình ảnh CCCD mặt sau!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả chi tiết</label>
                                            <textarea rows="4" cols="5" class="form-control" placeholder="Enter message"
                                                name="doanhnghiep_daidien_mota"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="card-title">Thông tin tài khoản</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                value="doanhnghiep1@gmail.com" name="email" value="{{ old('email') }}"
                                                required />
                                            @error('email')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                value="12345678" id="password" name="password" required />
                                            @error('password')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Xác nhận mật khẩu</label>
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                value="12345678" id="password_confirmation" name="password_confirmation"
                                                required />
                                            @error('password_confirmation')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Hình đại diện doanh nghiệp</label>
                                            <input type="file" class="form-control" name="doanhnghiep_img" required>
                                            <div class="invalid-feedback">
                                                Chọn hình ảnh đại diện!
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Tạo mới doanh nghiệp</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="table2" class="col-md-12" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Chuyên gia</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.taikhoan.them_loai', ['loai' => 'cg']) }}" method="POST"
                                enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                <h4 class="card-title">Thông tin chuyên gia</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên chuyên gia</label>
                                            <input type="text" class="form-control" name="chuyengia_tendaidien"
                                                value="Chuyên Gia 1" required>
                                            <div class="invalid-feedback">
                                                Nhập tên chuyên gia!
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" class="form-control" name="chuyengia_sdt"
                                                        value="0123456789" required>
                                                    <div class="invalid-feedback">
                                                        Nhập số điện thoại!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Lĩnh vực</label>
                                                    <select class="form-control" id=""
                                                        name="chuyengia_linhvuc_id" required>
                                                        <option value="">--Chọn vĩnh vực hoạt động--</option>
                                                        @foreach ($linhvuc as $value)
                                                            <option value="{{ $value->id }}">{{ $value->tenlinhvuc }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn lĩnh vực hoạt động của chuyên gia!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tỉnh</label>
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="chuyengia_city_1" name="chuyengia_thanhpho" required>
                                                        <option value="">--Chọn tỉnh--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn tỉnh/thành phố!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Quận / Huyện / Thành phố</label>
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="chuyengia_district_1" name="chuyengia_huyen" required>
                                                        <option value="">--Chọn quận/huyện--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn quận/huyện/thành phố!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Phường / Xã</label>
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="chuyengia_ward_1" name="chuyengia_xa" required>
                                                        <option value="">--Chọn phường/xã--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn phường/xã!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <textarea rows="4" cols="5" class="form-control" placeholder="Enter message" name="chuyengia_diachi"
                                                required></textarea>
                                            <div class="invalid-feedback">
                                                Nhập địa chỉ chi tiết!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CCCD</label>
                                            <input type="text" class="form-control" name="chuyengia_cccd"
                                                value="014785236996" required>
                                            <div class="invalid-feedback">
                                                Nhập số căn cước công dân!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh mặt trước CCCD</label>
                                            <input type="file" class="form-control" name="chuyengia_cccd_img_mattruoc"
                                                required>
                                            <div class="invalid-feedback">
                                                Chọn hình ảnh CCCD mặt trước!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh mặt sau CCCD</label>
                                            <input type="file" class="form-control" name="chuyengia_cccd_img_matsau"
                                                required>
                                            <div class="invalid-feedback">
                                                Chọn hình ảnh CCCD mặt sau!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả chi tiết</label>
                                            <textarea rows="4" cols="5" class="form-control" name="chuyengia_mota" placeholder="Enter message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">Thông tin tài khoản</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                value="chuyengia1@gmail.com" name="email" value="{{ old('email') }}"
                                                required />
                                            @error('email')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                value="12345678" id="password" name="password" required />
                                            @error('password')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Xác nhận mật khẩu</label>
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                value="12345678" id="password_confirmation" name="password_confirmation"
                                                required />
                                            @error('password_confirmation')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Hình đại diện doanh nghiệp</label>
                                            <input type="file" class="form-control" name="chuyengia_img" required>
                                            <div class="invalid-feedback">
                                                Chọn hình ảnh đại diện!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Tạo mới chuyên gia</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div id="table3" class="col-md-12" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Hiệp hội doanh nghiệp</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.taikhoan.them_loai', ['loai' => 'hhdn']) }}" method="POST"
                                enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                <h4 class="card-title">Thông tin hiệp hội doanh nghiệp</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên tiếng việt</label>
                                            <input type="text" class="form-control"
                                                name="hiephoidoanhnghiep_tentiengviet" value="Hiệp hội doanh nghiệp"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tên tiếng anh</label>
                                            <input type="text" class="form-control"
                                                name="hiephoidoanhnghiep_tentienganh" value="HHDN" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" name="hiephoidoanhnghiep_sdt"
                                                required value="0123654987">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tỉnh</label>
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="hiephoidoanhnghiep_city_1" name="hiephoidoanhnghiep_thanhpho"
                                                        required>
                                                        <option value="">--Chọn tỉnh--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn tỉnh/thành phố!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Quận / Huyện / Thành phố</label>
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="hiephoidoanhnghiep_district_1" name="hiephoidoanhnghiep_huyen"
                                                        required>
                                                        <option value="">--Chọn quận/huyện--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn quận/huyện/thành phố!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Phường / Xã</label>
                                                    <select class="form-control"
                                                        onclick="this.setAttribute('value', this.value);" value=""
                                                        id="hiephoidoanhnghiep_ward_1" name="hiephoidoanhnghiep_xa"
                                                        required>
                                                        <option value="">--Chọn phường/xã--</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Chọn phường/xã!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <textarea rows="4" cols="5" class="form-control" name="hiephoidoanhnghiep_diachi" required
                                                placeholder="Enter message"></textarea>
                                            <div class="invalid-feedback">
                                                Thêm địa chỉ của hiệp hội doanh nghiệp!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả thông tin chi tiết</label>
                                            <textarea rows="4" cols="5" class="form-control" name="hiephoidoanhnghiep_mota"
                                                placeholder="Enter message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="card-title">Thông tin đại diện hiệp hội doanh nghiệp</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên người đại diện</label>
                                            <input type="text" class="form-control" value="Hiệp hội 1"
                                                name="hiephoidoanhnghiep_daidien_tendaidien" required>
                                            <div class="invalid-feedback">
                                                Thêm tên người đại diện!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control"
                                                value="hiephoidoanhnghiep1@gmail.com"
                                                name="hiephoidoanhnghiep_daidien_email" required>
                                            <div class="invalid-feedback">
                                                Thêm email của người đại diện!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" value="0369852147"
                                                name="hiephoidoanhnghiep_daidien_sdt" required>
                                            <div class="invalid-feedback">
                                                Thêm số điện thoại của người đại diện!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mô tả thông tin chi tiết</label>
                                            <textarea rows="4" cols="5" class="form-control" name="hiephoidoanhnghiep_daidien_mota"
                                                placeholder="Enter message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="card-title">Thông tin tài khoản</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                value="hiephoidoanhnghiep1@gmail.com" name="email"
                                                value="{{ old('email') }}" required />
                                            @error('email')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                value="12345678" id="password" name="password" required />
                                            @error('password')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Xác nhận mật khẩu</label>
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                value="12345678" id="password_confirmation" name="password_confirmation"
                                                required />
                                            @error('password_confirmation')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Hình đại diện doanh nghiệp</label>
                                            <input type="file" class="form-control" name="hiephoidoanhnghiep_img"
                                                required>
                                            <div class="invalid-feedback">
                                                Chọn hình ảnh đại diện!
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Tạo mới hiệp hội doanh nghiệp</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="table4" class="col-md-8 mx-auto" style="display: none;">
                    <div class="col d-flex">
                        <div class="card rounded-top rounded-bottom w-100 border border-success-subtle">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin cộng tác viên</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.taikhoan.them_loai', ['loai' => 'ctv']) }}" method="POST"
                                    enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Họ và tên</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                value="Huân Huân" id="name" name="name"
                                                value="{{ old('name') }}" required />
                                            @error('name')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email</label>
                                        <div class="col-lg-9">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                value="huynh1@gmail.com" name="email" value="{{ old('email') }}"
                                                required />
                                            @error('email')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Mật khẩu</label>
                                        <div class="col-lg-9">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                value="12345678" id="password" name="password" required />
                                            @error('password')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Xác nhận mật khẩu</label>
                                        <div class="col-lg-9">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                value="12345678" id="password_confirmation" name="password_confirmation"
                                                required />
                                            @error('password_confirmation')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Hình ảnh đại diện</label>
                                        <div class="col-lg-9">
                                            <input type="file"
                                                class="form-control @error('congtacvien_img') is-invalid @enderror"
                                                id="congtacvien_img" name="congtacvien_img" required />
                                            @error('congtacvien_img')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Tạo mới cộng tác viên</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleSelectChange(event) {
            const select = event.target;
            const value = select.value;

            // Hiển thị thẻ tương ứng với value được chọn
            document.getElementById(value).style.display = "block";

            sessionStorage.setItem("table-select", value);

            // Ẩn các thẻ khác
            document.querySelectorAll("div[id^='table']").forEach((div) => {
                if (div.id !== value) {
                    div.style.display = "none";
                }
            });
        }
        // Gắn sự kiện click cho thẻ select
        document.getElementById("select-1").addEventListener("change", handleSelectChange);
    </script>

    <script>
        //load lại trang và set lại select
        window.addEventListener("load", function() {
            try {
                const loaiSession = sessionStorage.getItem("table-select");
                if (loaiSession != null) {
                    document.getElementById(loaiSession).style.display = "block";
                    document.querySelector('#select-1 [value="' + loaiSession + '"]').selected = true;
                } else {
                    document.getElementById('table1').style.display = "block";
                    document.querySelector('#select-1 [value="table1"]').selected = true;
                }
            } catch (error) {
                console.error("Lỗi:", error);
            }
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

    //chọn tỉnh huyện xã
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        //lấy data tỉnh huyện xã từ link
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };

        //lấy địa chỉ cho form doanh nghiệp
        var doanhnghiep_city_1 = document.getElementById("doanhnghiep_city_1");
        var doanhnghiep_district_1 = document.getElementById("doanhnghiep_district_1");
        var doanhnghiep_ward_1 = document.getElementById("doanhnghiep_ward_1");

        var doanhnghiep_city_2 = document.getElementById("doanhnghiep_city_2");
        var doanhnghiep_district_2 = document.getElementById("doanhnghiep_district_2");
        var doanhnghiep_ward_2 = document.getElementById("doanhnghiep_ward_2");

        var chuyengia_city_1 = document.getElementById("chuyengia_city_1");
        var chuyengia_district_1 = document.getElementById("chuyengia_district_1");
        var chuyengia_ward_1 = document.getElementById("chuyengia_ward_1");

        // var hiephoidoanhnghiep_city_1 = document.getElementById("hiephoidoanhnghiep_city_1");
        // var hiephoidoanhnghiep_district_1 = document.getElementById("hiephoidoanhnghiep_district_1");
        // var hiephoidoanhnghiep_ward_1 = document.getElementById("hiephoidoanhnghiep_ward_1");

        // địa chỉ của doanh nghiệp - xử lý bằng promise
        var doanhnghiep_promise_1 = axios(Parameter);
        doanhnghiep_promise_1.then(function(result) {
            renderCity(result.data, doanhnghiep_city_1, doanhnghiep_district_1, doanhnghiep_ward_1);
        });

        //địa chỉ của đại diện doanh nghiệp - xử lý bằng promise
        var doanhnghiep_promise_2 = axios(Parameter);
        doanhnghiep_promise_2.then(function(result) {
            renderCity(result.data, doanhnghiep_city_2, doanhnghiep_district_2, doanhnghiep_ward_2);
        });

        //địa chỉ của đại diện doanh nghiệp - xử lý bằng promise
        var chuyengia_promise_3 = axios(Parameter);
        chuyengia_promise_3.then(function(result) {
            renderCity(result.data, chuyengia_city_1, chuyengia_district_1, chuyengia_ward_1);
        });

        // var hiephoidoanhnghiep_promise_4 = axios(Parameter);
        // hiephoidoanhnghiep_promise_4.then(function(result) {
        //     renderCity(result.data, hiephoidoanhnghiep_city_1, hiephoidoanhnghiep_district_1,
        //         hiephoidoanhnghiep_ward_1);
        // });


        //xử lý lựa chọn tỉnh -> huyện -> xã
        function renderCity(data, citis, districts, wards) {
            for (const x of data) {
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
@endsection
