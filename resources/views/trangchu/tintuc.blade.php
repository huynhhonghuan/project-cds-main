@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="news-background" style="margin-top: 132px;">
    <div class="image-heading-tt" style="padding : 32px 0;padding-top: 48px;">
        <span class="news-heading"style="padding:0 20px;border-left: 10px solid #043359;border-right: 10px solid #043359;">
            <span class="news-heading-f">tất cả</span>
            <span class="news-heading-l">Tin Tức</span>
        </span>
    </div>
    <div class="container">
        <div class="news">
            <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-3">
                @foreach($tinmoi as $news)
                    @if($news->duyet == 1)
                        <div class="col">
                            <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;">
                                <div class="item-news col" style="width: 100px; margin:5px">
                                    <div class="item-img">
                                        <img src="{{ asset('assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
                                    </div>
                                    <div class="item-header">
                                        <div class="col-xl-6">
                                            {{-- <span>{{$tinmoi->tenlinhvuc}}</span> --}}
                                            @if($news->tenlinhvuc == 'Nông nghiệp') 
                                                <span style="background-color: green;padding:4px 6px;border-radius:10px;color:#fff;font-weight:600;font-size:14px">Nông Nghiệp</span>
                                            @elseif($news->tenlinhvuc == 'Công nghiệp') 
                                                <span style="background-color: blue;padding:4px 6px;border-radius:10px;color:#fff;font-weight:600;font-size:14px">Công Nghiệp</span>
                                            @elseif($news->tenlinhvuc == 'Thương mại và dịch vụ') 
                                                <span style="background-color: yellow;padding:4px 16px;border-radius:10px;font-weight:600;font-size:14px">Thương mại - Dịch vụ</span>
                                            @elseif($news->tenlinhvuc == 'Khác') 
                                                <span style="background-color: rgb(9, 153, 243);padding:4px 16px;border-radius:10px;font-weight:600;font-size:14px">Chuyển đổi số</span>
                                            @endif    
                                        </div>
                                        <div class="col-xl-6" style="padding-top: 4px;display: flex;justify-content: end;
                                                align-items: center;font-size:16px;font-weight:700"><i class="fa-regular fa-clock" style="padding-right: 4px"></i>
                                                    {{ date('d/m/Y', strtotime($news->updated_at))}}
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content--main"  title="{{$news->tieude}}" style="height: 64px">{{$news->tieude}}</div>
                                    </div>
                                    <div class="item-footer">
                                        <div class="item-detail">
                                            Xem chi tiết
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else @endif    
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection