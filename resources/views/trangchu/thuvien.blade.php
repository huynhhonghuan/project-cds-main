@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    @foreach ($thuviens as $tv)
    @endforeach
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
                            @endif @endif       
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
        <div class="lib-content" style="margin-bottom: 64px">
            <table class="table table-stripped table table-hover table-center mb-3">
                <thead>
                    <tr>
                        <th scope="col" width="10%" class="text-center" style="text-transform: uppercase">STT</th>
                        <th scope="col" width="20%" class="text-center" style="text-transform: uppercase">Ký Hiệu</th>
                        <th scope="col" width="45%" class="text-center" style="text-transform: uppercase" style="text-align: center">Trích Yếu</th>
                        <th scope="col" width="15%" class="text-center" style="text-transform: uppercase">Ngày Ban Hành</th>
                        <th scope="col" class="text-center" style="text-transform: uppercase" width="10%">Tải Xuống</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($thuviens as $tv)
                        <div class="lib-content-body">
                            <tr>
                                <td style="text-align: center;vertical-align:middle ;font-size:16px">{{ $loop->iteration }}</td>
                                <td style="text-align: center;vertical-align:middle ;font-size:16px">{{ $tv->kyhieu }}</td>
                                <td style="text-align: justify; font-size:16px">{{ $tv->tieude }}</td>
                                <td class="date" style="text-align: center;vertical-align:middle ;font-size:16px">{{ date('d/m/Y', strtotime($tv->namphathanh))}}</td>
                                <td style="text-align: center;vertical-align:middle ;font-size:16px"><a href="{{asset('assets/frontend/file/'.$tv->file)}}">
                                    <i class="fa-solid fa-download download-icon"></i>
                                </a></td>
                            </tr>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection
