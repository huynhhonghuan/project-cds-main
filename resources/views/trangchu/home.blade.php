@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    <div id="body" style="margin-bottom: 32px;">
        <div class="container-fluid">
            <div class="slider">
                <div class="list">
                    @foreach ($slides as $id => $slide)
                        @if ($slide->status == 1)
                            <div class="item">
                                <img class="" src="{{ asset('slide/' . $slide->hinhanh) }}" style="">
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
                            <img src="assets/backend/img/linhvuc/nongnghiep.jpg" alt="Hình ảnh">
                            <div class="content"><h3>Nông Nghiệp</h3></div>
                        </a>
                    </div>
                    <div class="item-field col">
                        <a href="{{ URL::to('/tintuc/CongNghiep') }}" style="text-decoration: none">
                            <img src="assets/backend/img/linhvuc/congnghiep.jpg" alt="Hình ảnh">
                            <div class="content"><h3>Công Nghiệp</h3></div>
                        </a>
                    </div>
                    <div class="item-field col">
                        <a href="{{ URL::to('/tintuc/TMDV') }}" style="text-decoration: none">
                            <img src="assets/backend/img/linhvuc/thuongmaidichvu.jpg" alt="Hình ảnh">
                            <div class="content"><h3 style="text-align : center">Thương Mại & Dịch Vụ</h3></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-background" style="background-image: url(image/AnhNen/hinh-nen-mau-den_1.jpg); margin-top:32px">
            <div class="container">
                <div class="news">
                    <h2 class="news-heading row"  data-aos="fade-up">Tin Tức Nổi Bật</h2>
                    <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-3">
                        @foreach($tinmoi as $news)
                        <div class="col">
                            <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;"  data-aos-duration="1500" data-aos="fade-up">
                                <div class="item-news col"  style="margin:10px">
                                    <div class="item-img">
                                        <img src="{{ asset('../assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
                                    </div>
                                    <div class="item-header" style="display:flex;justify-content:space-between">
                                        <div class="item-date">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            {{$news->updated_at}}
                                        </div>
                                        <div class="item-field-all" style="padding-top: 10px;padding-right:10px">
                                            {{-- <span>{{$news->tenlinhvuc}}</span> --}}
                                            @if($news->tenlinhvuc == 'Nông nghiệp') 
                                                <span style="background-color: green;padding:4px 16px;border-radius:10px;color:#fff;font-weight:600">Nông Nghiệp</span>
                                            @elseif($news->tenlinhvuc == 'Công nghiệp') 
                                                <span style="background-color: blue;padding:4px 16px;border-radius:10px;color:#fff;font-weight:600">Công Nghiệp</span>
                                            @elseif($news->tenlinhvuc == 'Thương mại và dịch vụ') 
                                                <span style="background-color: yellow;padding:4px 16px;border-radius:10px;font-weight:600">Thương mại - Dịch vụ</span>
                                            @endif    
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content--main">{{$news->tieude}}</div>
                                        <div class="item-content--sub">{!!$news->tomtat!!}</div>
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
                    <div class="row news-footer" data-aos="zoom-in">
                        <a href="{{route('AllTin')}}" style="--clr: #009688">
                            <span>Xem tất cả</span>
                            <i></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-content" style="margin-top: 24px">
            <div class="container">
                <h2 class="news-heading row" style="color: black">Video Nổi Bật</h2>
                <div class="row row-cols-3 row-cols-md-1">
                    @foreach($videos as $vd)
                    <div class="col-xl-4" style="text-align: center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="415" height="200" src="{{$vd->file}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <a class="video-tt-href" href="" style="text-decoration: none;">
                            <div class="video-title" style="font-size: 18px; margin-bottom: 12px;">{{$vd->tieude}}</div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('trangchu.layouts.script')
    </div>
@endsection
