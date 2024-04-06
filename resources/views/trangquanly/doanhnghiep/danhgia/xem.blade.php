@extends('trangquanly.doanhnghiep.layout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="content mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">{{ $tendanhsach }}</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        @if (count($danhsach->getdanhgia) == 0)
                            <div class="d-flex justify-content-center" style="margin-top: 20%;">
                                <h4 class="text-danger ">
                                    Chưa có đánh giá và xuất xuất từ chuyên gia
                                </h4>
                            </div>
                        @else
                            <div class="activity">
                                <div class="activity-box">
                                    <ul class="activity-list">
                                        @foreach ($danhsach->getdanhgia as $item)
                                            <li class="activity-list_li">
                                                <div class="activity-user">
                                                    <a href="profile.html" title="" data-toggle="tooltip"
                                                        class="avatar" data-original-title="Lesley Grauer"> <img
                                                            alt="Lesley Grauer" src="assets/img/profiles/avatar-01.jpg"
                                                            class="img-fluid rounded-circle"> </a>
                                                </div>
                                                <div class="activity-content">
                                                    <div class="timeline-content"> <a href="profile.html"
                                                            class="name">{{ $item->getuser->getchuyengia->tenchuyengia }}</a>
                                                        thuộc
                                                        lĩnh vực
                                                        <a href="#"
                                                            class="text-success">{{ $item->getuser->getchuyengia->getlinhvuc->tenlinhvuc }}</a>
                                                        <span class="time">
                                                            @if ($item->updated_at->diffInMinutes(date('Y-m-d H:i:s')) <= 60)
                                                                {{ $item->updated_at->diffInMinutes(date('Y-m-d H:i:s')) }}
                                                                phút
                                                                trước
                                                            @elseif(
                                                                $item->updated_at->diffInHours(date('Y-m-d H:i:s')) >= 1 &&
                                                                    $item->updated_at->diffInHours(date('Y-m-d H:i:s')) <= 24)
                                                                {{ $item->updated_at->diffInHours(date('Y-m-d H:i:s')) }}
                                                                giờ
                                                                trước
                                                            @else
                                                                {{ $item->updated_at }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <p><span class="text-info">Đánh giá: </span>
                                                            {{ $item->danhgia }}
                                                        </p>
                                                        <p><span class="text-info">Đề xuất: </span>
                                                            {{ $item->dexuat }}
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- <a class="activity-delete" href="" title="Delete">Thông&nbsp;tin</a> --}}
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
