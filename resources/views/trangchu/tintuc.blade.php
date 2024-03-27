@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="news-background" style="margin-top: 132px;">
    <div class="image-heading-tt" style="padding : 32px 0;padding-top: 48px;">
        <span class="news-heading"style="padding:0 20px;border-left: 10px solid #043359;border-right: 10px solid #043359;">
            <span class="news-heading-f">Tin Tức</span>
            <span class="news-heading-l">Nổi Bật</span>
        </span>
    </div>
    <div class="container">
        <div class="news">
            <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-4">
                @foreach($tinmoi as $news)
                <div class="col">
                    <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;">
                        <div class="item-news col" style="width: 100px; margin:5px">
                            <div class="item-img">
                                <img src="{{ asset('assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
                            </div>
                            <div class="item-header">
                                <div class="item-field-all" style="padding-top: 10px;padding-right:10px">
                                    {{-- <span>{{$tinmoi->tenlinhvuc}}</span> --}}
                                    @if($news->tenlinhvuc == 'Nông nghiệp') 
                                        <span style="background-color: green;padding:4px 16px;border-radius:10px;color:#fff;font-weight:600">Nông Nghiệp</span>
                                    @elseif($news->tenlinhvuc == 'Công nghiệp') 
                                        <span style="background-color: blue;padding:4px 16px;border-radius:10px;color:#fff;font-weight:600">Công Nghiệp</span>
                                    @elseif($news->tenlinhvuc == 'Thương mại và dịch vụ') 
                                        <span style="background-color: yellow;padding:4px 16px;border-radius:10px;font-weight:600">Thương mại - Dịch vụ</span>
                                    @elseif($news->tenlinhvuc == 'Khác') 
                                        <span style="background-color: rgb(9, 153, 243);padding:4px 16px;border-radius:10px;font-weight:600">Chuyển đổi số</span>
                                    @endif    
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="item-content--main"  title="{{$news->tieude}}">{{$news->tieude}}</div>
                            </div>
                            <div class="item-footer">
                                <div class="item-view">
                                    <i class="fa-solid fa-eye"></i> {{$news->luotxem}}
                                </div>
                                <div class="item-detail">
                                    Xem chi tiết
                                    <i class='bx bx-chevron-right' style="font-size: 20px"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row news-footer">
                <a href="" style="--clr: #080463">
                    <span>Xem Thêm</span>
                    <i></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
