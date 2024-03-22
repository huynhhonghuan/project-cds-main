@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="news-background" style="margin-top: 185px;">
    <div class="container">
        <h2 style="font-size: 24px;padding-left:24px">Kết quả tìm kiếm cho từ khóa : <span style="color:blue">{{$searchText}}</span></h2>
    </div>
    <div class="container">
        <div class="news">
            <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-3">
                @foreach($New as $news)
                <div class="col">
                    <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;">
                        <div class="item-news col" style="width: 100px; margin:5px">
                            <div class="item-img">
                                <img src="{{ asset('public/image/AnhTinTuc/'.$news->hinhanh) }}" alt="">
                            </div>
                            <div class="item-date">
                                <i class="fa-solid fa-calendar-days"></i>
                                {{$news->updated_at}}
                            </div>
                            <div class="item-content">
                                <div class="item-content--main"  title="{{$news->tieude}}">{{$news->tieude}}</div>
                                <div class="item-content--sub"  title="{{$news->tomtat}}">{{$news->tomtat}}</div>
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
        </div>
    </div>
</div>
@endsection