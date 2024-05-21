@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="news-background" style="margin-top: 146px;">
    <div class="container">
        <div class="image-heading-tt" style="padding : 32px 0;padding-top: 48px;">
            <span class="news-heading"style="padding:0 20px;border-left: 10px solid #043359;border-right: 10px solid #043359;">
                <span class="news-heading-f">Danh sách</span>
                <span class="news-heading-l">Sản phẩm</span>
            </span>
        </div>
        
        @foreach($doanhnghiepSP as $dn)
            @if(count($dn->getsanpham) != 0)    
            <div class="container" style="padding:0;background: #f1f1f1;margin-bottom:16px;border-radius:20px;">
                <div class="dn__item" style="border:none;padding:16px 0;">
                    <div class="row" style="">
                        <div class="col-2 d-flex" style="justify-content: center">
                            <div class="" style="height: 70px;width:70px">
                                @if($dn->getUser->image == null)
                                    <img style="width:100%" src="https://atpcons.com/wp-content/uploads/2018/05/icon-enterprise.png" alt="">
                                @else  
                                    <img style="width:100%" src="{{ asset('assets/backend/img/hoso/'.$dn->getUser->image) }}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="col-8 d-flex" style="align-items: center">
                            <div class="item__dn--body">
                                <div class="dn__body--name">{{$dn->tentiengviet}}</div>
                            </div>
                        </div>
                        <div class="col-2 d-flex" style="align-items: center">
                            <span style="font-size: 18px;font-weight:600;font-family:Quicksand"><span style="color: red">{{count($dn->getsanpham)}}</span> Sản phẩm</span>
                        </div>
                    </div>
                </div> 
                <div class="container swiper mySwiper">
                    <div class="swiper-wrapper" style="margin-bottom: 20px">
                        @foreach($dn->getsanpham as $sp)
                        <div class="swiper-slide card" style="display: flex;align-items:center;margin:0 8px">
                            <div class="col" style="margin:10px">
                                <div class="item-img--3" >
                                    <img src="{{ asset('assets/backend/img/sanpham/'.$sp->getAnh->hinhanh) }}" alt="Hình lỗi">
                                </div>
                                <div class="item-header" style="justify-content:center">
                                    <span class="text-uppercase" style="font-family:Quicksand;font-size:14px;font-weight:600;">{{$sp->tensanpham}}</span>
                                </div>
                            </div>
                            <div class="footer__product row" style="margin: 10px;width:100%">
                                <div class="buy__product col" style="text-align:center;padding:8px;background: #2222b7">
                                    <a target="_blank" href="https://dacsan.cdsdnag.com/" style="color:#fff" class="text-decoration-none">
                                        <i class="fa-solid fa-circle-info"></i>
                                        <span class="text-uppercase" style="font-weight:600;font-size:12px">Chi tiết</span>
                                    </a>
                                </div>
                                <div class="buy__product col" style="text-align:center;padding:8px;background: #f7c51e">
                                    <a target="_blank" href="https://dacsan.cdsdnag.com/" style="color:#000" class="text-decoration-none">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span class="text-uppercase" style="font-weight:600;font-size:12px">Mua hàng</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination" style="margin-top: 16px"></div>
                </div>
            </div>
            @else @endif
        @endforeach
    </div>
    @include('trangchu.layouts.script')
</div>
@endsection