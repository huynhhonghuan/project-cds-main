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

        /*thay đổi thuộc tính input kiểu file*/

        input[type="file"] {
            margin-left: -2px !important;
            background-color: var(bg-primary) !important;

            &::-webkit-file-upload-button {
                display: none;
            }

            &::file-selector-button {
                display: none;
            }
        }

        &:hover {
            label {
                background-color: #dde0e3;
                cursor: pointer;
            }
        }
    </style>
@endsection
@section('content')
    <section class="" style="background-color: rgb(192, 241, 241);">
        <div class="container py-3">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-xl-12">
                    <form action="#" method="post" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-12 col-sm-12 col-md-12 col-xl-6"
                                style="border-top-left-radius: 10px; border-end-start-radius: 10px; background-color: #fff">
                                <div class="row g-0 mx-4 my-5">
                                    <h2 class="fw-normal text-left text-primary">Thông tin doanh nghiệp
                                    </h2>
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
                                    <div class="form-floating">
                                        <input type="text" id="tendoanhnghiep" name="txttendoanhnghieptienganh"
                                            class="form-control form-control-lg border-bottom border-primary text-primary"
                                            placeholder="Tên doanh nghiệp tiếng anh" id="invalidCheck" required />
                                        <label class="form-label text-primary" for="tendoanhnghiep">Tên doanh nghiệp tiếng
                                            anh</label>
                                        <div class="invalid-feedback">
                                            Nhập tên doanh nghiệp bằng tiếng anh!
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-0 mx-5 my-3 d-flex">
                                    <div class="form-floating col-12 col-sm-6 me-auto">
                                        <input type="text" id="tendoanhnghiep" name="txttendoanhnghieptienganh"
                                            class="form-control form-control-lg border-bottom border-primary text-primary"
                                            placeholder="Tên doanh nghiệp tiếng anh" id="invalidCheck" required />
                                        <label class="form-label text-primary" for="tendoanhnghiep">Tên viết tắt</label>
                                        <div class="invalid-feedback">
                                            Nhập tên doanh nghiệp viết tắt!
                                        </div>
                                    </div>
                                    <div class="form-floating col-12 col-sm-5">
                                        <input type="text" class="form-control border-bottom border-primary text-primary"
                                            id="datepicker1" placeholder="" id="invalidCheck" required />
                                        <label class="form-label text-primary" for="datepicker1">Ngày hoạt động</label>
                                        <div class="invalid-feedback">
                                            Chọn ngày hoạt động doanh nghiệp!
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-0 mx-5 mt-4 mb-3 d-flex">
                                    <div class="floating-label col-sm-5 me-auto">
                                        <select class="floating-select ps-2 text-primary border-bottom border-primary"
                                            onclick="this.setAttribute('value', this.value);" value="" name="city"
                                            id="invalidCheck" required>
                                            <option value=""></option>
                                            <option value="1">An Giang</option>
                                            <option value="2">Item2</option>
                                            <option value="3">Item3</option>
                                            <option value="4">Item4</option>
                                            <option value="5">Item5</option>
                                        </select>
                                        <label class="label-select form-label text-primary">Lĩnh vực hoạt động</label>
                                        <div class="invalid-feedback">
                                            Chọn lĩnh vực hoạt động!
                                        </div>
                                    </div>
                                    <div class="floating-label col-sm-6">
                                        <select class="floating-select ps-2 text-primary border-bottom border-primary"
                                            onclick="this.setAttribute('value', this.value);" value=""
                                            id="invalidCheck" required>
                                            <option value=""></option>
                                            <option value="1">An Giang</option>
                                            <option value="2">Item2</option>
                                            <option value="3">Item3</option>
                                            <option value="4">Item4</option>
                                            <option value="5">Item5</option>
                                        </select>
                                        <label class="label-select form-label text-primary">Loại hình kinh doanh
                                            chính</label>
                                        <div class="invalid-feedback">
                                            Chọn loại hình kinh doanh chính!
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-0 mx-5 justify-content-between">
                                    <div class="floating-label col-12 col-sm-3 me-4 ">
                                        <select class="floating-select ps-2 text-primary border-bottom border-primary"
                                            onclick="this.setAttribute('value', this.value);" value="" id="city"
                                            required>
                                            <option value=""></option>
                                        </select>
                                        <label class="label-select form-label text-primary">Tỉnh/Thành phố</label>
                                        <div class="invalid-feedback">
                                            Chọn tỉnh/thành phố!
                                        </div>
                                    </div>
                                    <div class="floating-label col-12 col-sm-3 me-4">
                                        <select class="floating-select ps-2 text-primary border-bottom border-primary"
                                            onclick="this.setAttribute('value', this.value);" value="" id="district"
                                            required>
                                            <option value=""></option>
                                        </select>
                                        <label class="label-select form-label text-primary">Quận/Huyện</label>
                                        <div class="invalid-feedback">
                                            Chọn quận/huyện!
                                        </div>
                                    </div>
                                    <div class="floating-label col-12 col-sm-4">
                                        <select class="floating-select ps-2 text-primary border-bottom border-primary"
                                            onclick="this.setAttribute('value', this.value);" value=""
                                            id="ward" required>
                                            <option value=""></option>
                                        </select>
                                        <label class="label-select form-label text-primary">Phường/Xã</label>
                                        <div class="invalid-feedback">
                                            Chọn phường/xã!
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-0 mx-5 mb-3">
                                    <div class="form-floating col-12 col-sm-7 me-auto">
                                        <input type="text" id="tendoanhnghiep" name="txttendoanhnghieptienganh"
                                            class="form-control form-control-lg border-bottom border-primary text-primary"
                                            placeholder="Tên doanh nghiệp tiếng anh" />
                                        <label class="form-label text-primary" for="tendoanhnghiep">Email</label>
                                    </div>
                                    <div class="form-floating col-12 col-sm-4">
                                        <input type="text" id="tendoanhnghiep" name="txttendoanhnghieptienganh"
                                            class="form-control form-control-lg border-bottom border-primary text-primary"
                                            placeholder="Tên doanh nghiệp tiếng anh" id="invalidCheck" required />
                                        <label class="form-label text-primary" for="tendoanhnghiep">Quy mô nhân sự</label>
                                        <div class="invalid-feedback">
                                            Nhập quy mô nhân sự!
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
                                <div class="row g-0 mx-5 my-3">
                                    <div class="form-floating">
                                        <input type="text" id="tendoanhnghiep" name="txttendoanhnghieptiengviet"
                                            class="form-control form-control-lg border-bottom border-primary text-primary"
                                            placeholder="Tên doanh nghiệp tiếng việt" id="invalidCheck" required />
                                        <label class="form-label text-primary" for="tendoanhnghiep">Website doanh
                                            nghiệp</label>
                                        <div class="invalid-feedback">
                                            Nhập Website doanh nghiệp!
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-xl-6 bg-primary"
                                style="border-top-right-radius: 10px; border-end-end-radius: 10px">
                                <div class="row g-0 mx-4 my-5">
                                    <h2 class="fw-normal text-left text-light">Đại diện doanh nghiệp
                                    </h2>
                                </div>
                                <div class="row g-0 mx-5 my-3">
                                    <div class="form-floating">
                                        <input type="text" id="tendoanhnghiep" name="tendoanhnghiep"
                                            class="form-control form-control-lg border-bottom border-light bg-primary text-light"
                                            placeholder="" id="invalidCheck" required />
                                        <label class="form-label text-light" for="tendoanhnghiep">Họ và tên người đại
                                            diện</label>
                                        <div class="invalid-feedback text-warning">
                                            Nhập họ và tên dại diện doanh nghiệp doanh nghiệp!
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0 mx-5 ">
                                    <div class="floating-label col-12 col-sm-6 pt-1 me-auto">
                                        <select
                                            class="floating-select bg-primary ps-2 text-light border-bottom border-light"
                                            onclick="this.setAttribute('value', this.value);" value=""
                                            id="invalidCheck" required>
                                            <option value=""></option>
                                            <option value="1">An Giang</option>
                                            <option value="2">Item2</option>
                                            <option value="3">Item3</option>
                                            <option value="4">Item4</option>
                                            <option value="5">Item5</option>
                                        </select>
                                        <label class="label-select form-label text-light">Chức vụ</label>
                                        <div class="invalid-feedback text-warning">
                                            Chọn chức vụ!
                                        </div>
                                    </div>
                                    <div class="form-floating col-12 col-sm-5">
                                        <input type="text" id="tendoanhnghiep" name="tendoanhnghiep"
                                            class="form-control form-control-lg border-bottom border-light bg-primary text-light"
                                            placeholder="" id="invalidCheck" required />
                                        <label class="form-label text-light" for="tendoanhnghiep">Số điện thoại</label>
                                        <div class="invalid-feedback text-warning">
                                            Nhập số điện thoại!
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0 mx-5 justify-content-between">
                                    <div class="floating-label col-12 col-sm-3 me-4 ">
                                        <select
                                            class="floating-select bg-primary ps-2 text-light border-bottom border-light"
                                            onclick="this.setAttribute('value', this.value);" value=""
                                            id="city1" required>
                                            <option value=""></option>
                                        </select>
                                        <label class="label-select form-label text-light">Tỉnh/Thành phố</label>
                                        <div class="invalid-feedback text-warning">
                                            Chọn tỉnh/thành phố!
                                        </div>
                                    </div>
                                    <div class="floating-label col-12 col-sm-3 me-4">
                                        <select
                                            class="floating-select bg-primary ps-2 text-light border-bottom border-light"
                                            onclick="this.setAttribute('value', this.value);" value=""
                                            id="district1" required>
                                            <option value=""></option>
                                        </select>
                                        <label class="label-select form-label text-light">Quận/Huyện</label>
                                        <div class="invalid-feedback text-warning">
                                            Chọn quận/huyện!
                                        </div>
                                    </div>
                                    <div class="floating-label col-12 col-sm-4">
                                        <select
                                            class="floating-select bg-primary ps-2 text-light border-bottom border-light"
                                            onclick="this.setAttribute('value', this.value);" value=""
                                            id="ward1" required>
                                            <option value=""></option>
                                        </select>
                                        <label class="label-select form-label text-light">Phường/Xã</label>
                                        <div class="invalid-feedback text-warning">
                                            Chọn phường/xã!
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-0 mx-5">
                                    <div class="form-floating col-12 col-sm-7 me-auto">
                                        <input type="text" id="tendoanhnghiep" name="tendoanhnghiep"
                                            class="form-control form-control-lg border-bottom border-light bg-primary text-light"
                                            placeholder="" id="invalidCheck" required />
                                        <label class="form-label text-light" for="tendoanhnghiep">CCCD</label>
                                        <div class="invalid-feedback text-warning">
                                            Nhập số CCCD!
                                        </div>
                                    </div>

                                    <div class="floating-label col-12 col-sm-4 pt-1">
                                        <select
                                            class="floating-select bg-primary ps-2 text-light border-bottom border-light"
                                            onclick="this.setAttribute('value', this.value);" value=""
                                            id="invalidCheck" required />
                                        <option value=""></option>
                                        </select>
                                        <label class="label-select form-label text-light">Nơi cấp</label>
                                        <div class="invalid-feedback text-warning">
                                            Chọn nơi cấp!
                                        </div>

                                    </div>
                                </div>

                                <div class="row g-0 mx-5 ">
                                    <div class="form-floating col-12 col-sm-5 input_file me-auto w-45">
                                        <label class="form-label text-light pt-1 label_file" for="inputGroupFile04">CCCD
                                            mặt trước</label>
                                        <input type="file"
                                            class="form-control bg-primary border-bottom border-light text-light mt-2"
                                            id="inputGroupFile04" id="invalidCheck" required>
                                        <div class="invalid-feedback text-warning">
                                            Chọn hình CCCD mặt trước!
                                        </div>
                                    </div>
                                    <div class="form-floating col-12 col-sm-5 input_file w-45">
                                        <label class="form-label text-light pt-1 label_file" for="inputGroupFile04">CCCD
                                            mặt sau</label>
                                        <input type="file"
                                            class="form-control bg-primary border-bottom border-light text-light mt-2"
                                            id="inputGroupFile04" id="invalidCheck" required />
                                        <div class="invalid-feedback text-warning">
                                            Chọn hình CCCD mặt sau!
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0 mx-5 my-3">
                                    <div class="form-floating">
                                        <input type="text" id="tendoanhnghiep" name="tendoanhnghiep"
                                            class="form-control form-control-lg border-bottom border-light bg-primary text-light"
                                            placeholder="" id="invalidCheck" required />
                                        <label class="form-label text-light" for="tendoanhnghiep">Email</label>
                                    </div>
                                </div>
                                <div class="row g-0 mx-5 my-3">
                                    <div class="form-floating col-12 col-sm-5 me-auto">
                                        <input type="text" id="tendoanhnghiep" name="tendoanhnghiep"
                                            class="form-control form-control-lg border-bottom border-light bg-primary text-light"
                                            placeholder="" id="invalidCheck" required />
                                        <label class="form-label text-light" for="tendoanhnghiep">Mật khẩu</label>
                                        <div class="invalid-feedback text-warning">
                                        </div>
                                    </div>
                                    <div class="form-floating col-12 col-sm-5">
                                        <input type="text" id="tendoanhnghiep" name="tendoanhnghiep"
                                            class="form-control form-control-lg border-bottom border-light bg-primary text-light"
                                            placeholder="" id="invalidCheck" required />
                                        <label class="form-label text-light" for="tendoanhnghiep">Xác nhận mật
                                            khẩu</label>
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
    </section>
@endsection
@section('script')
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

    //chọn tỉnh huyện xã
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
@endsection
