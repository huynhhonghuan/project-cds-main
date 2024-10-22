@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="news-background" style="margin-bottom: 200px;margin-top: 185px;">
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
                                <img src="{{ asset('../assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
                            </div>
                            <div class="item-header" style="display:flex;justify-content:space-between">
                                <div class="item-field-all" style="padding-top: 10px;padding-right:10px">
                                    @if($news->linhvuc_id == 'nn') 
                                        <span style="background-color: green;padding:4px 16px;border-radius:10px;color:#fff;font-weight:600">Nông Nghiệp</span>
                                    @elseif($news->linhvuc_id == 'cn') 
                                        <span style="background-color: blue;padding:4px 16px;border-radius:10px;color:#fff;font-weight:600">Công Nghiệp</span>
                                    @elseif($news->linhvuc_id == 'tmdv') 
                                        <span style="background-color: yellow;padding:4px 16px;border-radius:10px;font-weight:600">Thương mại - Dịch vụ</span>
                                    @elseif($news->linhvuc_id == 'kh') 
                                        <span style="background-color: rgb(9, 153, 243);padding:4px 16px;border-radius:10px;font-weight:600">Chuyển đổi số</span>
                                    @endif    
                                </div>
                                <div class="item-date">
                                    <i class="fa-regular fa-clock" style="padding-right: 4px"></i>
                                    {{ date('d/m/Y', strtotime($news->updated_at))}}
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="item-content--main"  title="{{$news->tieude}}">{{$news->tieude}}</div>
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