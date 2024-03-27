@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="video-content" style="margin-top: 132px">
    <div class="container">
        <div class="image-heading-tt" style="padding:64px 0;padding-top: 64px;">
            <span class="news-heading"style="padding:0 24px;border-left: 10px solid #043359;border-right: 10px solid #043359;">
                <span class="news-heading-f">Video</span>
                <span class="news-heading-l">chuyển đổi số</span>
            </span>
        </div>
        <div class="row row-cols-3 row-cols-md-1">
            @foreach($AllVideo as $vd)
            <div class="col-xl-4" style="text-align: center; padding-bottom: 16px">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="415" height="200" src="{{$vd->file}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <a class="video-tt-href" href="#" style="text-decoration: none;">
                    <div class="video-title" style="font-size: 18px; margin-bottom: 12px;">{{$vd->tieude}}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection