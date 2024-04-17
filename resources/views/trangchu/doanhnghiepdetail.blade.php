@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    <div class="dnct" style="margin-top: 126px;background-image: url(../image/AnhNen/title-area-pattern.png);background-color:rgb(245, 245, 245)">
        <div class="container" style="padding: 60px 150px">
            <div class="row">
                <div class="col-4">
                    <div class="item__dn--img-det">
                        <img src="{{ asset('assets/backend/img/hoso/'. $dnghiepimg->image) }}" alt="">
                    </div>
                </div>
                <div class="col-8 dn__name">
                    <div style="text-align: center"><span>{{$dnghiepct->tentiengviet}}</span></div>
                </div>
            </div>
            {{-- Thông tin chung công ty --}}
            <div class="row">
                <span class="dntitle">
                    Thông tin chi tiết
                </span>
            </div>
            <div class="row ">
                <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                    <span>Tên tiếng việt : </span>{{$dnghiepct->tentiengviet}}
                </div>
            </div>
            <div class="row ">
                <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                    <span>Tên tiếng anh : </span>{{$dnghiepct->tentienganh}}
                </div>
            </div>
            <div class="row ">
                <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                    <span>Tên viết tắt : </span>{{$dnghiepct->tenviettat}}
                </div>
            </div>
            <div class="row ">
                <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                    <span>Mã số thuế : </span>{{$dnghiepct->mathue}}
                </div>
            </div>
            <div class="row ">
                <div class="col-8" style="padding: 0">
                    <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                        <span>Số điện thoại : </span>{{$dnghiepct->sdt}}
                    </div>
                </div>
                <div class="col-4" style="padding: 0; border-left:1px solid #999">
                    <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                        <span>Fax : </span>{{$dnghiepct->fax}}
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                    <span>Địa chỉ : </span>{{$dnghiepct->diachi}}
                </div>
            </div>
            <div class="row ">
                <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                    <span>Ngày thành lập : </span>{{ date('d-m-Y', strtotime($dnghiepct->ngaylap))}}
                </div>
            </div>
            {{-- Thông tin đại diện --}}
            <div class="row">
                <span class="dntitle">
                    Thông tin người đại diện
                </span>
            </div>
            <div class="row ">
                <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                    <span>Tên người đại diện : </span>{{$dnghiepdd->tendaidien}}
                </div>
            </div>
            <div class="row ">
                <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                    <span>Chức vụ : </span>{{$dnghiepdd->chucvu}}
                </div>
            </div>
            <div class="row ">
                <div class="dn__body--add fs-6 px-4 py-2" style="border-bottom: 1px solid #999">
                    <span>Số điện thoại liên hệ : </span>{{$dnghiepdd->sdt}}
                </div>
            </div>
            {{-- Thông tin chuyển đổi số --}}
            <div class="row">
                <span class="dntitle">
                    Thông tin chuyển đổi số
                </span>
            </div>
            
            <div id="piechart"></div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                // Load google charts
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                
                // Draw the chart and set the chart values
                function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Task', 'Số điểm chuyển đổi số'],
                <?php echo $chartData; ?>
                ]);
            
                // Optional; add a title and set the width and height of the chart
                var options = {'title':'Biểu đồ khảo sát chuyển đổi số của doanh nghiệp', 'width':1000, 'height':400};
                
                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.LineChart(document.getElementById('piechart'));
                chart.draw(data, options);
                }
            </script>
        </div>
    </div>
@endsection