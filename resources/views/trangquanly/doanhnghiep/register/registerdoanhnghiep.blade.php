@extends('trangchu.layout')
@section('style')
    <style>
        .form-select,
        .form-control {
            border: none;
            border-radius: 0 !important;
        }

        .floating-label {
            position: relative;
            margin-bottom: 20px;
        }

        .floating-select {
            font-size: 14px;
            padding-top: 10px;
            margin-left: 4px;
            display: block;
            width: 100%;
            height: 55px;
            background-color: transparent;
            border: none;
        }

        .floating-select:focus {
            box-shadow: 0 0 0 0.2rem rgb(192, 192, 255);
        }

        .label-select {
            font-size: 15px;
            font-weight: normal;
            position: absolute;
            pointer-events: none;
            top: 15px;
            left: 15px;
            transition: 0.2s ease all;
            -moz-transition: 0.2s ease all;
            -webkit-transition: 0.2s ease all;
        }

        .floating-select:focus~label,
        .floating-select:not([value=""]):valid~label {
            top: 2px;
            font-size: 14px;
            color: #5264AE;
        }

        /* active state */
        .floating-select:focus~.floating-select:focus~ {
            width: 50%;
        }

        *,
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        /* active state */
        .floating-select:focus~ {
            -webkit-animation: inputHighlighter 0.3s ease;
            -moz-animation: inputHighlighter 0.3s ease;
            animation: inputHighlighter 0.3s ease;
        }

        /* thay đổi thuộc tính input kiểu file */

        input[type="file"] {
            &::-webkit-file-upload-button {
                display: none;
            }

            &::file-selector-button {
                display: none;
            }
        }

        &:hover {
            label {
                /* background-color: #dde0e3; */
                cursor: pointer;
            }
        }
    </style>
