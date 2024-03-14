@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="news-background" style="margin-top: 132px;">
    <div class="image-heading">
        <img src="../image/AnhNen/hinh-nen-mau-den_1.jpg" alt="">
        <h2 class="news-heading row">Tất cả tin tức</h2>
    </div>
    <div class="container">
        <div class="news">
            <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-3">
                @foreach($AllTin as $news)
                <div class="col">
                    <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;">
                        <div class="item-news col" style="width: 100px; margin:5px">
                            <div class="item-img">
                                <img src="{{ asset('image/AnhTinTuc/'.$news->hinhanh) }}" alt="">
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
                <a href="" style="--clr: #009688">
                    <span>Xem Thêm</span>
                    <i></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection