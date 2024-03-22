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
    .list-news > col {
        display: flex;
    }
    .item-img {
        height: 50%;
    }
    .col a {
        padding: 0;
    }
    .icon-news{
        font-size: 24px;
        color: #000;
        display: flex;
        justify-content: center;
        padding: 12px 12px;
        transition: .3s;
        border-radius: 10px;
        border: 2px solid #000;
        margin-bottom: 8px;
    }
    .icon-news:hover {
        background: #000;
        cursor: pointer;
        color: #fff
    }
    .item-news--detail image{
        text-align: center;
    }
</style>

    
<div class="news-background" style="margin-top:200px;">
    <div class="container" style="display: flex;justify-content:space-between ">
        <nav aria-label="breadcrumb" style="font-size:18px;font-weight:600;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}" style="text-decoration: none">Trang chủ</a></li>
                @if($TinTuc->linhvuc_id == 'nn')
                    <a href="{{ URL::to('/tintuc/NongNghiep')}}" style="text-decoration:none;">
                        <li class="breadcrumb-item item_bread" style="cursor: pointer;padding:0 8px;">> Tin tức nông nghiệp ></li>
                    </a>
                @else 
                @if ($TinTuc->linhvuc_id == 'cn')
                    <a href="{{ URL::to('/tintuc/CongNghiep')}}" style="text-decoration:none;">
                        <li class="breadcrumb-item item_bread" style="cursor: pointer;padding:0 8px;">> Tin tức công nghiệp ></li>
                    </a>    
                @else 
                @if ($TinTuc->linhvuc_id == 'tmdv')
                    <a href="{{ URL::to('/tintuc/TMDV')}}" style="text-decoration:none;">
                        <li class="breadcrumb-item item_bread" style="cursor: pointer;padding:0 8px;">> Tin tức thương mại - dịch vụ ></li>
                    </a>    
                @else 
                @endif @endif @endif
                <li class="breadcrumb-item active" aria-current="page">{{$TinTuc->tieude}}</li>
            </ol>
        </nav>
        <div class="timeCurrent" style="display:flex;">
            <h6><span id="day" style="padding-right: 8px"></span>|</h6>
            <h6 style="padding-left: 8px"><span id="time"></span></h6>
        </div>
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
                            <div class="item-content--main__detail">{!!$TinTuc->tieude!!}</div>
                            <div class="item-content--sub__spec">{!!$TinTuc->tomtat!!}</div>
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
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-8"><div class="sharethis-inline-share-buttons"></div></div>
                            <div class="col-3"></div>
                        </div>
                        <div class="item-body row">
                            <div class="col-xl-1" style="margin-top: 16px;display:flex;justify-content:center;height:10%;">
                                <div class="list-icon">
                                    <div class="col"><a href="#comment" style="text-decoration: none;"><i class='bx bx-message-dots icon-news'></i></a></div>
                                    <div class="col" id="copyURL"><i class='bx bx-link icon-news'></i></div>
                                    <div class="col"><i class='bx bx-printer icon-news'></i></div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="item-news--detail" style="text-align: justify">
                                    {!!$TinTuc->noidung!!}
                                </div>
                                <span style="font-weight: 600;font-size:20px;float:right">Nguồn ({{$TinTuc->nguon}})</span>
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
                                                        <img src="{{ asset('assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
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
<div id="comment" class="comment" style="margin-top: 32px; margin-bottom: 32px">
    <div class="container" >
        <div class="row">
            <div class="col-xl-8" style="border: 1px solid #bebebe;border-radius: 4px;padding: 10px 20px;"> 
                <div class="col-xl-12" style="display:flex; align-items:center;">
                    <h4 class="headline" style="border-bottom: 1px solid #009688">Bình luận ({{ $comments->count()}})</h4>
                </div>
                @if($comments->count() == 0)
                    <h4 class="headline">Chưa có bình luận nào</h4>
                @else
                <div class="col">
                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix">
                        <ul style="list-style-type:none;padding-left:0">
                            @foreach ($comments as $cmt)
                                <!-- Comment Content -->
                                {{-- @if ($cmt->binhluan_id == 1) --}}
                                    <li class="single_comment_area" style="margin-top: 4px">
                                        <div class="comment-wrapper d-flex">
                                            <!-- Comment Meta -->
                                            <div class="comment-author">
                                                <img src="{{ asset('image/BinhLuan/Khach.png') }}" alt="">
                                            </div>
                                            <div class="comment-content" style="max-width:500px;">
                                                <span class="comment-name" style="font-weight: 700;">
                                                    @if($cmt->user_id == 1)
                                                        <span>Quản Trị Viên</span>
                                                    @elseif($cmt->user_id == 4)
                                                        <span>Cộng Tác Viên</span>
                                                    @elseif($cmt->user_id == 5)
                                                        <span>Doanh Nghiệp</span>
                                                    @elseif($cmt->user_id == 2)
                                                        <span>Hiệp Hội Doanh Nghiệp</span>    
                                                    @endif    
                                                </span>
                                                <p style="background: #e7e7e7; border-radius: 8px;padding:6px;margin:4px 0 0">{{ $cmt->noidung }}</p>
                                                <a class="active replybtn" style="cursor: pointer;text-decoration:none;;padding-left:10px;font-size: 14px;color:#727272;font-weight:600" data-id="{{ $cmt->id }}">Phản
                                                    hồi</a>
                                                    <form action="{{ URL::to('/BinhLuan') }}" method="post"
                                                        id="{{ $cmt->id }}" style="display: none;"
                                                        target="hidden-form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 col-md-4" style="padding-left: 12px;padding-right: 4px;">
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control"
                                                                        name="IdCon" value="{{ $cmt->id }}"
                                                                        id="contact-name">
                                                                    <input type="hidden" class="form-control"
                                                                        name="IdNews" value="{{ $TinTuc->id }}"
                                                                        id="contact-name">
                                                                    @if (Auth::user()!= null)
                                                                        @if (Auth::user()->getVaiTro[0]->id == "ad")
                                                                            <input type="text" class="form-control" name="user"
                                                                            id="contact-name" placeholder="Quản Trị Viên" @disabled(true)>
                                                                        @elseif(Auth::user()->getVaiTro[0]->id == "ctv")
                                                                            <input type="text" class="form-control"
                                                                            name="Name" id="contact-name" value="Cộng tác viên"
                                                                            placeholder="Cộng tác viên" @disabled(true)>
                                                                        @elseif(Auth::user()->getVaiTro[0]->id == "dn")
                                                                            <input type="text" class="form-control" value="Doanh nghiệp"
                                                                            name="Name" id="contact-name"
                                                                            placeholder="Doanh Nghiệp" @disabled(true)> 
                                                                        @elseif(Auth::user()->getVaiTro[0]->id == "hhdn")
                                                                            <input type="text" class="form-control" value="Hiệp hội doanh nghiệp"
                                                                            name="Name" id="contact-name"
                                                                            placeholder="Hiệp hội doanh nghiệp" @disabled(true)>    
                                                                        @endif 
                                                                    @else
                                                                        <input type="text" class="form-control"
                                                                        name="Name" id="contact-name"
                                                                        placeholder="Nhập họ tên ">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-8" style="padding: 0 2px;">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="message" id="message" cols="30" rows="1" placeholder="Phản hồi của bạn"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mt-2" style="display:flex; justify-content: end;">
                                                                <button type="submit" class="btn" style="background-color: #009688; color: #fff; font-weight:700">Gửi bình luận</button>
                                                            </div>
                                                        </div>
                                                    </form>
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
                                {{-- @else --}}
                                {{-- @endif --}}
                            @endforeach
                            <!-- Single Comment Area -->
    
                        </ul>
                    </div>
                    <!-- Leave A Comment -->
                </div> 
                @endif
            </div>
            <div class="col-xl-4">
                <form action="{{ URL::to('/BinhLuan') }}" method="post"
                    id="" style="padding: 8px; border: 2px solid #009688;border-radius: 4px"
                    target="hidden-form" enctype="multipart/form-data">
                    @csrf
                    <h5 style="color: #009688; padding-left: 4px;user-select: none;">Bình Luận :</h5>
                    <div class="row">
                        <div class="col-12" style="margin-bottom: 6px">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="IdNews"
                                    value="{{ $TinTuc->id }}" id="contact-name">
                                @if (Auth::user()!= null)
                                    @if (Auth::user()->getVaiTro[0]->id == "ad")
                                        <input type="text" class="form-control" name="user"
                                        id="contact-name" placeholder="Quản Trị Viên" @disabled(true)>
                                    @elseif(Auth::user()->getVaiTro[0]->id == "ctv")
                                        <input type="text" class="form-control"
                                        name="Name" id="contact-name" value="Cộng tác viên"
                                        placeholder="Cộng tác viên" @disabled(true)>
                                    @elseif(Auth::user()->getVaiTro[0]->id == "dn")
                                        <input type="text" class="form-control" value="Doanh nghiệp"
                                        name="Name" id="contact-name"
                                        placeholder="Doanh Nghiệp" @disabled(true)> 
                                    @elseif(Auth::user()->getVaiTro[0]->id == "hhdn")
                                        <input type="text" class="form-control" value="Hiệp hội doanh nghiệp"
                                        name="Name" id="contact-name"
                                        placeholder="Hiệp hội doanh nghiệp" @disabled(true)>    
                                    @endif 
                                @else
                                    <input type="text" class="form-control"
                                    name="Name" id="contact-name"
                                    placeholder="Nhập họ tên ">
                                @endif      
                            </div>
                        </div>
                        <div class="col-12" style="margin-bottom: 6px">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="2" placeholder="Chia sẻ ý kiến của bạn "></textarea>
                            </div>
                        </div>
                        <div class="col-12" style="display:flex; justify-content: end;">
                            <button type="submit" class="btn" style="background-color: #009688; color: #fff; font-weight:700">Gửi bình luận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('trangchu.layouts.script')
@endsection
{{-- https://www.youtube.com/watch?v=iT7v7AY3_ng --}}