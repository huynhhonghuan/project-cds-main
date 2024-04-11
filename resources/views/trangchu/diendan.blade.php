@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<div class="news-background" style="margin-top: 146px;">
    <div class="container" style="padding: 0 125px;">
        <div class="forum__list" style="padding: 16px 0;margin-top: 16px">
            @foreach ($baiviets as $item)
            <div class="forum__item">
                <div class="forum__header d-flex mb-1">
                    <div class="forum__header--left pe-3">
                        <img style="width:50px; height:50px;border-radius:50%;border: 2px solid #0866FF" src="{{ asset('assets/backend/img/hoso/'.$item->getUser->image) }}" alt="">
                    </div>
                    <div class="forum__header--right">
                        <div class="header__right--top fs-5 fw-bold" >{{$item->getUser->name}}</div>
                        <div class="header__right--bot fs-6">{{ date('d/m/Y', strtotime($item->created_at))}}</div>
                    </div>
                </div>
                <div class="forum__body">
                    <div class="hagtag mb-2">
                        @foreach($item->getDanhMucs as $danhmuc)
                            <div class="hagtag__item">
                                <i class="fa-solid fa-tag"></i>
                                {{$danhmuc->tendanhmuc}}
                            </div>
                        @endforeach
                    </div>
                    <p style="text-align: justify">
                        {{$item->noidung}}
                    </p>
                    <div class="forum__body--img row">
                        @foreach ($item->getHinhAnhs as $hinhanh)
                            @if($item->getHinhAnhs->count() == 1)
                                <img class="col" src="{{ asset('assets/frontend/img/diendan/'. $hinhanh->hinhanh) }}" alt="">
                            @else @if ($item->getHinhAnhs->count() == 2)
                                <img class="col-6" style="padding: 6px" src="{{ asset('assets/frontend/img/diendan/'. $hinhanh->hinhanh) }}" alt="">
                            @else @if ($item->getHinhAnhs->count() == 3)
                                <img class="col-4" style="padding: 6px" src="{{ asset('assets/frontend/img/diendan/'. $hinhanh->hinhanh) }}" alt="">
                            @else @if ($item->getHinhAnhs->count() > 3)
                                <img class="col-6" style="padding: 6px" src="{{ asset('assets/frontend/img/diendan/'. $hinhanh->hinhanh) }}" alt="">
                             @else @endif @endif @endif @endif
                        @endforeach
                    </div>
                </div>
                <div class="forum__show d-flex">
                    <div class="col py-2 d-flex justify-content-start ps-3 align-items-center">
                        <div class="like">
                            <i class="fa-solid fa-heart pe-1" style="color: red"></i>
                            <span class="forum__show--text">{{$item->likes->count()}} đã thích</span>
                            @if($item->likes->count() > 0)
                                <div class="sub__like">
                                    @foreach($item->likes as $dsthich)
                                        <div class="sub__like--detail">
                                            {{$dsthich->getUser->name}}
                                        </div>
                                    @endforeach
                                </div>
                            @else @endif    
                        </div>
                    </div>
                    <div class="col py-2 d-flex justify-content-end ps-3 align-items-center">
                        <div class="forum__comment">
                            @if($item->getBinhLuans->count() > 0)
                            <i class="fa-solid fa-comment pe-1" style="color: #0866FF;"></i>
                            <span class="forum__show--text">{{$item->getBinhLuans->count()}} bình luận</span>
                                <div class="sub__comment">
                                    @foreach($item->getBinhLuans as $dsbinhluan)
                                        <div class="sub__like--detail" style="text-align:center">
                                            {{$dsbinhluan->getUser->name}}
                                        </div>
                                    @endforeach
                                </div>
                            @else @endif    
                        </div>
                    </div>
                </div>
                <div class="forum__footer d-flex" style="border-top: 1px solid #b3b3b3;border-bottom: 1px solid #b3b3b3">
                    @if(Auth::user() != null)
                        <div class="col py-2">
                            {{-- @if($item->likes->user_id == Auth::user()->id) --}}
                                <form action="{{ route('like', $item->id)}}" method="post"> @csrf
                                    <button type="submit" style="border:none;color:red"><i class="fa-regular fa-heart pe-1"></i>
                                        Thích</button>
                                </form>      
                            {{-- @else 
                                <form action="{{ route('like', $item->id)}}" method="post"> @csrf
                                    <button type="submit" style="border:none;"><i class="fa-regular fa-heart pe-1"></i>
                                        Thích</button>
                                </form>
                            @endif     --}}
                        </div>
                        <div class="col py-2">
                            <i class="fa-regular fa-comment"></i>
                            Bình Luận
                        </div>
                        <div class="col py-2">
                            <i class="fa-solid fa-share"></i>
                            Chia Sẻ
                        </div>
                    @else 
                        <div class="col py-2" style="display:none">
                            <i class="fa-regular fa-heart pe-1"></i>
                            Thích
                        </div>
                        <div class="col py-2" style="display:none">
                            <i class="fa-regular fa-comment"></i>
                            Bình Luận
                        </div>
                        <div class="col py-2">
                            <i class="fa-solid fa-share"></i>
                            Chia Sẻ
                        </div>
                    @endif
                </div>
                <div class="comment__detail">
                    @foreach($item->getBinhLuans as $binhluan)
                        
                    
                    @endforeach
                </div>
                @if (Auth::user()!= null)
                    <div class="forum__commment pt-2 d-flex w-100">
                        <div class="forum__header--left pe-3 col d-flex justify-content-center">
                            <img style="width:40px; height:40px;border-radius:50%;border: 2px solid #0866FF" src="{{ asset('assets/backend/img/hoso/'. Auth::user()->image) }}" alt="">
                        </div>
                        <form action="" class="col-11" style="display:flex" method="post"> @csrf
                            <input name="" id="" rows="2" style="width:100%; margin-right:8px;border-radius: 12px;border: 1px solid #d3d3d3"></input>
                            <button type="submit" class="" style="border:none;border-radius: 12px;">
                                <i class="fa-regular fa-paper-plane" style="padding: 4px 16px; color: #0866FF"></i>
                            </button>
                        </form>
                    </div>
                @else
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection