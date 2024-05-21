@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="doanhnghiep" style="margin-top : 130px;padding-bottom:32px;background-image: url(../image/AnhNen/title-area-pattern.png);background-color:rgb(250, 249, 232)">
    {{-- <div class="container" style="padding-top: 16px;padding-left: 70px;margin: 0 200px">
            <div class="countdn">
                <span>Số Doanh Nghiệp</span>
                {{$dnghiep->count()}}
</div>
<div class="countdn2">
    <span>Đã đánh giá</span>
    {{$dnghiep->count()}}
</div>
<div class="countdn3">
    <span>Số Doanh Nghiệp</span>
    {{$dnghiep->count()}}
</div>
</div> --}}
<div class="image-heading-tt" style="padding : 32px 0;padding-top: 48px;">
    <span class="news-heading" style="padding:0 20px;border-left: 10px solid #043359;border-right: 10px solid #043359;">
        <span class="news-heading-f">danh sách doanh nghiệp</span>
        <span class="news-heading-l">Tỉnh An Giang</span>
    </span>
</div>
<div class="container">
    <div class="dn__list" style="margin: 0 120px;">
        @foreach($dnghiep as $dn)
        <div class="dn__item">
            <div class="row">
                <div class="col" style="font-size: 22px;font-weight:700"><span style="padding: 0 12px;padding-bottom: 32px; border-right: 2px solid">{{ $loop->iteration }}</span></div>
                <div class="col-2">
                    <div class="item__dn--img">
                        @if($dn->getUser->image == null)
                        <img src="https://atpcons.com/wp-content/uploads/2018/05/icon-enterprise.png" alt="">
                        @else
                        <img src="{{ asset('assets/backend/img/hoso/'.$dn->getUser->image) }}" alt="">
                        @endif
                    </div>
                </div>
                <div class="col-7">
                    <div class="item__dn--body">
                        <div class="dn__body--name">{{$dn->tentiengviet}}</div>
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

                    <a href="{{ URL::to('/chat/user/'. $dn->getUser->id) }}" class="footer_nor"><span>Nhắn tin</span></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection