@extends('trangquanly.chuyengia.layout'){{-- kế thừa form layout --}}
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
                            <a href="{{ route('chuyengia.doanhnghiep.danhsach') }}" class="btn"><i
                                    class="fa-solid fa-arrow-left"></i></a>
                            <span id="title-tendanhsach"> {{ $tendanhsach }} </span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin doanh nghiệp</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <span>Tên doanh nghiệp tiếng việt:
                                    {{ $user->getdoanhnghiep->tentiengviet }}</span>
                            </div>

                            <div class="form-group">
                                <label>Tên doanh nghiệp tiếng anh:
                                    {{ $user->getdoanhnghiep->tentienganh }}</label>
                            </div>

                            <div class="form-group">
                                <label>Tên doanh nghiệp viết tắt: {{ $user->getdoanhnghiep->tenviettat }}</label>
                            </div>
                            <div class="form-group">
                                <label>Loại hình hoạt động chính:
                                    {{ $user->getdoanhnghiep->getloaihinh->tenloaihinh }}</label>
                            </div>
                            <div class="form-group">
                                <label>Ngày thành lập:
                                    {{ Date::parse($user->getdoanhnghiep->ngaylap)->format('d/m/Y') }}</label>

                            </div>
                            <div class="form-group">
                                <label>Mã thuế: {{ $user->getdoanhnghiep->mathue }}</label>

                            </div>
                            <div class="form-group">
                                <label>Fax: {{ $user->getdoanhnghiep->fax }}</label>

                            </div>
                            <div class="form-group">
                                <label>Nhân sự: {{ $user->getdoanhnghiep->soluongnhansu }} người</label>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại: {{ $user->getdoanhnghiep->sdt }}</label>
                            </div>

                            <div class="form-group">
                                <p id="doanhnghiep_local_1_page">Địa chỉ: </p>
                                <input type="hidden" value="{{ $user->getdoanhnghiep->diachi }}"
                                    id="doanhnghiep_local_1_db">
                                <input type="hidden" value="{{ $user->getdoanhnghiep->thanhpho }}"
                                    id="doanhnghiep_city_1_db">
                                <input type="hidden" value="{{ $user->getdoanhnghiep->huyen }}"
                                    id="doanhnghiep_district_1_db">
                                <input type="hidden" value="{{ $user->getdoanhnghiep->xa }}" id="doanhnghiep_ward_1_db">
                            </div>
                            <div class="form-group">
                                <label>Mô tả chi tiết doanh nghiệp: {{ $user->getdoanhnghiep->mota }} </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin đại diện doanh nghiệp</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <span>Tên người đại diện:
                                    {{ $user->getdoanhnghiep->getdaidien->tendaidien }}</span>
                            </div>

                            <div class="form-group">
                                <label>Email:
                                    {{ $user->getdoanhnghiep->getdaidien->email }}</label>
                            </div>
                            <div class="form-group">
                                <label>Chức vụ: {{ $user->getdoanhnghiep->getdaidien->chucvu }}</label>
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại: {{ $user->getdoanhnghiep->getdaidien->sdt }}</label>
                            </div>

                            <div class="form-group">
                                <label>Số CCCD: {{ $user->getdoanhnghiep->getdaidien->cccd }}</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hình CCCD mặt trước:</label>
                                        <br>
                                        <img class="w-100 h-75"
                                            src="{{ URL::to('/assets/backend/img/hoso/' . $user->getdoanhnghiep->getdaidien->img_mattruoc) }}"
                                            alt="Hình">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hình CCCD mặt sau:</label>
                                        <br>
                                        <img class="w-100 h-75"
                                            src="{{ URL::to('/assets/backend/img/hoso/' . $user->getdoanhnghiep->getdaidien->img_matsau) }}"
                                            alt="Hình">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <p id="doanhnghiep_local_2_page">Địa chỉ: </p>
                                <input type="hidden" value="{{ $user->getdoanhnghiep->getdaidien->diachi }}"
                                    id="doanhnghiep_local_2_db">
                                <input type="hidden" value="{{ $user->getdoanhnghiep->getdaidien->thanhpho }}"
                                    id="doanhnghiep_city_2_db">
                                <input type="hidden" value="{{ $user->getdoanhnghiep->getdaidien->huyen }}"
                                    id="doanhnghiep_district_2_db">
                                <input type="hidden" value="{{ $user->getdoanhnghiep->getdaidien->xa }}"
                                    id="doanhnghiep_ward_2_db">
                            </div>

                            <div class="form-group">
                                <label>Mô tả chi tiết đại diện doanh nghiệp:
                                    {{ $user->getdoanhnghiep->getdaidien->mota }} </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin tài khoản</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <span>Email của doanh nghiệp:
                                    {{ $user->email }}</span>
                            </div>

                            <div class="form-group">
                                <label>Hình đại diện doanh nghiệp:</label>
                                <br>
                                <img class="w-100 h-50" src="{{ URL::to('/assets/backend/img/hoso/' . $user->image) }}"
                                    alt="Hình">
                            </div>

                        </div>

                    </div>
                </div>
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
        var doanhnghiep_city_1_db = document.getElementById("doanhnghiep_city_1_db");
        var doanhnghiep_district_1_db = document.getElementById("doanhnghiep_district_1_db");
        var doanhnghiep_ward_1_db = document.getElementById("doanhnghiep_ward_1_db");
        var doanhnghiep_local_1_db = document.getElementById("doanhnghiep_local_1_db");

        var doanhnghiep_city_2_db = document.getElementById("doanhnghiep_city_2_db");
        var doanhnghiep_district_2_db = document.getElementById("doanhnghiep_district_2_db");
        var doanhnghiep_ward_2_db = document.getElementById("doanhnghiep_ward_2_db");
        var doanhnghiep_local_2_db = document.getElementById("doanhnghiep_local_2_db");

        var chuyengia_city_1_db = document.getElementById("chuyengia_city_1_db");
        var chuyengia_district_1_db = document.getElementById("chuyengia_district_1_db");
        var chuyengia_ward_1_db = document.getElementById("chuyengia_ward_1_db");
        var chuyengia_local_1_db = document.getElementById("chuyengia_local_1_db");

        var hiephoidoanhnghiep_city_1_db = document.getElementById("hiephoidoanhnghiep_city_1_db");
        var hiephoidoanhnghiep_district_1_db = document.getElementById("hiephoidoanhnghiep_district_1_db");
        var hiephoidoanhnghiep_ward_1_db = document.getElementById("hiephoidoanhnghiep_ward_1_db");
        var hiephoidoanhnghiep_local_1_db = document.getElementById("hiephoidoanhnghiep_local_1_db");

        //lấy địa chỉ cho form

        var doanhnghiep_local_1_page = document.getElementById("doanhnghiep_local_1_page");

        var doanhnghiep_local_2_page = document.getElementById("doanhnghiep_local_2_page");

        var chuyengia_local_1_page = document.getElementById("chuyengia_local_1_page");

        var hiephoidoanhnghiep_local_1_page = document.getElementById("hiephoidoanhnghiep_local_1_page");

        // địa chỉ của doanh nghiệp - xử lý bằng promise
        var doanhnghiep_promise_1 = axios(Parameter);
        doanhnghiep_promise_1.then(function(result) {
            renderCity(result.data, doanhnghiep_city_1_db.value, doanhnghiep_district_1_db.value,
                doanhnghiep_ward_1_db.value,
                doanhnghiep_local_1_db.value,
                doanhnghiep_local_1_page);
        });

        // //địa chỉ của đại diện doanh nghiệp - xử lý bằng promise
        var doanhnghiep_promise_2 = axios(Parameter);
        doanhnghiep_promise_2.then(function(result) {
            renderCity(result.data, doanhnghiep_city_2_db.value, doanhnghiep_district_2_db.value,
                doanhnghiep_ward_2_db.value,
                doanhnghiep_local_2_db.value, doanhnghiep_local_2_page);
        });

        // //địa chỉ của đại diện doanh nghiệp - xử lý bằng promise
        var chuyengia_promise_3 = axios(Parameter);
        chuyengia_promise_3.then(function(result) {
            renderCity(result.data, chuyengia_city_1_db.value, chuyengia_district_1_db.value, chuyengia_ward_1_db
                .value,
                chuyengia_local_1_db.value, chuyengia_local_1_page);
        });

        var hiephoidoanhnghiep_promise_4 = axios(Parameter);
        hiephoidoanhnghiep_promise_4.then(function(result) {
            renderCity(result.data, hiephoidoanhnghiep_city_1_db.value, hiephoidoanhnghiep_district_1_db.value,
                hiephoidoanhnghiep_ward_1_db.value, hiephoidoanhnghiep_local_1_db.value,
                hiephoidoanhnghiep_local_1_page);
        });

        //xử lý lựa chọn tỉnh -> huyện -> xã
        function renderCity(data, citis_db, districts_db, wards_db, local_db, local_page) {
            var city, district, ward;
            for (const x of data) {
                //xử lý chọn thành phố hiện tại theo db
                if (x.Id === citis_db) {
                    city = x.Name;
                    // xử lý chọn huyện theo thành phố hiện tại theo db
                    const result = data.filter(n => n.Id === x.Id);
                    for (const k of result[0].Districts) {
                        if (k.Id === districts_db) {

                            district = k.Name;

                            //xử lý chọn xã thoe huyện theo thành phố hiện tại theo db
                            const dataCity = data.filter(n => n.Id === x.Id);
                            const dataWards = dataCity[0].Districts.filter(n => n.Id === k.Id)[0].Wards;

                            for (const w of dataWards) {
                                if (w.Id === wards_db) {
                                    ward = w.Name;
                                }
                            }
                        }
                    }
                }
            }
            var local = 'Địa chỉ: ' + local_db + ', ' + ward + ', ' + district + ', ' + city;
            local_page.innerHTML = local;
        }
    </script>
@endsection
