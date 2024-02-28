{{--nhúng thanh navbar--}}
<header class="header_area bg-light">
    <div class="main-menu">
        <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
            <div class="container-fluid">
                <a class="navbar-brand mx-5" href="{{ route('home') }}"><img src="{{ URL::to('public/assets/frontend/img/logo/navbar_logo-1.png') }}" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa-solid fa-bars"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto ms-auto my-5 my-lg-0 navbar-nav-scroll"
                        style="--bs-scroll-height: 100px;">
                        <li class="nav-item dropdown mx-1">
                            <a class="nav-link dropdown-toggle text-uppercase fw-bold fs-5 text-secondary" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Tin tức
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown mx-1">
                            <a class="nav-link dropdown-toggle text-uppercase fw-bold fs-5 text-secondary" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Chuyển đổi số
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown mx-1">
                            <a class="nav-link dropdown-toggle text-uppercase fw-bold fs-5 text-secondary" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Giải pháp
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-uppercase fw-bold fs-5 text-secondary" href="#">Về CDS</a>
                          </li>

                        <form class="d-flex mx-5" role="search">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                            <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>

                        <li class="nav-but my-auto">
                            @if (Auth::user()!=null)
                            <a class="btn btn-outline-secondary text-uppercase fw-bold fs-6 " href="
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
                                <a class="btn btn-outline-secondary text-uppercase fw-bold fs-6 " href="{{ route('login') }}">Đăng nhập</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
