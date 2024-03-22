@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="news-background" style="margin-top: 132px;">
    <div class="image-heading">
        <img src="image/AnhNen/hinh-nen-mau-den_1.jpg" alt="">
        <h2 class="news-heading row">Tổng hợp tin tức</h2>
    </div>
    <div class="container">
        <div class="news">
            <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-3">
                @foreach($tinmoi as $news)
                <div class="col">
                    <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;">
                        <div class="item-news col" style="width: 100px; margin:5px">
                            <div class="item-img">
                                <img src="{{ asset('assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
                            </div>
                            <div class="item-header" style="display:flex;justify-content:space-between">
                                <div class="item-date">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{$news->updated_at}}
                                </div>
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
                                <div class="item-content--sub"  title="{!!$news->tomtat!!}">{!!$news->tomtat!!}</div>
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
