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
                                        <li class="activity-list_li">
                                            <div class="activity-user">
                                                <a href="profile.html" title="" data-toggle="tooltip" class="avatar"
                                                    data-original-title="Lesley Grauer"> <img alt="Lesley Grauer"
                                                        src="assets/img/profiles/avatar-01.jpg"
                                                        class="img-fluid rounded-circle"> </a>
                                            </div>
                                            <div class="activity-content">
                                                <div class="timeline-content"> <a href="profile.html" class="name">Chuyên
                                                        gia 1</a> thuộc lĩnh vực <a href="activities.html"
                                                        class="text-success">Nông nghiệp</a> <span class="time">4 mins
                                                        ago</span>
                                                </div>
                                                <div class="mt-1">
                                                    <p><span class="text-info">Đánh giá: </span>
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum,
                                                        minus? Quisquam iure quae dicta nobis vel ratione accusamus alias
                                                        similique reprehenderit laboriosam porro doloribus, deserunt
                                                        voluptatum.
                                                        Hic sequi ipsam quia.
                                                    </p>
                                                    <p><span class="text-info">Đề xuất: </span>
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum,
                                                        minus? Quisquam iure quae dicta nobis vel ratione accusamus alias
                                                        similique reprehenderit laboriosam porro doloribus, deserunt
                                                        voluptatum.
                                                        Hic sequi ipsam quia.
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- <a class="activity-delete" href="" title="Delete">Thông&nbsp;tin</a> --}}
                                        </li>
                                        <li class="activity-list_li">
                                            <div class="activity-user">
                                                <a href="profile.html" title="" data-toggle="tooltip" class="avatar"
                                                    data-original-title="Lesley Grauer"> <img alt="Lesley Grauer"
                                                        src="assets/img/profiles/avatar-01.jpg"
                                                        class="img-fluid rounded-circle"> </a>
                                            </div>
                                            <div class="activity-content">
                                                <div class="timeline-content"> <a href="profile.html" class="name">Chuyên
                                                        gia 2</a> thuộc lĩnh vực <a href="activities.html"
                                                        class="text-success">Nông nghiệp</a> <span class="time">10 mins
                                                        ago</span>
                                                </div>
                                                <div class="mt-1">
                                                    <p><span class="text-info">Đánh giá: </span>
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum,
                                                        minus? Quisquam iure quae dicta nobis vel ratione accusamus alias
                                                        similique reprehenderit laboriosam porro doloribus, deserunt
                                                        voluptatum.
                                                        Hic sequi ipsam quia.
                                                    </p>
                                                    <p><span class="text-info">Đề xuất: </span>
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum,
                                                        minus? Quisquam iure quae dicta nobis vel ratione accusamus alias
                                                        similique reprehenderit laboriosam porro doloribus, deserunt
                                                        voluptatum.
                                                        Hic sequi ipsam quia.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="activity-list_li">
                                            <div class="activity-user">
                                                <a href="profile.html" title="" data-toggle="tooltip" class="avatar"
                                                    data-original-title="Lesley Grauer"> <img alt="Lesley Grauer"
                                                        src="assets/img/profiles/avatar-01.jpg"
                                                        class="img-fluid rounded-circle"> </a>
                                            </div>
                                            <div class="activity-content">
                                                <div class="timeline-content"> <a href="profile.html" class="name">Chuyên
                                                        gia 3</a> thuộc lĩnh vực <a href="activities.html"
                                                        class="text-success">Nông nghiệp</a> <span class="time">14 mins
                                                        ago</span>
                                                </div>
                                                <div class="mt-1">
                                                    <p><span class="text-info">Đánh giá: </span>
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum,
                                                        minus? Quisquam iure quae dicta nobis vel ratione accusamus alias
                                                        similique reprehenderit laboriosam porro doloribus, deserunt
                                                        voluptatum.
                                                        Hic sequi ipsam quia.
                                                    </p>
                                                    <p><span class="text-info">Đề xuất: </span>
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum,
                                                        minus? Quisquam iure quae dicta nobis vel ratione accusamus alias
                                                        similique reprehenderit laboriosam porro doloribus, deserunt
                                                        voluptatum.
                                                        Hic sequi ipsam quia.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>

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
