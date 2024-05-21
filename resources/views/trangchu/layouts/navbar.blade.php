{{--nhúng thanh navbar--}}
<header class="header_area bg-light fixed-top">
    <div class="main-menu">
        <div class="top-bar bg-gray">
            <div class="container">
                <div class="row">
                    <div class="mt-topbar-left">
                        <ul class="list-unstyled e-p-bx pull-right">
                            <li><i class="fa fa-bookmark"></i><span>Chương trình Chuyển đổi số Tỉnh An Giang</span></li>
                            <li><a href="tel:029633852578"><i class="fa fa-phone"></i><span>(02963) 3852578</span></a></li>
                            <li><a href="mailto:ubag.cds@mic.gov.vn"><i class="fa fa-envelope"></i><span>ubag.cds@mic.gov.vn</span></a></li>
                        </ul>
                    </div>
                    <div class="mt-topbar-right">
                        <div class="appint-btn" style="display: ruby">
                            <div class="nav-but my-auto">
                                @if (Auth::user()!=null)
                                <a class="btn text-uppercase fw-bold fs-12 text-dark b-main btn-head" href="
                                    @if (Auth::user()->getVaiTro[0]->id == "ad")
                                        {{route('admin.home')}}
                                    @elseif(Auth::user()->getVaiTro[0]->id == "ctv")
                                        {{route('congtacvien.home')}}
                                    @elseif(Auth::user()->getVaiTro[0]->id == "dn")
                                        {{route('doanhnghiep.home')}}
                                    @elseif(Auth::user()->getVaiTro[0]->id == "hhdn")
                                        {{route('hiephoidoanhnghiep.home')}}
                                    @endif">Bảng điều khiển</a>
                                @else
                                    <a class="btn text-uppercase fw-bold fs-12 b-main btn-head" href="{{ route('login') }}">
                                        Đăng Nhập
                                    </a>
                                @endif
                            </div>
                            <img src="https://dx.gov.vn/img/icon/vn.png" alt="" onclick=" alert('Đang xây dựng')">
                            <img src="https://dx.gov.vn/img/icon/us.png" alt="" onclick=" alert('Đang xây dựng')">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #f7c51e; box-shadow: 1px 1px 8px #999">
            <div class="container-fluid">
                <a class="navbar-brand mx-5" href="{{ route('home') }}"><img src="{{ URL::to('assets/frontend/img/logo/logo.png') }}" alt="logo" style="border:2px dashed #000;height:62px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa-solid fa-bars"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav ms-auto my-5 my-lg-0 navbar-nav-scroll"
                        style="--bs-scroll-height: 100px;">
                        <li class="nav-item dropdown mx-5 nav-first ">
                            <a class="nav-link text-uppercase fw-bold fs-14 c-main" href="{{ route('home') }}" role="button"
                                aria-expanded="false">
                                Trang Chủ
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link text-uppercase fw-bold fs-14 c-main" href="{{ route('AllTin') }}" role="button"
                                aria-expanded="false">
                                Tin tức
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link text-uppercase fw-bold fs-14 c-main" href="{{ route('AllVideo') }}" role="button"
                                aria-expanded="false">
                                Video
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link text-uppercase fw-bold fs-14 c-main" role="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Thư Viện
                            </a>
                            <ul id="submenu">
                                <li style="list-style:none"><a href="{{ URL::to('/thuvien/1') }}" style="text-decoration: none; text-transform: uppercase">Văn bản địa phương</a></li>
                                <li style="list-style:none"><a href="{{ URL::to('/thuvien/0') }}" style="text-decoration: none; text-transform: uppercase">Văn bản Trung ương</a></li>
                                <li style="list-style:none"><a href="{{ URL::to('/thuvien/2') }}" style="text-decoration: none; text-transform: uppercase">Văn bản tập huấn chuyển đổi số</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link text-uppercase fw-bold fs-14 c-main" href="{{ route('doanhnghiep') }}" role="button"
                                aria-expanded="false">
                                Doanh Nghiệp
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link text-uppercase fw-bold fs-14 c-main" href="{{ route('sanpham') }}" role="button"
                                aria-expanded="false">
                                Sản phẩm
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link text-uppercase fw-bold fs-14 c-main" href="{{ route('diendan') }}" role="button"
                                aria-expanded="false">
                                Diễn đàn
                            </a>
                        </li>
                        <form class="d-flex mx-5" type="get" action="{{url('/search')}}" role="search">
                            <input class="form-control me-2" name="query" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

