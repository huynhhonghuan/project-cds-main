@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    <style>
        .carousel-indicators img {
            width: 80px;
            display: block;
        }
        .carousel-indicators button {
            width: max-content!important;
        }
        .carousel-indicators button.active img {
            border: 2px solid red;
        }
        .carousel-indicators {
            position: unset;
        }
        .item-news {
            position: relative;
            display: block;
        }
        .item-news:hover span {
            opacity: 1;
            bottom: 10%;
        }
        .item-news span {
            position: absolute;
            font-weight: 600;
            font-size: 20px;
            color: #fff;
            bottom: 0;
            left: 10%;
            opacity: 0;
            transition: all .5s ease-in-out;
        }
    </style>
    <div id="id" style="margin-top: 200px;margin-bottom: 132px;">
        <div class="container">
            <div class="container">
                <div class="carousel slide carousel-fade" id="carouselDemo" data-bs-wrap="true" data-bs-ride="carousel">
                    <div class="row">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1800">
                                <img style="height: 400px" src="assets\frontend\img\trangtin\Muc0.png" alt="" class="w-100">
                            </div>
                            <div class="carousel-item"  data-bs-interval="1800">
                                <img style="height: 400px" src="assets\frontend\img\trangtin\Muc1.png" alt="" class="w-100">
                            </div>
                            <div class="carousel-item"  data-bs-interval="1800">
                                <img style="height: 400px" src="assets\frontend\img\trangtin\3.png" alt="" class="w-100">
                            </div>
                            <div class="carousel-item"  data-bs-interval="1800">
                                <img style="height: 400px" src="assets\frontend\img\trangtin\4.png" alt="" class="w-100">
                            </div>
                            <div class="carousel-item"  data-bs-interval="1800">
                                <img style="height: 400px" src="assets\frontend\img\trangtin\5.png" alt="" class="w-100">
                            </div>
                            <div class="carousel-item"  data-bs-interval="1800">
                                <img style="height: 400px" src="assets\frontend\img\trangtin\6.png" alt="" class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="cdsTitle">
                                <h2>Các mức độ chuyển đổi số :</h2>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="0" class="active">
                                    <img title="Mức 0" src="assets\frontend\img\trangtin\Muc0.png" alt="" class="">
                                </button>
                                <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="1">
                                    <img title="Mức 1" src="assets\frontend\img\trangtin\Muc1.png" alt="" class="">
                                </button>
                                <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="2">
                                    <img title="Mức 2" src="assets\frontend\img\trangtin\3.png" alt="" class="">
                                </button>
                                <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="3">
                                    <img title="Mức 3" src="assets\frontend\img\trangtin\4.png" alt="" class="">
                                </button>
                                <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="4">
                                    <img title="Mức 4" src="assets\frontend\img\trangtin\5.png" alt="" class="">
                                </button>
                                <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="5">
                                    <img title="Mức 5" src="assets\frontend\img\trangtin\6.png" alt="" class="">
                                </button>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-background" style="background-image: url(image/AnhNen/hinh-nen-mau-den_1.jpg); margin-top:32px">
            <div class="container">
                <h2 class="news-heading row">Các Mô Hình Chuyển Đổi Số</h2>
                <div class="row row-xl-4">
                    @foreach($mohinh as $mh)
                        <div class="item-news col"  style="margin:10px">
                            <img src="{{ asset('../assets/frontend/img/trangtin/'.$mh->hinhanh) }}" alt="" style="height: 280px; width: 220px">
                            <span style="width: 200px; z-index:100">{{$mh->tenmohinh}}</span>
                            <div class="content"></div>
                        </div>
                    @endforeach
                </div>
            </div>  
        </div>
    </div>
@endsection