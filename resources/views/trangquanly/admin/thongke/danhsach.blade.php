@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}

@section('head')
<!-- Data Table CSS -->
<link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')
{{-- thêm content vào form kế thừa chỗ @yield('content') --}}
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">Danh sách thống kê</h4>
                        {{-- <a href="{{ route('admin.taikhoan.them') }}"
                            class="btn btn-primary float-right veiwbutton ">Thêm
                            tài khoản</a> --}}
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4">
                    <h6>Mức độ chuyển đổi số của các doanh nghiệp</h6>
                    <form style="border: 1px rgb(94, 204, 61) solid; border-radius: 5px;">
                        <div class="row formtype">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Theo quý</label>
                                    <select class="form-control" id="sel1" name="sellist1">
                                        <option value="1-2024" selected>Quý 1 - 2024</option>
                                        <option value="4-2024">Quý 2 - 2024</option>
                                        <option value="7-2024">Quý 3 - 2024</option>
                                        <option value="10-2024">Quý 4 - 2024</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Thống kê</label> <a href="#"
                                        class="btn btn-success btn-block mt-0 search_button_1"> Xem </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- <div class="col-lg-8">
                    <h6>Thế mạnh chuyển đổi số của các doanh nghiệp</h6>
                    <form style="border: 1px rgb(94, 204, 61) solid; border-radius: 5px;">
                        <div class="row formtype">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Doanh nghiệp</label>
                                    <select class="form-control" id="sel2" name="sellist2">
                                        <option>Select Name</option>
                                        <option>Loren Gatlin</option>
                                        <option>Tarah Shrosphire</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Từ</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Đến</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Thống kê</label> <a href="#"
                                        class="btn btn-success btn-block mt-0 search_button"> Xem </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>

            <div class="row mt-2">
                <div class="col-md-6 mb-5 mx-auto">
                    <div class="mx-auto" style="width: 550px; height: 550px;" id="divmyChart">
                        {{-- <canvas id="myChart" width="100" height="100"></canvas> --}}
                    </div>
                    <div class="text-center" id="btn-chart-1">

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script src="{{ ENV('APP_URL') }}/assets/html12canvas.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
    $('.search_button_1').on('click', function(e){
        e.preventDefault(); // Prevent default form submission

        var selectedOption = $('#sel1').val(); // Get selected option value
        var parts = selectedOption.split('-'); // Tách chuỗi thành mảng các phần bằng dấu '-'
        var quy = parts[0]; // Lấy phần tử đầu tiên của mảng
        var nam = parts[1]; // Lấy phần tử thứ hai của mảng

        console.log(quy + nam);

        $.ajax({
            url: '{{route('admin.thongke.mucdo.bieudo')}}', // URL to your backend script
            type: 'GET', // HTTP method
            data: {
                    quy: quy,
                    nam: nam,
            }, // Data to send to the server
            success: function(response){
                // Handle successful response from server
                console.log(response);
                $('#myNewCanvas').remove();
                $('#btn-chart-1').empty();

                var newCanvas = document.createElement('canvas');
                // Đặt id cho canvas mới (nếu cần thiết)
                newCanvas.id = 'myNewCanvas';

                // Đặt các thuộc tính khác cho canvas mới nếu cần thiết
                newCanvas.width = 500; // Đặt chiều rộng của canvas
                newCanvas.height = 500; // Đặt chiều cao của canvas

                // Lấy phần tử cha mà bạn muốn thêm canvas vào (ví dụ: body)
                var parentElement = document.getElementById('divmyChart');

                // Thêm canvas mới vào trong DOM

                const ctx = newCanvas.getContext('2d');
                // You can update the UI with the response data here
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                    labels: response.labels,
                    datasets: response.datasets,
                    },
                    options: {
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: response.title,
                            },
                        },
                    }
                });
                parentElement.appendChild(newCanvas);

                $('#btn-chart-1').empty();
                // Create a new button
                var newButton = $('<button/>', {
                    text: 'Xuất dữ liệu', // Text of the button
                    class: 'btn btn-primary', // CSS classes for styling
                    click: function() {
                        // Define action when the button is clicked
                        // For example:
                        html2canvas(document.querySelector("#myNewCanvas")).then(canvas => {
                                    // Tạo một đường dẫn cho hình ảnh
                                    var imageData = canvas.toDataURL("image/png");
                                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                                    console.log(csrfToken);
                                    // Gửi hình ảnh lên máy chủ
                            fetch('{{route('admin.thongke.luubieudocot')}}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken // Thêm token CSRF vào header
                                },
                                body: JSON.stringify({ image: imageData }),
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                // Nhận đường dẫn đến hình ảnh đã lưu
                                var imagePath = data.imagePath;

                                // Chèn hình ảnh vào file Excel và gọi luồng xuất Excel
                                window.location.href = '{{route('admin.thongke.xuatbieudocot')}}?image=' + encodeURIComponent(imagePath);
                            })
                            .catch(error => {
                                console.error('There was an error!', error);
                            });
                                });
                    }
                });
                // Append the new button to the element with id 'btn-chart'
                $('#btn-chart-1').append(newButton);
                // Tạo một phần tử canvas mới



            },
            error: function(xhr, status, error){
                // Handle errors
                console.error(error);
            }
        });
    });
});
</script>
@endsection
