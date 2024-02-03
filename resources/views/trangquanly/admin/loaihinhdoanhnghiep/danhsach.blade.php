@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}

@section('head')
@endsection

@section('style')
@endsection

@section('content')
    {{-- thêm content vào form kế thừa chỗ @yield('content') --}}
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">{{ $tendanhsach }}</h4>
                            <a href="{{ route('admin.tintuc.them') }}" class="btn btn-primary float-right veiwbutton ">Thêm
                                loại hình hoạt động</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card pt-1">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                @foreach ($linhvuc as $item)
                                    @if ($loop->iteration == 1)
                                        <li class="nav-item"><a class="nav-link active tab-tab1"
                                                href="#solid-rounded-justified-tab{{ $loop->iteration }}"
                                                data-toggle="tab">{{ $item->tenlinhvuc }}</a></li>
                                    @else
                                        <li class="nav-item"><a class="nav-link tab-tab{{ $loop->iteration }}"
                                                href="#solid-rounded-justified-tab{{ $loop->iteration }}"
                                                data-toggle="tab">{{ $item->tenlinhvuc }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach ($linhvuc as $value)
                                    @if ($loop->iteration == 1)
                                        <div class="tab-pane show active" id="solid-rounded-justified-tab1">

                                            <div class="row  mt-5">

                                                @foreach ($danhsach as $item)
                                                    @if ($value->id == $item->linhvuc_id)
                                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                                            <div class="card mb-5 mt-3 mb-lg-0 bg-light border border-success rounded h-100"
                                                                style="margin-bottom: 20px;">
                                                                <div class="card-body">
                                                                    <h6 class="card-title text-uppercase text-center mb-5 text-success">
                                                                        {{ $item->tenloaihinh }}</h6>
                                                                    <hr>
                                                                    <img class="card-img"
                                                                        src="{{ URL::to('/assets/backend/img/loaihinhdoanhnghiep/' . $item->hinhanh) }}"
                                                                        alt="" height="200">
                                                                    <p class="mt-3">{{$item->mota}}</p>
                                                                    <hr>
                                                                    <div class="w-25">
                                                                            <a href="edit-pricing.html"
                                                                            class="btn btn-block btn-primary text-uppercase">Sửa</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>
                                        </div>
                                    @else
                                        <div class="tab-pane" id="solid-rounded-justified-tab{{ $loop->iteration }}">
                                            <div class="row  mt-5">

                                                @foreach ($danhsach as $item)
                                                    @if ($value->id == $item->linhvuc_id)
                                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                                            <div class="card mb-5 mt-3 mb-lg-0 bg-light border border-success rounded h-100"
                                                                style="margin-bottom: 20px;">
                                                                <div class="card-body">
                                                                    <h6 class="card-title text-uppercase text-center mb-5 text-success">
                                                                        {{ $item->tenloaihinh }}</h6>
                                                                    <hr>
                                                                    <img class="card-img"
                                                                        src="{{ URL::to('/assets/backend/img/loaihinhdoanhnghiep/' . $item->hinhanh) }}"
                                                                        alt="" height="200">
                                                                    <p class="mt-3">{{$item->mota}}</p>
                                                                    <hr>
                                                                    <div class="w-25">
                                                                        <a href="edit-pricing.html"
                                                                        class="btn btn-block btn-primary text-uppercase">Sửa</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Model delete xóa 1 bài báo --}}
        <div id="delete_asset" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('admin.tintuc.xoa') }}" method="POST">
                        @csrf
                        <div class="modal-body text-center"> <img src="{{ URL::to('assets/img/sent.png') }}" alt=""
                                width="50" height="46">
                            <h3 class="delete_class">Bạn thật sự muốn xóa tin tức này?</h3>
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                                <input class="form-control" type="hidden" id="e_id" name="id" value="">
                                <input class="form-control" type="hidden" id="e_fileupload" name="hinhanh" value="">
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Model delete --}}
    </div>
@endsection

@section('footer')
@endsection

@section('script')
@endsection
