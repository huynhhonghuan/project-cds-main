@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    <div id="body">
        <div class="container-fluid">
            <div class="slider">
                <div class="list">
                    @foreach ($slides as $id => $slide)
                        @if ($slide->status == 1)
                            <div class="item">
                                <img class="" src="{{ asset('public/slide/' . $slide->hinhanh) }}" style="">
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="buttons">
                    <button id="prev"><</button>
                    <button id="next">></button>
                </div>
                <ul class="dots">
                    <li class="active"></li>
                    <li class=""></li>
                    <li class=""></li>
                </ul>
            </div>
        </div>
        <div class="main-field">
            <div class="container">
                <div class="list-field row row-cols-1 row-cols-xl-4 row-cols-md-4">
                    <div class="item-field col ">
                        <div class="banner-field">
                            <h3>Các Lĩnh Vực</h3>
                            <h3>Chuyển Đổi Số</h3>
                        </div>
                    </div>
                    <div class="item-field col">
                        <a href="{{ URL::to('/tintuc/NongNghiep') }}" style="text-decoration: none">
                            <img src="public/assets/backend/img/linhvuc/nongnghiep.jpg" alt="Hình ảnh">
                            <div class="content"><h3>Nông Nghiệp</h3></div>
                        </a>
                    </div>
                    <div class="item-field col">
                        <a href="{{ URL::to('/tintuc/CongNghiep') }}" style="text-decoration: none">
                            <img src="public/assets/backend/img/linhvuc/congnghiep.jpg" alt="Hình ảnh">
                            <div class="content"><h3>Công Nghiệp</h3></div>
                        </a>
                    </div>
                    <div class="item-field col">
                        <a href="{{ URL::to('/tintuc/TMDV') }}" style="text-decoration: none">
                            <img src="public/assets/backend/img/linhvuc/thuongmaidichvu.jpg" alt="Hình ảnh">
                            <div class="content"><h3 style="text-align : center">Thương Mại & Dịch Vụ</h3></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-background" style="background-image: url(public/image/AnhNen/hinh-nen-mau-den_1.jpg)">
            <div class="container">
                <div class="news">
                    <h2 class="news-heading row">Tin Tức Nổi Bật</h2>
                    <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-3">
                        @foreach($tinmoi as $news)
                        <div class="col">
                            <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;">
                                <div class="item-news col" style="margin:10px">
                                    <div class="item-img">
                                        <img src="{{ asset('public/image/AnhTinTuc/'.$news->hinhanh) }}" alt="">
                                    </div>
                                    <div class="item-date">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        {{$news->updated_at}}
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content--main">{{$news->tieude}}</div>
                                        <div class="item-content--sub">{{$news->tomtat}}</div>
                                    </div>
                                    <div class="item-footer">
                                        <div class="item-view">
                                            <i class="fa-solid fa-eye"></i> {{$news->luotxem}}
                                        </div>
                                        <div class="item-detail">
                                            Xem chi tiết
                                            <i class='bx bx-chevron-right'></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="row news-footer">
                        <a href="{{route('AllTin')}}" style="--clr: #009688">
                            <span>Xem tất cả</span>
                            <i></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('trangchu.layouts.script')
    </div>
@endsection
