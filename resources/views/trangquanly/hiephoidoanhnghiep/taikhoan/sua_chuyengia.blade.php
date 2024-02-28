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
                @if ($user->getVaiTro[0]->id == 'cg')
                    <div id="table2" class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h4 class="card-title">Chuyên gia</h4> --}}
                            </div>
                            <div class="card-body">

                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                    <li class="nav-item"><a class="nav-link active tab-tab1-cg"
                                            href="#solid-rounded-justified-tab1-cg" data-toggle="tab">Thông tin chuyên
                                            gia</a></li>
                                    <li class="nav-item"><a class="nav-link tab-tab2-cg"
                                            href="#solid-rounded-justified-tab2-cg" data-toggle="tab">Thông tin tài
                                            khoản</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="solid-rounded-justified-tab1-cg">
                                        <form
                                            action="{{ route('admin.taikhoan.sua_loai', ['loai' => 'cg-tt', 'id' => $user->id]) }}"
                                            method="POST" enctype="multipart/form-data" class="needs-validation"
                                            novalidate>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tên chuyên gia</label>
                                                        <input type="text" class="form-control"
                                                            name="chuyengia_tendaidien"
                                                            value="{{ $user->getchuyengia->tenchuyengia }}" required>
                                                        <div class="invalid-feedback">
                                                            Nhập tên chuyên gia!
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Số điện thoại</label>
                                                                <input type="text" class="form-control"
                                                                    name="chuyengia_sdt"
                                                                    value="{{ $user->getchuyengia->sdt }}" required>
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
                                                                    <option value="">--Chọn vĩnh vực hoạt động--
                                                                    </option>
                                                                    @foreach ($linhvuc as $value)
                                                                        <option value="{{ $value->id }}"
                                                                            @if ($user->getchuyengia->linhvuc_id == $value->id) selected @endif>
                                                                            {{ $value->tenlinhvuc }}
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
                                                                    onclick="this.setAttribute('value', this.value);"
                                                                    value="" id="chuyengia_city_1"
                                                                    name="chuyengia_thanhpho" required>
                                                                    <option value="">--Chọn tỉnh--</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    value="{{ $user->getchuyengia->thanhpho }}"
                                                                    id="chuyengia_city_1_db">
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
                                                                    value="" id="chuyengia_district_1"
                                                                    name="chuyengia_huyen" required>
                                                                    <option value="">--Chọn quận/huyện--</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    value="{{ $user->getchuyengia->huyen }}"
                                                                    id="chuyengia_district_1_db">
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
                                                                    value="" id="chuyengia_ward_1" name="chuyengia_xa"
                                                                    required>
                                                                    <option value="">--Chọn phường/xã--</option>
                                                                </select>
                                                                <input type="hidden" value="{{ $user->getchuyengia->xa }}"
                                                                    id="chuyengia_ward_1_db">
                                                                <div class="invalid-feedback">
                                                                    Chọn phường/xã!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Địa chỉ</label>
                                                        <textarea rows="4" cols="5" class="form-control" placeholder="Enter message" name="chuyengia_diachi"
                                                            required>{{ $user->getchuyengia->diachi }}</textarea>
                                                        <div class="invalid-feedback">
                                                            Nhập địa chỉ chi tiết!
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Mô tả chi tiết</label>
                                                        <textarea rows="4" cols="5" class="form-control" name="chuyengia_mota" placeholder="Enter message">{{ $user->getchuyengia->mota }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>CCCD</label>
                                                        <input type="text" class="form-control" name="chuyengia_cccd"
                                                            value="{{ $user->getchuyengia->cccd }}" required>
                                                        <div class="invalid-feedback">
                                                            Nhập số căn cước công dân!
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Ảnh mặt trước CCCD</label>
                                                                <input type="file" class="form-control"
                                                                    name="chuyengia_cccd_img_mattruoc">
                                                                <div class="invalid-feedback">
                                                                    Chọn hình ảnh CCCD mặt trước!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Hình CCCD mặt trước hiện tại</label>
                                                                <img class="w-100 h-75"
                                                                    src="{{ URL::to('/assets/backend/img/hoso/' . $user->getchuyengia->img_mattruoc) }}"
                                                                    alt="Hình">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Ảnh mặt sau CCCD</label>
                                                                <input type="file" class="form-control"
                                                                    name="chuyengia_cccd_img_matsau">
                                                                <div class="invalid-feedback">
                                                                    Chọn hình ảnh CCCD mặt sau!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Hình CCCD mặt sau hiện tại</label>
                                                                <img class="w-100 h-75"
                                                                    src="{{ URL::to('/assets/backend/img/hoso/' . $user->getchuyengia->img_matsau) }}"
                                                                    alt="Hình">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Sửa đổi thông tin chuyên
                                                    gia</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab2-cg">
                                        <form
                                            action="{{ route('admin.taikhoan.sua_loai', ['loai' => 'cg-tk', 'id' => $user->id]) }}"
                                            method="POST" enctype="multipart/form-data" class="needs-validation"
                                            novalidate>
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6">
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
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Trạng thái tài khoản</label>
                                                        <div class="col-lg-9">
                                                            <div class="form-check form-check-inline rounded border p-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status" id="blog_active" value="Active"
                                                                    @if ($user->status == 'Active') checked="true" @endif>
                                                                <label class="form-check-label" for="blog_active"> Hoạt
                                                                    động
                                                                </label>
                                                                <span style="width: 30px;"></span>
                                                                <input class="form-check-input" type="radio"
                                                                    name="status" id="blog_active_1" value="Inactive"
                                                                    @if ($user->status == 'Inactive') checked="true" @endif>
                                                                <label class="form-check-label" for="blog_active_1"> Không
                                                                    hoạt động
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Hình đại diện doanh nghiệp</label>
                                                        <input type="file" class="form-control" name="chuyengia_img">
                                                        <div class="invalid-feedback">
                                                            Chọn hình ảnh đại diện!
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h6 class="text-center">Đổi mật khẩu</h6>
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
                                                        <img class="w-100 py-2"
                                                            src="{{ URL::to('/assets/backend/img/hoso/' . $user->image) }}"
                                                            alt="Hình">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Sửa đổi tài khoản chuyên
                                                    gia</button>
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

        var chuyengia_city_1_db = document.getElementById("chuyengia_city_1_db").value;
        var chuyengia_district_1_db = document.getElementById("chuyengia_district_1_db").value;
        var chuyengia_ward_1_db = document.getElementById("chuyengia_ward_1_db").value;

        var chuyengia_city_1 = document.getElementById("chuyengia_city_1");
        var chuyengia_district_1 = document.getElementById("chuyengia_district_1");
        var chuyengia_ward_1 = document.getElementById("chuyengia_ward_1");


        //địa chỉ của đại diện doanh nghiệp - xử lý bằng promise
        var chuyengia_promise_3 = axios(Parameter);
        chuyengia_promise_3.then(function(result) {
            renderCity(result.data, chuyengia_city_1, chuyengia_district_1, chuyengia_ward_1, chuyengia_city_1_db,
                chuyengia_district_1_db, chuyengia_ward_1_db);
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
        document.querySelector(".tab-tab1-cg").addEventListener("click", function() {
            tendanhsach.innerHTML = 'Sửa đổi thông tin chuyên gia';
        });

        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab2-cg").addEventListener("click", function() {
            tendanhsach.innerHTML = 'Sửa đổi thông tin tài khoản chuyên gia';
        });
    </script>
@endsection
