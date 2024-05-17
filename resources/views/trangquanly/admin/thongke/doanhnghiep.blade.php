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
                        <h4 class="card-title float-left mt-2">{{ $tendanhsach }}</h4>
                        {{-- <a href="{{ route('admin.chienluoc.them') }}"
                            class="btn btn-primary float-right veiwbutton ">Thêm
                            chiến lược</a> --}}
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="card card-table">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="table-custom" class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên doanh nghiệp</th>
                                        <th scope="col">Trạng thái khảo sát</th>
                                        <th scope="col" class="text-center" width="10%">Xem thống kê</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($danhsach as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->tentiengviet }}</td>
                                        <td>
                                            @if (count($value->getkhaosat) > 0)
                                            @foreach ($value->getkhaosat as $key => $item)
                                            <div class="my-2">
                                                <span class="text-info"> Lần {{ $key + 1 }}:</span>
                                                @if ($item->trangthai == 1)
                                                <div class="btn btn-sm bg-success-light mr-2"> Hoàn
                                                    thành
                                                </div>
                                                @elseif ($item->trangthai == 2)
                                                <div class="btn btn-sm bg-success-light mr-2">Đã được đề
                                                    xuất
                                                </div>
                                                @else
                                                <div class="btn btn-sm bg-warning-light mr-2">Chưa hoàn
                                                    thành
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="btn btn-sm bg-danger-light mr-2">Chưa khảo sát
                                            </div>
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if (count($value->getkhaosat) > 0)
                                            @foreach ($value->getkhaosat as $key => $item)
                                            @if ($item->trangthai == 2 || $item->trangthai == 1)
                                            <a href="#" class="btn btn-sm mr-2 search_button_1"
                                                id="{{$value->getuser->id}}"><i class="fa-regular fa-eye"
                                                    style="color:orange;"></i></a>
                                            <hr>
                                            @else
                                            <a href="#" class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                    style="color:orange;"></i></a>
                                            <hr>
                                            @endif
                                            @endforeach
                                            @else
                                            <a href="#" class="btn btn-sm mr-2"><i class="fa-regular fa-eye"
                                                    style="color:orange;"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js">
                                    </script>
                                    <script src="{{ ENV('APP_URL') }}/assets/html12canvas.js"></script>
                                    <script src="{{ ENV('APP_URL') }}/assets/mychart.js"></script>
                                    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
                                    <script>
                                        $(document).ready(function(){
                                            $('.search_button_1').on('click', function(e){
                                                e.preventDefault(); // Prevent default form submission
                                                var id = $(this).attr('id');
                                                $.ajax({
                                                    url: '{{route('admin.thongke.doanhnghiep.bieudo')}}', // URL to your backend script
                                                    type: 'GET', // HTTP method
                                                    data: {
                                                            id: id,
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

                                                        var data1 = response[0].trucot;
                                                        var labels = response[0].trucot_labels;
                                                        var colors = response[0].colors;
                                                        var tendoanhnghiep = response[0].tendoanhnghiep;
                                                        console.log(data1, labels, colors);
                                                        drawChart(ctx, labels, data1, colors, 'radar', 'Thế mạnh chuyển đổi số - ' + tendoanhnghiep);

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
                                                                        body: JSON.stringify({ image: imageData}),
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
                                                                        window.location.href = '{{route('admin.thongke.doanhnghiepxuatbieudo')}}?image=' + encodeURIComponent(imagePath) + '&data=' + encodeURIComponent(data1) + '&labels=' + encodeURIComponent(labels) + '&tendoanhnghiep=' + encodeURIComponent(tendoanhnghiep);
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="mx-auto" style="width: 550px; height: 550px;" id="divmyChart">

                </div>
                <div class="text-center" id="btn-chart-1">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $(document).ready(function() {
            $('#table-custom').DataTable({
                //disable sorting on last column
                "columnDefs": [{
                    "orderable": false,
                    "targets": 2
                }],
                language: {
                    //customize pagination prev and next buttons: use arrows instead of words
                    'paginate': {
                        'previous': '<span class="fa fa-chevron-left"></span>',
                        'next': '<span class="fa fa-chevron-right"></span>'
                    },
                    //customize number of elements to be displayed
                    "lengthMenu": 'Hiển thị <select class="form-control input-sm">' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="30">30</option>' +
                        '<option value="40">40</option>' +
                        '<option value="50">50</option>' +
                        '<option value="100">100</option>' +
                        '<option value="-1">Tất cả</option>' +
                        '</select> số lượng',

                    "zeroRecords": "Nothing found - sorry",
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_",
                    "infoEmpty": "Hiển thị từ 0 đến 0 của 0",
                    "search": "Tìm kiếm:",
                }
            })
        });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script src="{{ ENV('APP_URL') }}/assets/html12canvas.js"></script>
<script src="{{ ENV('APP_URL') }}/assets/mychart.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
<script>
    $(document).ready(function(){
    $('.search_button_1').on('click', function(e){
        e.preventDefault(); // Prevent default form submission
        var id = $(this).attr('id');
        $.ajax({
            url: '{{route('admin.thongke.doanhnghiep.bieudo')}}', // URL to your backend script
            type: 'GET', // HTTP method
            data: {
                    id: id,
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

                var data1 = response[0].trucot;
                var labels = response[0].trucot_labels;
                var colors = response[0].colors;
                var tendoanhnghiep = response[0].tendoanhnghiep;
                console.log(data1, labels, colors);
                drawChart(ctx, labels, data1, colors, 'radar', 'Thế mạnh chuyển đổi số - ' + tendoanhnghiep);

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
                                body: JSON.stringify({ image: imageData}),
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
                                window.location.href = '{{route('admin.thongke.doanhnghiepxuatbieudo')}}?image=' + encodeURIComponent(imagePath) + '&data=' + encodeURIComponent(data1) + '&labels=' + encodeURIComponent(labels) + '&tendoanhnghiep=' + encodeURIComponent(tendoanhnghiep);
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