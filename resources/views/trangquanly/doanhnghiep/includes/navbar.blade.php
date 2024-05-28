{{--Navbar của trang quản lý--}}
<div class="header">
    <div class="header-left">
        <a href="{{ route('doanhnghiep.home') }}" class="logo">
            <div style="height: 45px">
                <img src="{{ env('APP_URL') }}/assets/backend/img/vaitro/enterprise.png" width="40" height="40" alt="logo">
                <span class="logoclass text-uppercase" style="font-size: 22px ">Doanh nghiệp</span>
            </div>
            @if(Auth::user()->getdoanhnghiep->hoivien == 0)
            <span class="d-flex" style="align-items: center;height: 35px;padding-left:48px;font-size: 14px;"><i class="fa-solid fa-gem" style="color: #000;margin-right:8px"></i><span style="color:black;">Chưa là hội viên</span></span>
            @else @if(Auth::user()->getdoanhnghiep->hoivien == 1)
            <span class="d-flex" style="align-items: center;height: 35px;padding-left:48px;font-size: 14px;"><i class="fa-solid fa-gem" style="color: #f2f243;margin-right:8px"></i><span style="color:black;font-weight:600">Thành viên hiệp hội</span></span>
            @endif @endif
        </a>
        <a href="{{ route('doanhnghiep.home') }}" class="logo logo-small"> <img src="{{ env('APP_URL') }}/assets/backend/img/vaitro/enterprise.png" alt="Logo" width="30" height="30">
        </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i></a>
    <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
    <ul class="nav user-menu">
        <li class="nav-item dropdown noti-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span class="badge badge-pill">{{$thongbaos->count()}}</span> </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header"> <span class="notification-title">Thông Báo</span></div>
                <div class="noti-content">
                    <ul class="notification-list">
                        @foreach($thongbaos as $tb)
                        <li class="notification-message">
                            <a href="{{($tb->loai == 'tinnhan' && $tb->loai_id) ? route('doanhnghiep.tinnhan', $tb->loai_id) : "#"}}">
                                <div class="media"> <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="https://atpcons.com/wp-content/uploads/2018/05/icon-enterprise.png">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">{{$tb->tieude}}</span></p>
                                        <p class="noti-time"><span class="notification-time"></span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="{{ URL::to('assets/backend/img/hoso/user-profile.png') }}" width="31" alt="Doanh nghiệp"></span> </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm"> <img src="{{ URL::to('assets/backend/img/hoso/user-profile.png') }}" alt="User Image" class="avatar-img rounded-circle"> </div>
                    <div class="user-text">
                        <h6>{{Auth::user()->name}}</h6>{{--hiện tên của người đại diện--}}
                        <p class="text-muted mb-0">Quản lý</p>{{--hiện chức vụ của người đại diện--}}
                    </div>
                </div>
                <a class="dropdown-item" href="{{ route('doanhnghiep.profile') }}">Thông tin của tôi</a>
                <a class="dropdown-item" href="settings.html">Cài đặt</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
            </div>
        </li>
    </ul>
    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Tìm kiếm...">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>