@endsection
@section('content')
<section class="vh-100" style="margin-top: 70px;background-image: url(../image/AnhNen/title-area-pattern.png);">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-9">
                <div class="card" style="box-shadow: 1px 1px 2px 1.5px #999">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block" style="">
                            <img src="{{ URL::to('assets/frontend/img/login/login.png') }}" alt="login form"
                                class="img-fluid" style="height: 100%;border-radius: 4px 0 0px 4px;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 text-black">
                                {{-- message --}}
                                {!! Toastr::message() !!}
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <h2 class="mb-3 pb-3 text-uppercase text-center fw-bolder text-uppercase"
                                        style="letter-spacing: 1px;font-size: 24px">Đăng kí tài khoản doanh nghiệp
                                    </h2>

                                    <div class="form-floating mb-2">
                                        <input type="text" id="floatingTenDN" name="tendn"
                                            class="form-control form-control-lg {{ $errors->has('tentiengviet') || $errors->has('tentiengviet') ? 'is-invalid' : '' }}"
                                            placeholder="Tên Doanh Nghiệp" />
                                        <label class="form-label" for="floatingTenDN">Đơn vị</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="text" id="floatingTenDN" name="tendn"
                                            class="form-control form-control-lg {{ $errors->has('tentiengviet') || $errors->has('tentiengviet') ? 'is-invalid' : '' }}"
                                            placeholder="Tên Doanh Nghiệp" />
                                        <label class="form-label" for="floatingTenDN">Họ và Tên</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="text" id="floatingEmail" name="email"
                                            class="form-control form-control-lg {{ $errors->has('email') || $errors->has('phone') ? 'is-invalid' : '' }}"
                                            placeholder="Email" />
                                        <label class="form-label" for="floatingEmail">Email</label>
                                    </div>

                                    <div class="form-floating mb-2">
                                        <input type="password" id="floatingPassword" name="password"
                                            class="form-control form-control-lg" placeholder="Password" />
                                        <label class="form-label" for="floatingPassword">Mật khẩu</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="password" id="floatingrepassword" name="repassword"
                                            class="form-control form-control-lg" placeholder="Password" />
                                        <label class="form-label" for="floatingrepassword">Nhập lại Mật khẩu</label>
                                    </div>
                                    <div class="pt-1 d-flex justify-content-center">
                                        <button class="col-12 btn btn-primary btn-lg btn-block text-uppercase" type="submit">Đăng Ký</button>
                                    </div>
                                    

                                    <p class="mt-4 pb-lg-2 text-center" style="color: #000000;">Bạn đã có tài khoản ?
                                        <a class="fw-bold text-uppercase" href="{{ route('login') }}" style="color: #ffc107;">Đăng nhập
                                            ngay
                                        </a>
                                    </p>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- <section class="vh-100 bg-image" style="padding-top: 150px;background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h3 class="fw-bold text-center text-primary text-uppercase">Đăng kí Tài khoản doanh nghiệp</h3>
                                    <form>
                                        <div class="form-outline" data-mdb-input-init>
                                            <input type="text" id="form12" class="form-control" />
                                            <label class="form-label" for="form12">Example label</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example1cg">Họ Tên</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example3cg">Email(Tên đăng Nhập)</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example4cg">Mật Khẩu</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example4cdg">Nhập lại mật khẩu</label>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="button"
                                            data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white text-uppercase">Đăng Ký</button>
                                        </div>
                                        <p class="text-center text-muted mt-5 mb-0">Bạn đã có tài khoản ? <a href="{{ route('login') }}"
                                            class="fw-bold text-body text-uppercase"><u> Đăng Kí ngay</u></a></p>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>     --}}


    {{-- <section class="">
        <div class="container" style="padding-top: 150px">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-xl-12">
                    <form action="#" method="post" class="needs-validation" novalidate>
                        <div class="row" style="box-shadow: 1px 1px 4px 1px #999;border-radius:10px">
                            <div class="col-12 col-sm-12 col-md-12"
                                style="border-top-left-radius: 10px; border-end-start-radius: 10px; background-color: #fff">
                                <div class="row g-0 mx-4 my-5">
                                    <h3 class="fw-bold text-center text-primary text-uppercase">Đăng Ký Tài Khoản Doanh Nghiệp
                                    </h3>
                                </div>
                                <div class="row g-0 mx-5 my-3">
                                    <div class="form-floating">
                                        <input type="text" id="tendoanhnghiep" name="txttendoanhnghieptiengviet"
                                            class="form-control form-control-lg border-bottom border-primary text-primary"
                                            placeholder="Tên doanh nghiệp tiếng việt" id="invalidCheck" required />
                                        <label class="form-label text-primary" for="tendoanhnghiep">Tên doanh nghiệp tiếng
                                            việt</label>
                                        <div class="invalid-feedback">
                                            Nhập tên doanh nghiệp!
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-0 mx-5 my-3">
                                    <div class="form-floating col-12 col-sm-4 me-auto">
                                        <input type="text" id="tendoanhnghiep" name="txttendoanhnghieptienganh"
                                            class="form-control form-control-lg border-bottom border-primary text-primary"
                                            placeholder="Tên doanh nghiệp tiếng anh" id="invalidCheck" required />
                                        <label class="form-label text-primary" for="tendoanhnghiep">Số điện thoại</label>
                                        <div class="invalid-feedback">
                                            Nhập số điện thoại doanh nghiệp!
                                        </div>
                                    </div>
                                    <div class="form-floating col-12 col-sm-4 me-auto">
                                        <input type="text" id="tendoanhnghiep" name="txttendoanhnghieptienganh"
                                            class="form-control form-control-lg border-bottom border-primary text-primary"
                                            placeholder="Tên doanh nghiệp tiếng anh" id="invalidCheck" required />
                                        <label class="form-label text-primary" for="tendoanhnghiep">Fax</label>
                                    </div>
                                    <div class="form-floating col-12 col-sm-3">
                                        <input type="text" id="tendoanhnghiep" name="txttendoanhnghieptienganh"
                                            class="form-control form-control-lg border-bottom border-primary text-primary"
                                            placeholder="Tên doanh nghiệp tiếng anh" id="invalidCheck" required />
                                        <label class="form-label text-primary" for="tendoanhnghiep">Mã số thuế</label>
                                        <div class="invalid-feedback">
                                            Nhập mã số thuế!
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="row g-0 mx-5 my-4 ">
                                    <div class="col-12 d-flex justify-content-center">
                                        <button
                                            class="btn btn-light btn-lg btn-block btn-outline-secondary px-5 fw-bold fs-5"
                                            type="submit">Đăng ký</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
{{-- @section('script')
    <script>
        $(function() {
            $('#datepicker1').datepicker();
        });

        // xử lý thông báo khi các input đã điền hay chưa?
        // Example starter JavaScript for disabling form submissions if there are invalid fields
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
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");

        var citi1 = document.getElementById("city1");
        var district1 = document.getElementById("district1");
        var ward1 = document.getElementById("ward1");

        //lấy data tỉnh huyện xã từ link
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };

        // địa chỉ của doanh nghiệp - xử lý bằng promise
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data, citis, districts, wards);
        });

        //địa chỉ của đại diện doanh nghiệp - xử lý bằng promise
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data, citi1, district1, ward1);
        });

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
@endsection --}}
