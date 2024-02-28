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
                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                    <li class="nav-item"><a class="nav-link active tab-tab1-hhdn"
                                            href="#solid-rounded-justified-tab1-hhdn" data-toggle="tab">Thông tin hiệp hội
                                            doanh
                                            nghiệp</a></li>
                                    <li class="nav-item"><a class="nav-link tab-tab2-hhdn"
                                            href="#solid-rounded-justified-tab2-hhdn" data-toggle="tab">Thông tin đại diện
                                            hiệp hội
                                            doanh nghiệp</a></li>
                                    <li class="nav-item"><a class="nav-link tab-tab3-hhdn"
                                            href="#solid-rounded-justified-tab3-hhdn" data-toggle="tab">Thông tin tài
                                            khoản</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="solid-rounded-justified-tab1-hhdn">
                                        <form
                                            action="{{ route('admin.taikhoan.sua_loai', ['loai' => 'hhdn-tt', 'id' => $user->id]) }}"
                                            method="POST" enctype="multipart/form-data" class="needs-validation"
                                            novalidate>
                                            @csrf
                                            {{-- <h4 class="card-title">Thông tin hiệp hội doanh nghiệp</h4> --}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tên tiếng việt</label>
                                                        <input type="text" class="form-control"
                                                            name="hiephoidoanhnghiep_tentiengviet"
                                                            value="{{ $user->gethiephoidoanhnghiep->tentiengviet }}"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tên tiếng anh</label>
                                                        <input type="text" class="form-control"
                                                            name="hiephoidoanhnghiep_tentienganh"
                                                            value="{{ $user->gethiephoidoanhnghiep->tentienganh }}"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" class="form-control"
                                                            name="hiephoidoanhnghiep_sdt" required
                                                            value="{{ $user->gethiephoidoanhnghiep->sdt }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tỉnh</label>
                                                                <select class="form-control"
                                                                    onclick="this.setAttribute('value', this.value);"
                                                                    value="" id="hiephoidoanhnghiep_city_1"
                                                                    name="hiephoidoanhnghiep_thanhpho" required>
                                                                    <option value="">--Chọn tỉnh--</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    value="{{ $user->gethiephoidoanhnghiep->thanhpho }}"
                                                                    id="hiephoidoanhnghiep_city_1_db">
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
                                                                    value="" id="hiephoidoanhnghiep_district_1"
                                                                    name="hiephoidoanhnghiep_huyen" required>
                                                                    <option value="">--Chọn quận/huyện--</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    value="{{ $user->gethiephoidoanhnghiep->huyen }}"
                                                                    id="hiephoidoanhnghiep_district_1_db">
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
                                                                    value="" id="hiephoidoanhnghiep_ward_1"
                                                                    name="hiephoidoanhnghiep_xa" required>
                                                                    <option value="">--Chọn phường/xã--</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    value="{{ $user->gethiephoidoanhnghiep->xa }}"
                                                                    id="hiephoidoanhnghiep_ward_1_db">
                                                                <div class="invalid-feedback">
                                                                    Chọn phường/xã!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Địa chỉ</label>
                                                        <textarea rows="4" cols="5" class="form-control" name="hiephoidoanhnghiep_diachi" required
                                                            placeholder="Enter message">{{$user->gethiephoidoanhnghiep->diachi}}</textarea>
                                                        <div class="invalid-feedback">
                                                            Thêm địa chỉ của hiệp hội doanh nghiệp!
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mô tả thông tin chi tiết</label>
                                                        <textarea rows="4" cols="5" class="form-control" name="hiephoidoanhnghiep_mota"
                                                            placeholder="Enter message">{{$user->gethiephoidoanhnghiep->mota}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Sửa thông tin hiệp hội
                                                    doanh
                                                    nghiệp</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab2-hhdn">
                                        <form
                                            action="{{ route('admin.taikhoan.sua_loai', ['loai' => 'hhdn-dd', 'id' => $user->id]) }}"
                                            method="POST" enctype="multipart/form-data" class="needs-validation"
                                            novalidate>
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tên người đại diện</label>
                                                        <input type="text" class="form-control" value="{{$user->gethiephoidoanhnghiep->getdaidien->tendaidien}}"
                                                            name="hiephoidoanhnghiep_daidien_tendaidien" required>
                                                        <div class="invalid-feedback">
                                                            Thêm tên người đại diện!
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control"
                                                            value="{{$user->gethiephoidoanhnghiep->getdaidien->email}}"
                                                            name="hiephoidoanhnghiep_daidien_email" required>
                                                        <div class="invalid-feedback">
                                                            Thêm email của người đại diện!
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" class="form-control" value="{{$user->gethiephoidoanhnghiep->getdaidien->sdt}}"
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
                                                            placeholder="Enter message">{{$user->gethiephoidoanhnghiep->getdaidien->mota}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Sửa thông tin đại diện hiệp
                                                    hội doanh
                                                    nghiệp</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab3-hhdn">
                                        <form
                                            action="{{ route('admin.taikhoan.sua_loai', ['loai' => 'hhdn-tk', 'id' => $user->id]) }}"
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
                                                        <input type="file" class="form-control"
                                                            name="hiephoidoanhnghiep_img">
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
                                                <button type="submit" class="btn btn-primary">Sửa đổi tài khoản
                                                    hiệp hội doanh nghiệp
                                                </button>
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
        var hiephoidoanhnghiep_city_1_db = document.getElementById("hiephoidoanhnghiep_city_1_db").value;
        var hiephoidoanhnghiep_district_1_db = document.getElementById("hiephoidoanhnghiep_district_1_db").value;
        var hiephoidoanhnghiep_ward_1_db = document.getElementById("hiephoidoanhnghiep_ward_1_db").value;

        //lấy địa chỉ cho form doanh nghiệp
        var hiephoidoanhnghiep_city_1 = document.getElementById("hiephoidoanhnghiep_city_1");
        var hiephoidoanhnghiep_district_1 = document.getElementById("hiephoidoanhnghiep_district_1");
        var hiephoidoanhnghiep_ward_1 = document.getElementById("hiephoidoanhnghiep_ward_1");


        var hiephoidoanhnghiep_promise_4 = axios(Parameter);
        hiephoidoanhnghiep_promise_4.then(function(result) {
            renderCity(result.data, hiephoidoanhnghiep_city_1, hiephoidoanhnghiep_district_1,
                hiephoidoanhnghiep_ward_1, hiephoidoanhnghiep_city_1_db, hiephoidoanhnghiep_district_1_db,
                hiephoidoanhnghiep_ward_1_db);
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
        document.querySelector(".tab-tab1-hhdn").addEventListener("click", function() {
            tendanhsach.innerHTML = 'Sửa đổi thông tin hiệp hội doanh nghiệp';
        });

        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab2-hhdn").addEventListener("click", function() {
            tendanhsach.innerHTML = 'Sửa đổi thông tin đại diện hiệp hội doanh nghiệp';
        });

        // Thêm sự kiện click cho phần tử <a>
        document.querySelector(".tab-tab3-hhdn").addEventListener("click", function() {
            tendanhsach.innerHTML = 'Sửa đổi thông tin tài khoản hiệp hội doanh nghiệp';
        });
    </script>
@endsection
