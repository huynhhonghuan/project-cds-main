@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
    <div class="container">
        <div class="news-background" style="margin-bottom: 200px;margin-top: 185px;">
            <div class="lib-content" style="margin-bottom: 64px">
                <table class="table table-stripped table table-hover table-center mb-3">
                    <thead>
                        <tr>
                            <th scope="col" width="5%" class="text-center" style="text-transform: uppercase">STT</th>
                            <th scope="col" width="10%" class="text-center" style="text-transform: uppercase">Ký Hiệu</th>
                            <th scope="col" width="15%" class="text-center" style="text-transform: uppercase">Loại Văn Bản</th>
                            <th scope="col" width="45%" class="text-center" style="text-transform: uppercase" style="text-align: center">Trích Yếu</th>
                            <th scope="col" width="15%" class="text-center" style="text-transform: uppercase">Ngày Ban Hành</th>
                            <th scope="col" class="text-center" style="text-transform: uppercase" width="10%">Tải Xuống</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vanban as $tv)
                            <div class="lib-content-body">
                                <tr>
                                    <td style="text-align: center;vertical-align:middle ;font-size:16px">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;vertical-align:middle ;font-size:16px">{{ $tv->kyhieu }}</td>
                                    @if($tv->loai == 0)
                                        <td style="text-align: center;vertical-align:middle ;font-size:16px">Văn bản trung ương</td>
                                    @else    
                                    @if($tv->loai == 1)
                                        <td style="text-align: center;vertical-align:middle ;font-size:16px">Văn bản Địa phương</td>
                                    @else @endif @endif    
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
    </div>
@endsection