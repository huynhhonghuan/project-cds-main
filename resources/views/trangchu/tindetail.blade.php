@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<style>
    * {
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .item-content--main__detail {
        margin-top: 16px;
        font-size: 42px;
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
    .list-icon {
        border: 1px solid #e4e4e4;
        border-radius: 32px;
        width: 50%;
    }
    .icon-news{
        font-size: 24px;
        color: #999;
        display: flex;
        justify-content: center;
        padding: 16px;
    }
    .icon-news:hover {
        color: #000;
        cursor: pointer;
    }
</style>

    
<div class="news-background" style="margin-top:200px;">
    <div class="container">
        <nav aria-label="breadcrumb" style="font-size:18px;font-weight:600;">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home')}}" style="text-decoration: none">Trang chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$TinTuc->tieude}}</li>
            </ol>
        </nav>
    </div>
    <div class="container" style=" box-shadow: 1px 1px 15px 2px #dadada">
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
                            <div class="item-content--main__detail">{{$TinTuc->tieude}}</div>
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
                            <div class="col-xl-1" style="margin-top: 16px;display:flex;justify-content:center;height:10%;">
                                <div class="list-icon">
                                    <div class="col"><i class='bx bx-message-dots icon-news' style="border-bottom : 1px solid #dfdfdf;"></i></div>
                                    <div class="col"><i class='bx bx-link icon-news'></i></div>
                                    <div class="col"><i class='bx bxl-facebook icon-news'></i></div>
                                    <div class="col"><i class='bx bxl-messenger icon-news'></i></div>
                                    <div class="col"><i class='bx bxl-instagram icon-news' ></i></div>
                                </div>
                            </div>
                            <div class="col-xl-8" style="">
                                <div class="item-img-2">
                                    <img src="{{ asset('public/image/AnhTinTuc/'.$TinTuc->hinhanh) }}" alt="">
                                </div>
                                <div class="item-news--detail">
                                    {{$TinTuc->noidung}}
                                </div>
                            </div>
                            <div class="col-xl-3" style="padding-left: 0;">
                                <div class="col-xl-12 news-hot">Tin nổi bật</div>
                                <div class="col-xl-12">
                                    <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-1">
                                        @foreach($News as $news)
                                        <div class="col">
                                            <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;border-bottom: 1px solid #eaeaea;border-radius:0;margin-top: 0">
                                                <div class="col-xl-3" style="margin:10px">
                                                    <div class="item-img">
                                                        <img src="{{ asset('public/image/AnhTinTuc/'.$news->hinhanh) }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-xl-9">
                                                    <div class="item-content">
                                                        <div class="item-content--main" style="margin-top: 0;font-size:16px;">{{$news->tieude}}</div>
                                                    </div>
                                                    <div class="item-footer" style="padding: 6px 0;margin-right: 10px;">
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
<div id="comment" class="comment" style="width: 100%;margin-top: 32px">
    <div class="container" style="border: 1px solid #bebebe;border-radius: 4px">
        <div class="row">
            <div class="col-xl-12" style="display:flex; align-items:center;">
                <h4 class="headline" style="border-bottom: 1px solid #009688">Bình luận ({{ $comments->count()}})</h4>
            </div>
            @if($comments->count() == 0)
                <h4 class="headline">Chưa có bình luận nào</h4>
            @else
            <div class="col">
                {{-- <form action="" method="post" target="hidden-form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="IdNews"
                                    value="" id="contact-name">
                                <input type="text" class="form-control" name="Name"
                                    id="contact-name" placeholder="Họ tên">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="Email"
                                    id="contact-email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="10"
                                    placeholder="Nhập thông tin bình luận"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class=" nikki-btn">Gửi bình luận</button>
                        </div>
                    </div>
                </form> --}}
                <!-- Comment Area Start -->
                <div class="comment_area clearfix">
                    <ol>
                        @foreach ($comments as $cmt)
                            <!-- Comment Content -->
                            @if ($cmt->binhluan_id == 1)
                                <li class="single_comment_area">
                                    <div class="comment-wrapper d-flex">
                                        <!-- Comment Meta -->
                                        <div class="comment-author">
                                            <img src="{{ asset('img/speech-bubble.gif') }}" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <span class="comment-date">{{ $cmt->ngaydang }}</span>
                                            {{-- <h5>{{ $cmt->TenNguoiBL }}</h5> --}}
                                            <p>{{ $cmt->noidung }}</p>
                                            {{-- <a href="#">Like</a> --}}
                                            <a class="active replybtn " data-id="{{ $cmt->id }}">Phản
                                                hồi</a>
                                            {{-- <form action="{{ URL::to('/BinhLuan') }}" method="post"
                                                id="{{ $cmt->Id }}" style="display: none;"
                                                target="hidden-form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control"
                                                                name="IdCon" value="{{ $cmt->Id }}"
                                                                id="contact-name">
                                                            <input type="hidden" class="form-control"
                                                                name="IdNews" value="{{ $TinTuc->Id }}"
                                                                id="contact-name">
                                                            <input type="text" class="form-control"
                                                                name="Name" id="contact-name"
                                                                placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control"
                                                                name="Email" id="contact-email"
                                                                placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="message" id="message" cols="30" rows="2" placeholder="Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn nikki-btn">Send
                                                            Message</button>
                                                    </div>
                                                </div>
                                            </form> --}}
                                        </div>
                                    </div>
                                    {{-- @foreach ($comments as $chill)
                                        @if ($chill->IdCon == $cmt->Id)
                                            <ol class="children">
                                                <li class="single_comment_area">
                                                    <div class="comment-wrapper d-flex">
                                                        <!-- Comment Meta -->
                                                        <div class="comment-author">
                                                            <img src="{{ asset('img/speech-bubble.gif') }}"
                                                                alt="">
                                                        </div>
                                                        <!-- Comment Content -->
                                                        <div class="comment-content">
                                                            <span
                                                                class="comment-date">{{ $chill->NgayCMT }}</span>
                                                            <h5>{{ $chill->TenNguoiBL }}</h5>
                                                            <p>{{ $chill->NoiDung }}</p>
                                                            <a href="#">Like</a>
                                                            <a class="active replybtn"
                                                                data-id="{{ $chill->IdCon }}">Phản hồi
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        @endif
                                    @endforeach --}}
                                </li>
                            @else
                            @endif
                        @endforeach
                        <!-- Single Comment Area -->

                    </ol>
                </div>
                <!-- Leave A Comment -->
            </div> 
            @endif
        </div>
    </div>
</div>
{{-- @include('trangchu.layouts.script') --}}
@endsection