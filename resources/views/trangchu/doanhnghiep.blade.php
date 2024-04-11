@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    <div class="doanhnghiep"  style="margin-top : 130px;padding-bottom:32px;background-image: url(../image/AnhNen/title-area-pattern.png);background-color:rgb(250, 249, 232)">
        <div class="image-heading-tt" style="padding : 32px 0;padding-top: 48px;">
            <span class="news-heading"style="padding:0 20px;border-left: 10px solid #043359;border-right: 10px solid #043359;">
                <span class="news-heading-f">danh sách doanh nghiệp</span>
                <span class="news-heading-l">Tỉnh An Giang</span>
            </span>
        </div>
        <div class="container">
            <div class="dn__list"  style="margin: 0 120px;">
                @foreach($dnghiep as $dn)
                <div class="dn__item">
                    <div class="row">
                        <div class="col" style="font-size: 22px;font-weight:700"><span style="padding: 0 12px;padding-bottom: 32px; border-right: 2px solid">{{ $loop->iteration }}</span></div>
                        <div class="col-2">
                            <div class="item__dn--img">
                                <img src="{{ asset('assets/backend/img/hoso/'.$dn->getUser->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="item__dn--body">
                                <div class="dn__body--name"><a href="">{{$dn->tentiengviet}}</a></div>
                                <div class="dn__body--add"><span>Địa Chỉ : </span>{{$dn->diachi}}</div>
                                <div class="dn__body--tax"><span>Mã Số Thuế : </span>{{$dn->mathue}}</div>
                                <div class="dn__body--sdt"><span>Số Điện Thoại : </span>{{$dn->sdt}}</div>
                            </div>
                        </div>
                        <div class="col-2 dn__footer">
                            @if($dn->trangthai == 0) 
                                <a href="{{ URL::to('/doanhnghiepct/'. $dn->id) }}" class="footer__dis"><span>Xem Chi Tiết</span></a>
                            @else
                            @if ($dn->trangthai == 1)
                                <a href="{{ URL::to('/doanhnghiepct/'. $dn->id) }}" class="footer_nor"><span>Xem Chi Tiết</span></a>
                            @else @endif @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection