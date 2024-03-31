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
                            <div class="col" style="font-weight: 600"><i class="fa-regular fa-clock"></i>
                                {{ date('d/m/Y', strtotime($TinTuc->updated_at))}}</div>
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
                            <div class="col-xl-8" style="padding-right: 20px">
                                <div class="item-news--detail" style="text-align: justify">
                                    {!!$TinTuc->noidung!!}
                                </div>
                                <span style="font-weight: 600;font-size:20px;float:right">Nguồn ({{$TinTuc->nguon}})</span>
                            </div>
                            <div class="col-xl-3" style="padding-left: 0;">
                                <div class="col-xl-12 news-hot">Tin nổi bật</div>
                                <div class="col-xl-12">
                                    <div class="row-cols-1 row-cols-md-2 row-cols-xl-1">
                                        @foreach($News as $news)
                                        <div style="margin-bottom:6px">
                                            <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;padding-bottom:7px;border-bottom: 1px solid #929292;margin-top: 0;border-radius:0">
                                                <div class="col-xl-3" style="margin:10px">
                                                    <div class="item-img-2">
                                                        <img src="{{ asset('assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="item-content">
                                                        <div class="item-content--main" style="margin-top: 0;font-size:16px;padding: 0;padding-top: 16px;width:100% ">{{$news->tieude}}</div>
                                                    </div>
                                                    <div class="item-footer">
                                                        <div class="item-header row" style="display:flex;align-items:center">
                                                            <div class="col-xl-9" style="padding-right:0">
                                                                @if($news->tenlinhvuc == 'Nông nghiệp') 
                                                                    <span style="background-color: green;padding:2px 6px;border-radius:10px;color:#fff;font-weight:600;font-size:12px">Nông Nghiệp</span>
                                                                @elseif($news->tenlinhvuc == 'Công nghiệp') 
                                                                    <span style="background-color: blue;padding:2px 6px;border-radius:10px;color:#fff;font-weight:600;font-size:12px">Công Nghiệp</span>
                                                                @elseif($news->tenlinhvuc == 'Thương mại và dịch vụ') 
                                                                    <span style="background-color: yellow;padding:2px 6px;border-radius:10px;font-weight:600;font-size:12px">Thương mại - Dịch vụ</span>
                                                                @elseif($news->tenlinhvuc == 'Khác') 
                                                                    <span style="background-color: rgb(9, 153, 243);padding:2px 6px;border-radius:10px;font-weight:600;font-size:12px">Chuyển đổi số</span>
                                                                @endif    
                                                            </div>
                                                            <div class="col-xl-3" style="font-size: 14px;padding:0;font-weight:700;color:blue">
                                                                Chi tiết
                                                            </div>
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
                                @if ($cmt->binhluan_id == null)
                                    <li class="single_comment_area" style="margin-top: 4px">
                                        <div class="comment-wrapper d-flex">
                                            <!-- Comment Meta -->
                                            <div class="comment-author">
                                                <img src="{{ asset('image/BinhLuan/Khach.png') }}" alt="">
                                            </div>
                                            <div class="comment-content" style="max-width:500px;">
                                                <div class="comment-header" style="display:flex; align-items:center">
                                                    <span class="comment-name"  style="font-weight: 700; font-size:16px; margin-right:6px">{{$cmt->ten}}</span>
                                                    <span class="comment-role" style="font-size: 12px; font-weight:500">
                                                        @if($cmt->user_id == 1)
                                                            <span style="background: #e2d300; border-radius:4px;padding: 2px 4px">Quản Trị Viên</span>
                                                        @elseif($cmt->user_id == 4)
                                                            <span style="background: #02b529; border-radius:4px;padding: 2px 4px">Cộng Tác Viên</span>
                                                        @elseif($cmt->user_id == 5)
                                                            <span style="background: #2005ec; border-radius:4px;padding: 2px 4px; color: #fff">Doanh Nghiệp</span>
                                                        @elseif($cmt->user_id == 2)
                                                            <span style="background: #04e2ab; border-radius:4px;padding: 2px 4px">Hiệp Hội Doanh Nghiệp</span> 
                                                        @else 
                                                            <span style="border: 1px solid #000;padding: 2px 4px; border-radius:4px;">Khách</span> 
                                                        @endif    
                                                    </span>
                                                </div>
                                                <p style="background: #e7e7e7; border-radius: 8px;padding:6px;margin:4px 0 0">{{ $cmt->noidung }}</p>
                                                <a class="active replybtn" style="cursor: pointer;text-decoration:none;;padding-left:10px;font-size: 14px;color:#727272;font-weight:600" data-id="{{ $cmt->id }}">Phản hồi</a>
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
                                                                        <input type="hidden" class="form-control"
                                                                        name="vaitro" value='1' id="contact-name"
                                                                        placeholder="Quản Trị Viên"> 
                                                                        <input type="text" class="form-control"
                                                                        name="Name" id="contact-name"
                                                                        placeholder="Nhập họ tên ">   
                                                                    @elseif(Auth::user()->getVaiTro[0]->id == "ctv")
                                                                        <input type="text" class="form-control"
                                                                        name="vaitro" id="contact-name" value="4"
                                                                        placeholder="Cộng tác viên">
                                                                        <input type="text" class="form-control"
                                                                        name="Name" id="contact-name"
                                                                        placeholder="Nhập họ tên "> 
                                                                    @elseif(Auth::user()->getVaiTro[0]->id == "dn")
                                                                        <input type="text" class="form-control" value="5"
                                                                        name="vaitro" id="contact-name"
                                                                        placeholder="Doanh Nghiệp"> 
                                                                        <input type="text" class="form-control"
                                                                        name="Name" id="contact-name"
                                                                        placeholder="Nhập họ tên "> 
                                                                    @elseif(Auth::user()->getVaiTro[0]->id == "hhdn")
                                                                        <input type="text" class="form-control" value="2"
                                                                        name="vaitro" id="contact-name"
                                                                        placeholder="Hiệp hội doanh nghiệp">  
                                                                        <input type="text" class="form-control"
                                                                        name="Name" id="contact-name"
                                                                        placeholder="Nhập họ tên ">   
                                                                    @endif 
                                                                @else
                                                                    <input type="hidden" class="form-control"
                                                                    name="vaitro" id="contact-name" value=""
                                                                    placeholder="Khách">
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
                                        @foreach ($comments as $chill)
                                            @if ($chill->binhluan_id == $cmt->id)
                                                <ol class="children" style="list-style: none">
                                                    <li class="single_comment_area">
                                                        <div class="comment-wrapper d-flex">
                                                            <!-- Comment Meta -->
                                                            <div class="comment-author">
                                                                <img src="{{ asset('image/BinhLuan/Khach.png') }}" alt="">
                                                            </div>
                                                            <div class="comment-content" style="max-width:500px;">
                                                                <div class="comment-header" style="display:flex; align-items:center">
                                                                    <span class="comment-name"  style="font-weight: 700; font-size:16px; margin-right:6px">{{$chill->ten}}</span>
                                                                    <span class="comment-role" style="font-size: 12px; font-weight:500">
                                                                        @if($chill->user_id == 1)
                                                                            <span style="background: #e2d300; border-radius:4px;padding: 2px 4px">Quản Trị Viên</span>
                                                                        @elseif($chill->user_id == 4)
                                                                            <span style="background: #02b529; border-radius:4px;padding: 2px 4px">Cộng Tác Viên</span>
                                                                        @elseif($chill->user_id == 5)
                                                                            <span style="background: #2005ec; border-radius:4px;padding: 2px 4px; color: #fff">Doanh Nghiệp</span>
                                                                        @elseif($chill->user_id == 2)
                                                                            <span style="background: #04e2ab; border-radius:4px;padding: 2px 4px">Hiệp Hội Doanh Nghiệp</span> 
                                                                        @else 
                                                                            <span style="border: 1px solid #000;padding: 2px 4px; border-radius:4px;">Khách</span> 
                                                                        @endif    
                                                                    </span>
                                                                </div>
                                                                <p style="background: #e7e7e7; border-radius: 8px;padding:6px;margin:4px 0 0">{{ $chill->noidung }}</p>
                                                                <a class="active replybtn" style="cursor: pointer;text-decoration:none;;padding-left:10px;font-size: 14px;color:#727272;font-weight:600" data-id="{{ $chill->id }}">Phản hồi</a>
                                                                <form action="{{ URL::to('/BinhLuan') }}" method="post"
                                                                    id="{{ $chill->id }}" style="display: none;"
                                                                    target="hidden-form" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-4" style="padding-left: 12px;padding-right: 4px;">
                                                                            <div class="form-group">
                                                                                <input type="hidden" class="form-control"
                                                                                    name="IdCon" value="{{ $chill->id }}"
                                                                                    id="contact-name">
                                                                                <input type="hidden" class="form-control"
                                                                                    name="IdNews" value="{{ $TinTuc->id }}"
                                                                                    id="contact-name">
                                                                                @if (Auth::user()!= null)
                                                                                    @if (Auth::user()->getVaiTro[0]->id == "ad")
                                                                                        <input type="hidden" class="form-control"
                                                                                        name="vaitro" value='1' id="contact-name"
                                                                                        placeholder="Quản Trị Viên"> 
                                                                                        <input type="text" class="form-control"
                                                                                        name="Name" id="contact-name"
                                                                                        placeholder="Nhập họ tên ">   
                                                                                    @elseif(Auth::user()->getVaiTro[0]->id == "ctv")
                                                                                        <input type="text" class="form-control"
                                                                                        name="vaitro" id="contact-name" value="4"
                                                                                        placeholder="Cộng tác viên">
                                                                                        <input type="text" class="form-control"
                                                                                        name="Name" id="contact-name"
                                                                                        placeholder="Nhập họ tên "> 
                                                                                    @elseif(Auth::user()->getVaiTro[0]->id == "dn")
                                                                                        <input type="text" class="form-control" value="5"
                                                                                        name="vaitro" id="contact-name"
                                                                                        placeholder="Doanh Nghiệp"> 
                                                                                        <input type="text" class="form-control"
                                                                                        name="Name" id="contact-name"
                                                                                        placeholder="Nhập họ tên "> 
                                                                                    @elseif(Auth::user()->getVaiTro[0]->id == "hhdn")
                                                                                        <input type="text" class="form-control" value="2"
                                                                                        name="vaitro" id="contact-name"
                                                                                        placeholder="Hiệp hội doanh nghiệp">  
                                                                                        <input type="text" class="form-control"
                                                                                        name="Name" id="contact-name"
                                                                                        placeholder="Nhập họ tên ">   
                                                                                    @endif 
                                                                                @else
                                                                                    <input type="hidden" class="form-control"
                                                                                    name="vaitro" id="contact-name" value=""
                                                                                    placeholder="Khách">
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
                                                    </li>
                                                </ol>
                                            @endif
                                        @endforeach
                                    </li>
                                @endif    
                            @endforeach
                        </ul>
                    </div>
                </div> 
                @endif
            </div>
            <!-- Commemt Chính -->
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
                                        <input type="hidden" class="form-control"
                                        name="vaitro" id="contact-name" value="1"
                                        placeholder="Nhập họ tên ">
                                        <input type="text" class="form-control"
                                        name="Name" id="contact-name"
                                        placeholder="Nhập họ tên ">
                                    @elseif(Auth::user()->getVaiTro[0]->id == "ctv")
                                        <input type="text" class="form-control"
                                        name="vaitro" value=4 id="contact-name"
                                        placeholder="Cộng tác viên" @disabled(true)>
                                        <input type="hidden" class="form-control"
                                        name="Name" id="contact-name"
                                        placeholder="Nhập họ tên ">
                                    @elseif(Auth::user()->getVaiTro[0]->id == "dn")
                                        <input type="hidden" class="form-control" 
                                        name="vaitro" value=5 id="contact-name"
                                        placeholder="Doanh Nghiệp" @disabled(true)> 
                                        <input type="text" class="form-control"
                                        name="Name" id="contact-name"
                                        placeholder="Nhập họ tên ">
                                    @elseif(Auth::user()->getVaiTro[0]->id == "hhdn")
                                        <input type="hidden" class="form-control"
                                        name="vaitro" id="contact-name" value="2"
                                        placeholder="Nhập họ tên ">
                                        <input type="text" class="form-control"
                                        name="Name" id="contact-name"
                                        placeholder="Nhập họ tên ">   
                                    @endif 
                                @else
                                    <input type="hidden" class="form-control"
                                    name="vaitro" id="contact-name" value=""
                                    placeholder="Nhập họ tên ">
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
            <!--  End Commemt Chính -->
        </div>
    </div>
</div>
@include('trangchu.layouts.script')
@endsection
{{-- https://www.youtube.com/watch?v=iT7v7AY3_ng --}}