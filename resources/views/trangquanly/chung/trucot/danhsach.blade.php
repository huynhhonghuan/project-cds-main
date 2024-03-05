@extends($layout){{-- kế thừa form layout --}}

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
                            {{-- <a href="add-blog.html"
                                class="btn btn-primary float-right veiwbutton">Add Blog</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach ($trucot as $value)
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                        <div class="card" style="height: 90%;"> <img class="card-img"
                                src="{{ URL::to('public/assets/backend/img/trucot/' . $value->hinhanh) }}" alt="">
                            <div class="card-img-overlay"> <a href="#" class="btn btn-light btn-sm">Sửa</a> </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $value->tentrucot }}</h4>
                                <p class="card-text mt-3">{{ $value->noidung }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
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
