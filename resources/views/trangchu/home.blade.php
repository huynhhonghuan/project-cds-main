@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    <div id="body" style="margin-bottom: 32px;">
        <div class="container-fluid">
            <div class="slider">
                <div class="list">
                    @foreach ($slides as $id => $slide)
                        @if ($slide->status == 1)
                            <div class="item">
                                <img class="" src="{{ asset('assets/frontend/img/slide/' . $slide->hinhanh) }}" style="">
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
        <div class="news-background" style="background:rgb(237, 246, 253)">
            <div class="container">
                <div class="news">
                    <span class="news-heading" data-aos="fade-up" style="padding : 32px 0;padding-top: 48px">
                        <span class="news-heading-f">Tin Tức</span>
                        <span class="news-heading-l">Nổi Bật</span>
                    </span>
                    <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-4">
                        @foreach($tinmoi as $news)
                        <div class="col">
                            <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;"  data-aos-duration="1500" data-aos="fade-up">
                                <div class="item-news col">
                                    <div class="item-img">
                                        <img src="{{ asset('../assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
                                    </div>
                                    <div class="item-header">
                                        <div class="item-field-all" style="padding-top: 4px">
                                            @if($news->tenlinhvuc == 'Nông nghiệp') 
                                                <span style="background-color: green;padding:4px 6px;border-radius:10px;color:#fff;font-weight:600;font-size:14px">Nông Nghiệp</span>
                                            @elseif($news->tenlinhvuc == 'Công nghiệp') 
                                                <span style="background-color: blue;padding:4px 6px;border-radius:10px;color:#fff;font-weight:600;font-size:14px">Công Nghiệp</span>
                                            @elseif($news->tenlinhvuc == 'Thương mại và dịch vụ') 
                                                <span style="background-color: yellow;padding:4px 6px;border-radius:10px;font-weight:600;font-size:14px">Thương mại - Dịch vụ</span>
                                            @elseif($news->tenlinhvuc == 'Khác') 
                                                <span style="background-color: rgb(9, 153, 243);padding:4px 6px;border-radius:10px;font-weight:600;font-size:14px">Chuyển đổi số</span>
                                            @endif    
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content--main">{{$news->tieude}}</div>
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
                        <a href="{{route('AllTin')}}" style="--clr: #080463">
                            <span>Xem tất cả</span>
                            <i></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-content" style="margin-top: 32px">
            <div class="container">
                <span class="news-heading"  data-aos="fade-up" style="margin:16px 0">
                    <span class="news-heading-f">Video</span>
                    <span class="news-heading-l">Chuyển đổi số</span>
                </span>
                <div class="row row-cols-xl-4" style="margin-top: 32px"  data-aos="fade-up">
                    @foreach($videos as $vd)
                    <div class="col-xl" style="text-align: center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe height="200" src="{{$vd->file}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
