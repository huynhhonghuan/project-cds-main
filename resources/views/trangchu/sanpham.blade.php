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
        
        <div class="container-fluid" style="margin-bottom:16px">
            <div class="row">
                @foreach($doanhnghiepSP as $dn) 
                    @foreach($dn->getsanpham as $sp)
                    <div class="col-3" style="margin-top:16px;padding:12px;">
                        <div class="item-img--3" >
                            <img style="padding:16px;padding-bottom:0" src="{{ asset('assets/backend/img/sanpham/'.$sp->getAnh->hinhanh) }}" alt="Hình lỗi">
                        </div>
                        <div class="item-header" style="justify-content:center;margin:10px">
                            <span title="{{$sp->tensanpham}}" class="text-uppercase" style="font-family:Quicksand;font-size:14px;font-weight:600;color:#000;text-align: center;min-height: 46px;overflow: hidden;max-height:46px">{{$sp->tensanpham}}</span>
                        </div>
                        <div class="footer__product row" style="padding: 0 16px">
                            <div class="buy__product col-6" style="text-align:center;padding:8px;background: #2222b7">
                                <a target="_blank" href="https://dacsan.cdsdnag.com/" style="color:#fff" class="text-decoration-none">
                                    <i class="fa-solid fa-circle-info"></i>
                                    <span class="text-uppercase" style="font-weight:600;font-size:12px">Chi tiết</span>
                                </a>
                            </div>
                            <div class="buy__product col-6" style="text-align:center;padding:8px;background: #f7c51e">
                                @if($dn->gianhang != null)
                                <a target="_blank" href="{{$dn->gianhang}}" style="color:#000" class="text-decoration-none">
                                    <i class="fa-solid fa-cart-shopping" style="font-size: 16px"></i>
                                    <span class="text-uppercase" style="font-weight:600;font-size:12px">Mua hàng</span>
                                </a>
                                @else 
                                <a href="#" style="color:#898989" class="text-decoration-none">
                                    <i class="fa-solid fa-cart-shopping" style="font-size: 16px"></i>
                                    <span class="text-uppercase" style="cursor:no-drop;font-weight:600;font-size:12px">Mua hàng</span>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        {{-- <div class="container swiper mySwiper">
            <div class="swiper-wrapper" style="margin-bottom: 20px">
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
            </div>
            <div class="swiper-pagination" style="margin-top: 16px"></div>
        </div> --}}
    </div>
    @include('trangchu.layouts.script')
</div>
@endsection