@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    <div id="body">
        <div class="container-fluid" style="padding: 0 0">
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
                    <li class="">
                        <img class="active" src="assets\frontend\img\slide\3.-logo-opt2.jpg" alt="">
                    </li>
                    <li class="">
                        <img src="assets\frontend\img\slide\chuyển đổi số.png" alt="">
                    </li>
                    <li class="">
                        <img src="assets\frontend\img\slide\2.-BUC-TRANH-CHUYEN-DOI-SO-TRONG-CAC-DOANH-NGHIEP-VUA-VA-NHOV2-01-1-1024x576.jpg" alt="">
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-field">
            <div class="container">
                <div class="item-field" data-aos="fade-up">
                    <div class="banner-field">
                        <h3>Các Lĩnh Vực</h3>
                        <h3>Chuyển Đổi Số</h3>
                    </div>
                </div>
                <div class="list-field row-cols-1 row-cols-xl-3 row-cols-md-3">
                    <div class="item-field col" data-aos="fade-up" data-aos-duration="1500">
                        <a href="{{ URL::to('/tintuc/NongNghiep') }}" style="text-decoration: none">
                            <img src="assets/backend/img/linhvuc/nongnghiep.jpg" alt="Hình ảnh">
                            <div class="content"><h3>Nông Nghiệp</h3></div>
                        </a>
                    </div>
                    <div class="item-field col" data-aos="fade-up" data-aos-duration="1500">
                        <a href="{{ URL::to('/tintuc/CongNghiep') }}" style="text-decoration: none">
                            <img src="assets/backend/img/linhvuc/congnghiep.jpg" alt="Hình ảnh">
                            <div class="content"><h3>Công Nghiệp</h3></div>
                        </a>
                    </div>
                    <div class="item-field col" data-aos="fade-up" data-aos-duration="1500">
                        <a href="{{ URL::to('/tintuc/TMDV') }}" style="text-decoration: none">
                            <img src="assets/backend/img/linhvuc/thuongmaidichvu.jpg" alt="Hình ảnh">
                            <div class="content"><h3 style="text-align : center">Thương Mại & Dịch Vụ</h3></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-background">
            <div class="container">
                <div class="news">
                    <span class="news-heading" data-aos="fade-up" style="padding : 32px 0;padding-top: 100px">
                        <span class="news-heading-f">Tin Tức</span>
                        <span class="news-heading-l">Nổi Bật</span>
                    </span>
                    <div class="list-news row row-cols-1 row-cols-md-2 row-cols-xl-3">
                        @foreach($tinmoi as $news)
                        <div class="col">
                            <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;"  data-aos-duration="1500" data-aos="fade-up">
                                <div class="item-news col">
                                    <div class="item-img">
                                        <img src="{{ asset('assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
                                    </div>
                                    <div class="item-header row">
                                        <div class="col-xl-6" style="padding-top: 4px">
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
                                        <div class="col-xl-6" style="padding-top: 4px;display: flex;justify-content: end;
                                        align-items: center;font-size:16px;font-weight:700"><i class="fa-regular fa-clock" style="padding-right: 4px"></i>
                                            {{ date('d/m/Y', strtotime($news->updated_at))}}
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content--main">{{$news->tieude}}</div>
                                    </div>
                                    <div class="item-footer">
                                        <div class="item-detail">
                                            Xem chi tiết
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @foreach($tinmoi3 as $news)
                        <div class="col">
                            <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;"  data-aos-duration="1500" data-aos="fade-up">
                                <div class="item-news col">
                                    <div class="item-img">
                                        <img src="{{ asset('assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
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
                                        <div class="col-xl-6" style="padding-top: 4px;display: flex;justify-content: end;
                                        align-items: center;font-size:16px;font-weight:700"><i class="fa-regular fa-clock" style="padding-right: 4px"></i>
                                            {{ date('d/m/Y', strtotime($news->updated_at))}}
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content--main">{{$news->tieude}}</div>
                                    </div>
                                    <div class="item-footer">
                                        <div class="item-detail">
                                            Xem chi tiết
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <div class="col" data-aos="fade-up" data-aos-duration="1500">
                            @foreach($tinmoi2 as $news)
                            <div class="row" style="height: 100px;width:100%">
                                <a href="{{ URL::to('/tin/'. $news->id) }}" style="text-decoration: none; display:flex;border-bottom: 1px solid #eaeaea;margin-top: 0;">
                                    <div class="col-xl-3" style="margin:10px">
                                        <div class="item-img-2">
                                            <img src="{{ asset('assets/frontend/img/trangtin/'.$news->hinhanh) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="item-content">
                                            <div class="item-content--main" style="margin-top: 0;font-size:16px;padding: 0;padding-top: 16px;width:100% ">{{$news->tieude}}</div>
                                        </div>
                                        <div class="item-footer" style="">
                                            <div class="item-header row">
                                                <div class="col-xl-9" style="">
                                                    @if($news->tenlinhvuc == 'Nông nghiệp') 
                                                        <span style="background-color: green;padding:2px 6px;border-radius:10px;color:#fff;font-weight:600;font-size:14px">Nông Nghiệp</span>
                                                    @elseif($news->tenlinhvuc == 'Công nghiệp') 
                                                        <span style="background-color: blue;padding:2px 6px;border-radius:10px;color:#fff;font-weight:600;font-size:14px">Công Nghiệp</span>
                                                    @elseif($news->tenlinhvuc == 'Thương mại và dịch vụ') 
                                                        <span style="background-color: yellow;padding:2px 6px;border-radius:10px;font-weight:600;font-size:14px">Thương mại - Dịch vụ</span>
                                                    @elseif($news->tenlinhvuc == 'Khác') 
                                                        <span style="background-color: rgb(9, 153, 243);padding:2px 6px;border-radius:10px;font-weight:600;font-size:14px">Chuyển đổi số</span>
                                                    @endif    
                                                </div>
                                                <div class="col-xl-3" style="display: flex;justify-content: end;
                                                align-items: center;font-size:16px;font-weight:700"><i class="fa-regular fa-clock" style="padding-right: 4px"></i>
                                                    {{ date('d/m/Y', strtotime($news->updated_at))}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-content" style="margin-top: 32px;margin-bottom: 32px">
            <div class="container">
                <span class="news-heading"  data-aos="fade-up" style="margin:32px 0">
                    <span class="news-heading-f">Video</span>
                    <span class="news-heading-l">Chuyển đổi số</span>
                </span>
                <div class="row row-cols-xl-3" style="margin-top: 64px"  data-aos="fade-up">
                    @foreach($videos as $vd)
                    <div class="col-xl" style="text-align: center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <div class="video--main">
                                {!!$vd->file!!}
                            </div>
                            {{-- <iframe height="200" src="{{$vd->file}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
                        </div>
                        <a class="video-tt-href" href="" style="text-decoration: none;">
                            <div class="video-title" style="font-size: 18px; margin-bottom: 12px;">{{$vd->tieude}}</div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="target" style="background-image: url(../image/AnhNen/title-area-pattern.png);background-color:rgb(250, 249, 232)">
            <span class="news-heading"  data-aos="fade-up" style="margin-top: 8px">
                <span class="news-heading-f">Chương Trình</span>
                <span class="news-heading-l">Chuyển đổi số</span>
            </span>
            <span class="news-heading" data-aos="fade-up" style="padding: 0; font-size:28px;">Mục tiêu chính đến năm 2025</span>
            <div class="target__main" style="margin-top: 32px;">
                <div class="container">
                    <div class="row" style="display: flex; justify-content:center">
                        <div class="col"></div>
                        <div class="col-3" style="margin: 0 auto">
                            <a href="#" style="text-decoration: none">
                                <div class="image--target" data-aos="zoom-in">
                                    <img class="target__main--img" src="https://storage-vnportal.vnpt.vn/btn-ubnd/6698/xahamhiep/chuyen-doi-so-16996058445371384191410.jpg" alt="">
                                </div>
                                <span class="target__main--title" data-aos="fade-up"><h4>Phát triển Chính quyền số</h4></span>
                            </a>
                        </div>
                        <div class="col-3" style="margin: 0 auto">
                            <a href="#" style="text-decoration: none">
                                <div class="image--target" data-aos="zoom-in">
                                    <img class="target__main--img" src="https://media.vneconomy.vn/w800/images/upload/2021/09/03/anh-chup-man-hinh-2021-09-03-luc-11-57-36.png" alt="">
                                </div>
                                <span class="target__main--title" data-aos="fade-up"><h4>Phát triển Kinh tế số</h4></span>    
                            </a>
                        </div>
                        <div class="col-3" style="margin: 0 auto">
                            <a href="#" style="text-decoration: none">
                                <div class="image--target" data-aos="zoom-in">
                                    <img class="target__main--img" src="https://storage-vnportal.vnpt.vn/nbh-ubnd/2455/2023/anhdaidien/31-12-2017-cong-bo-10-su-kien-cong-nghe-thong-tin-truyen-thong-tieu-bieu-nam-2017-22904cea-details.jpg" alt="">
                                </div>
                                <span class="target__main--title" data-aos="fade-up"><h4>Phát triển Xã hội số</h4></span>    
                            </a>
                        </div>
                        <div class="col"></div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="website" style="background-image: url(../image/AnhNen/title-area-pattern.png);">
            <span class="news-heading" data-aos="fade-up" style="padding : 32px 0;padding-top: 60px">
                <span class="news-heading-f">Liên Kết website</span>
                <span class="news-heading-l">Chuyển đổi số</span>
            </span>
            <div class="container" style="margin-bottom: 64px;margin-top: 32px;" data-aos="fade-up">
                <div class="row">
                    <div class="col-4 d-flex justify-content-center" style="padding:16px;border:1px solid #f7c51e">
                        <a target="_blank" href="https://mic.gov.vn/">
                            <img class="image__bus" src="https://dti.angiang.gov.vn/sites/default/files/2024-01/banner-botttt.png" alt="">
                        </a>
                    </div>
                    <div class="col-4 d-flex justify-content-center" style="padding:16px;border:1px solid #f7c51e">
                        <a target="_blank" href="https://langso.dx.gov.vn/">
                            <img class="image__bus" src="https://dti.angiang.gov.vn/sites/default/files/2024-01/banner-langso1_0.png" alt="">
                        </a>
                    </div>
                    <div class="col-4" style="background:#000;padding:16px;border:1px solid #f7c51e">
                        <a target="_blank" href="https://digital.business.gov.vn/">
                            <img class="image__bus" style="width:100%;height:100px;object-fit:contain" src="https://digital.business.gov.vn/wp-content/uploads/2021/11/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-4 d-flex justify-content-center" style="padding:16px;border:1px solid #f7c51e">
                        <a target="_blank" href="https://dti.angiang.gov.vn/">
                            <img class="image__bus" src="https://dti.angiang.gov.vn/sites/default/files/cdsag.png" alt="">
                        </a>
                    </div>
                    <div class="col-4 d-flex justify-content-center" style="padding:16px;border:1px solid #f7c51e">
                        <a target="_blank" href="https://sotttt.angiang.gov.vn/">
                            <img class="image__bus" src="https://dti.angiang.gov.vn/sites/default/files/2024-01/banner-sottttDTI.png" alt="">
                        </a>
                    </div>
                    <div class="col-4 d-flex justify-content-center" style="padding:16px;border:1px solid #111">
                        <a target="_blank" href="https://dx.gov.vn/"> 
                            <img class="image__bus" style="width:100%;height:100px" src="https://dx.gov.vn/img/logo-tet.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="business">
            <span class="news-heading" data-aos="fade-up" style="padding : 32px 0;padding-top: 60px">
                <span class="news-heading-f">Các Doanh nghiệp</span>
                <span class="news-heading-l">Liên kết</span>
            </span>
            <div class="container swiper mySwiper">
                <div class="swiper-wrapper" style="margin-bottom: 20px">
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="https://www.loctroi.vn/">
                                <img src="https://www.loctroi.vn/images/Logo.png" alt="">
                            </a>
                        </div>
                        <div class="card__content">Tập đoàn lộc trời an giang</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="https://antesco.com/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191009081058_5d9d33a2704ab.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">CÔNG TY CỔ PHẦN RAU QUẢ THỰC PHẨM AN GIANG</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="http://chieuuzu.com/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20190925100453_5d8ad955d64f4.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">Tân châu long</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="https://socongthuong.angiang.gov.vn/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20190930075845_5d915345be7d7.png" alt="">
                            </a>
                        </div>
                        <div class="card__content">Sở công thương tỉnh an giang</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="https://agifish.com.vn/vi/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191008153113_5d9c49519b098.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">Công ty Cổ phần Xuất nhập khẩu Thủy sản An Giang</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="http://anmyfish.com.vn/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191009073613_5d9d2b7dc8d46.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">AN MY FISH JOINT STOCK COMPANY</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="https://saomaigroup.com/">
                                <img src="https://saomaigroup.com/vnt_upload/weblink/logo.png" alt="">
                            </a>
                        </div>
                        <div class="card__content">Tập đoàn sao mai</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="http://www.xaylapangiang.com/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191008154138_5d9c4bc25506c.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">Công ty cổ phần xây lắp an giang</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="https://tvfood.com.vn/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191008153941_5d9c4b4de7005.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">Công ty TNHH TVFOOD</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="https://clfish.com/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191008154615_5d9c4cd7c701f.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">CÔNG TY CP XUẤT NHẬP KHẨU THỦY SẢN CỬU LONG AN GIANG</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="http://www.pangamekong.com/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191008155136_5d9c4e1854bac.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">Bạn và tôi food corporation</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="https://afiex.com.vn/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191008155748_5d9c4f8c21443.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">Công ty cỏ phần xuất nhập khẩu afiex</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="http://ducthanhgarment.com/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191008161453_5d9c538de1678.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">Công ty đức thành</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="https://angimex.com.vn/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191010100305_5d9e9f69a6de0.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">Công ty CP Xuất nhập khẩu an giang</div>
                    </div>
                    <div class="swiper-slide card" style="display: flex;align-items:center">
                        <div class="image">
                            <a target="_blank" href="https://newcafe.com.vn/">
                                <img src="https://dacsan.cdsdnag.com/storage/images/thumb_800x800/20191105084633_5dc0d4792930f.jpg" alt="">
                            </a>
                        </div>
                        <div class="card__content">Công ty TNHH MTV Newcafe</div>
                    </div>
                </div>
                <div class="swiper-pagination" style="margin-top: 16px"></div>
            </div>
        </div>
        @include('trangchu.layouts.script')
    </div>
@endsection
