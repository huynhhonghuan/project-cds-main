@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    <div class="image-heading" style="margin-top: 126px">
        <img src="../image/AnhNen/banner-02.jpg" alt="">
        <h2 class="news-heading row" style="padding:0 24px;border-left: 10px solid #ecdd0b;border-right: 10px solid #ecdd0b;">Văn bản Chuyển đổi số</h2>
    </div>
    <div class="container" style="margin-top: 24px;">
        <div class="row">
            <div class="col-8">
                <nav aria-label="breadcrumb" style="font-size:16px;font-weight:500;margin-bottom:52px">
                    <ol class="breadcrumb" style="display: flex; align-item:center">
                        <li class="breadcrumb-item"><a href="{{ route('home')}}" style="text-decoration: none">Trang chủ</a></li>
                        <a href="#" style="text-decoration:none;">
                            <li class="breadcrumb-item" style="cursor: pointer;padding:0 8px;">> Thư Viện ></li>
                        </a>
                        @foreach($laycre as $cre) 
                            @if($cre->loai == 1)
                                <li class="breadcrumb-item active" style="cursor: pointer;">Văn bản địa phương</li>
                            @else    
                            @if($cre->loai == 0)
                                <li class="breadcrumb-item active" style="cursor: pointer;">Văn bản Trung Ương</li>
                            @else   
                            @if($cre->loai == 2)
                                <li class="breadcrumb-item active" style="cursor: pointer;">Văn bản Tập Huấn Chuyển đổi số</li>
                            @else   
                            @endif @endif @endif   
                        @endforeach
                    </ol>
                </nav>
            </div>
            <div class="col-4">
                <form class="d-flex" type="get" action="{{url('/searchvb')}}" role="search">
                    <input class="form-control me-2" name="query" type="search" placeholder="Nhập từ khóa cần tìm kiếm..." aria-label="Search">
                    <button style="padding: 0 32px" class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="container" style="margin-bottom: 32px">
            <div class="row">
            @foreach ($thuviens as $item)
            <div class="col-5" style="display:flex;box-shadow: 1px 1px 1px 1px #999;margin: 12px 54px;padding: 12px">
                <div class="col-4">
                    <div class="item-img-2">
                        <img class="img-fluid rounded mx-auto" style="height: 150px" src="https://cdn.tgdd.vn/2020/10/content/cach-chen-hinh-anh-vao-file-pdf-bang-foxit-reader-de-dang-THUMB-800x450.jpg" alt="">
                    </div>
                </div>
                <div class="col-7" style="margin: 0 32px">
                    <div class="item-content">
                        <div title="{{$item->tieude}}" class="item-content--main" style="user-select:none;font-weight:600;width:100%;color:#deb10c;height: 66px">{{$item->tieude}}</div>
                    </div>
                    <div class="item-content d-flex" style="padding-top: 12px;justify-content: space-between">
                        <div style="font-size: 16px;font-family:'Franklin Gothic Medium'">{{ date('d - m - Y', strtotime($item->namphathanh))}}</div>
                        <div class="d-flex" style="font-size: 16px" style="justify-content: end">
                            <a class="text-decoration-none" style="list-style: none;color: black" href="{{asset('assets/frontend/file/'.$item->file)}}">
                                <i class="fa-solid fa-download download-icon" style="color: blue"></i> Tải xuống
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
@endsection
