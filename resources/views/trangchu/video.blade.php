@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="video-content" style="margin-top: 132px">
    <div class="container">
        <h2 class="news-heading row" style="color: black">Video Nổi Bật</h2>
        <div class="row row-cols-3 row-cols-md-1">
            @foreach($AllVideo as $vd)
            <div class="col-xl-4" style="text-align: center">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="415" height="200" src="{{$vd->file}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <a class="video-tt-href" href="" style="text-decoration: none;">
                    <div class="video-title" style="font-size: 18px; margin-bottom: 12px;">{{$vd->tieude}}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection