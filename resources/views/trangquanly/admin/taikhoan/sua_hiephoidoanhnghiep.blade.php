@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}
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
                @if ($user->getVaiTro[0]->id == 'hhdn')
                    <div id="table3" class="col-md-12">
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
                                                            id="hiephoidoanhnghiep_city_1"
                                                            name="hiephoidoanhnghiep_thanhpho" required>
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
                                                            id="hiephoidoanhnghiep_district_1"
                                                            name="hiephoidoanhnghiep_huyen" required>
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
                                                <textarea rows="4" cols="5" class="form-control" name="hiephoidoanhnghiep_mota" placeholder="Enter message"></textarea>
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
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" value="hiephoidoanhnghiep1@gmail.com" name="email"
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
                                                    value="12345678" id="password_confirmation"
                                                    name="password_confirmation" required />
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
                                        <button type="submit" class="btn btn-primary">Tạo mới hiệp hội doanh
                                            nghiệp</button>
                                    </div>
                                </form>
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

        var chuyengia_city_1_db = document.getElementById("chuyengia_city_1_db").value;
        var chuyengia_district_1_db = document.getElementById("chuyengia_district_1_db").value;
        var chuyengia_ward_1_db = document.getElementById("chuyengia_ward_1_db").value;

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

        var hiephoidoanhnghiep_city_1 = document.getElementById("hiephoidoanhnghiep_city_1");
        var hiephoidoanhnghiep_district_1 = document.getElementById("hiephoidoanhnghiep_district_1");
        var hiephoidoanhnghiep_ward_1 = document.getElementById("hiephoidoanhnghiep_ward_1");

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

        //địa chỉ của đại diện doanh nghiệp - xử lý bằng promise
        var chuyengia_promise_3 = axios(Parameter);
        chuyengia_promise_3.then(function(result) {
            renderCity(result.data, chuyengia_city_1, chuyengia_district_1, chuyengia_ward_1, chuyengia_city_1_db,
                chuyengia_district_1_db, chuyengia_ward_1_db);
        });

        var hiephoidoanhnghiep_promise_4 = axios(Parameter);
        hiephoidoanhnghiep_promise_4.then(function(result) {
            renderCity(result.data, hiephoidoanhnghiep_city_1, hiephoidoanhnghiep_district_1,
                hiephoidoanhnghiep_ward_1);
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

        // // Thêm sự kiện click cho phần tử <a>
        // document.querySelector(".tab-tab1-cg").addEventListener("click", function() {
        //     tendanhsach.innerHTML = 'Sửa đổi thông tin chuyên gia';
        // });

        // // Thêm sự kiện click cho phần tử <a>
        // document.querySelector(".tab-tab2-cg").addEventListener("click", function() {
        //     tendanhsach.innerHTML = 'Sửa đổi thông tin tài khoản chuyên gia';
        // });
    </script>
@endsection
