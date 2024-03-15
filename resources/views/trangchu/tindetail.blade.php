@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<style>
    * {
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .item-content--main {
        margin-top: 16px;
        font-size: 52px;
    }
    .item-content--main:hover {
        color: #000;
    }
    .list-news > col {
        display: flex;
    }
    .item-img {
        height: 50%;
    }
    .col a {
        padding: 0;
    }
</style>

    
<div class="news-background" style="margin-top:200px;">
    <div class="container" style=" box-shadow: 2px 2px 2px 2px #aeaeae">
        <div class="news">
            <div class="list-news row">
                <div class="col" href="" style="text-decoration: none; display:flex;">
                    <div class="item-news col" style="width: 100px; margin:5px">
                        <div class="item-date row" style="border-bottom: 1px solid #000; padding-bottom: 11px;text-align:end">
                            <div class="col" style="text-align:start"><i class="fa-solid fa-eye"></i> {{$TinTuc->luotxem}}</div>
                            <div class="col"><i class="fa-solid fa-clock-rotate-left"></i>
                                {{$TinTuc->updated_at}}</div>
                        </div>
                        <div class="item-content">
                            <div class="item-content--main">{{$TinTuc->tieude}}</div>
                            <div class="item-content--sub">{{$TinTuc->tomtat}}</div>
                        </div>
                        {{-- <div class="item-audio row" style="height: 100px; background:rgb(233 236 239)">
                            <div class="col-xl-9">
                                <div class="row" style="height: 100%">
                                    <div class="col-xl-2 btn-voice">
                                        <button class="button-voice">
                                            <i class="fa-solid fa-play"></i>
                                            <span>Chạy</span>
                                        </button>
                                    </div>
                                    <div class="col-xl-8">
                                    </div>
                                    <div class="col-xl-2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3"></div>
                        </div> --}}
                        <div class="item-body row">
                            <div class="col-xl-1" style=""></div>
                            <div class="col-xl-8" style="">
                                <div class="item-img-2">
                                    <img src="{{ asset('image/AnhTinTuc/'.$TinTuc->hinhanh) }}" alt="">
                                </div>
                                <div class="item-news--detail">
                                    {{$TinTuc->noidung}}
                                </div>
                            </div>
                            <div class="col-xl-3" style="">
                                <div class="col-xl-12 news-hot">Tin nổi bật</div>
                                <div class="col-xl-12">
                                    <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-1">
                                        @foreach($News as $news)
                                        <div class="col">
                                            <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;border-bottom: 1px solid #eaeaea;border-radius:0;margin-top: 0">
                                                <div class="col-xl-3" style="margin:10px">
                                                    <div class="item-img">
                                                        <img src="{{ asset('image/AnhTinTuc/'.$news->hinhanh) }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-xl-9">
                                                    <div class="item-content">
                                                        <div class="item-content--main" style="margin-top: 0;font-size:16px;">{{$news->tieude}}</div>
                                                    </div>
                                                    <div class="item-footer" style="padding: 6px 0">
                                                        <div class="item-date" style="font-size: 14px; padding-top: 0;">
                                                            <i class="fa-solid fa-calendar-days"></i>
                                                            {{$news->updated_at}}
                                                        </div>
                                                        <div class="item-view" style="font-size: 14px; padding-right: 10px;">
                                                            <i class="fa-solid fa-eye"></i> {{$news->luotxem}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    {{-- @foreach ($News as $item)
                                        {{$item->noidung}}
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('trangchu.layouts.script') --}}
@endsection