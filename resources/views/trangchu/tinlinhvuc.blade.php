@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<style>
    .list-news a {
        margin-top: 0;
    }
    .item-img {
        margin-top: 0;
    }
</style>
<div class="news-background" style="margin-top: 126px;">
    <div class="image-heading">
        @foreach($laybanner as $bn)
            @if($bn->linhvuc_id == 'nn')
                <img src="../assets/backend/img/linhvuc/nongnghiep.jpg" alt="">
                <h2 class="news-heading row">{{$title}}</h2>
            @else 
            @if ($bn->linhvuc_id == 'cn')
                <img src="../assets/backend/img/linhvuc/congnghiep.jpg" alt="">
                <h2 class="news-heading row">{{$title}}</h2>
            @else 
            @if ($bn->linhvuc_id == 'tmdv')
                <img src="../assets/backend/img/linhvuc/thuongmaidichvu.jpg" alt="">
                <h2 class="news-heading row">{{$title}}</h2>
            @else 
            @endif @endif @endif
        @endforeach
    </div>
    <div class="container" style="margin-top : 24px;padding-left:16px">
        <nav aria-label="breadcrumb" style="font-size:18px;font-weight:600;">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home')}}" style="text-decoration: none">Trang chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="news">
            <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-3" style="justify-content: flex-start">
                @foreach($tinmoi as $news)
                <div class="col">
                    <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;">
                        <div class="item-news col" style="width: 100px; margin:5px">
                            <div class="item-img">
                                <img src="{{ asset('assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
                            </div>
                            <div class="item-content">
                                <div class="item-content--main">{{$news->tieude}}</div>
                            </div>
                            <div class="item-footer">
                                <div class="item-detail">
                                    Xem chi tiết
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
