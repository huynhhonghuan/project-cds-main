{{--Sidebar bên phải--}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active"> <a href="{{route('admin.home')}}"><i class="fas fa-tachometer-alt"></i> <span>Bảng điều khiển</span></a> </li>

                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý doanh nghiệp</span> </li>
                <li class="submenu"> <a href="#"><i class="fa-regular fa-building"></i> <span> Khảo sát </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href=""> Danh sách khảo sát tổng</a></li>
                        <li><a href=""> Khảo sát - nông nghiệp</a></li>
                        <li><a href=""> Khảo sát - công nghiệp</a></li>
                        <li><a href=""> Khảo sát - thương mại và dịch vụ</a></li>
                        <li><a href=""> Khảo sát - khác</a></li>
                    </ul>
                </li>

                <li class="submenu"> <a href="#"><i class="fa-solid fa-bullseye"></i> <span> Chiến lược </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href=""> Danh sách chiến lược tổng</a></li>
                        <li><a href=""> Chiến lược - nông nghiệp</a></li>
                        <li><a href=""> Chiến lược - công nghiệp</a></li>
                        <li><a href=""> Chiến lược - thương mại và dịch vụ</a></li>
                        <li><a href=""> Chiến lược - khác</a></li>
                    </ul>
                </li>

                <li> <a href="{{route('admin.mucdo.danhsach')}}"><i class="fa-solid fa-list-ol"></i> <span>Mức độ chuyển đổi số</span></a> </li>

                <li> <a href="{{route('admin.trucot.danhsach')}}"><i class="fa-solid fa-recycle"></i></i><span>Trụ cột chuyển đổi số</span></a> </li>


                <li class="submenu"> <a href="#"><i class="fa-regular fa-circle-question"></i> <span> Bộ câu hỏi khảo sát</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="#"> Phiếu 1 </a></li>
                        <li><a href="#"> Phiếu 2 </a></li>
                        <li><a href="#"> Phiếu 3 </a></li>
                        <li><a href="#"> Phiếu 4 </a></li>

                    </ul>
                </li>

                <li class="submenu"> <a href="#"><i class="fa-brands fa-nfc-symbol"></i> <span> Lĩnh vực </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{route('admin.linhvuc.danhsach')}}"> Danh sách lĩnh vực </a></li>
                        <li><a href="{{route('admin.loaihinhdoanhnghiep.danhsach')}}"> Danh sách loại hình doanh nghiệp </a></li>
                    </ul>
                </li>

                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý chuyên gia</span> </li>
                <li class="submenu"> <a href="#"><i class="fa-regular fa-circle-check"></i> <span> Đánh giá </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{route('admin.danhgia.danhsach')}}"> Danh sách đánh giá của chuyên gia tổng</a></li>
                        <li><a href=""> Đánh giá của chuyên gia - nông nghiệp</a></li>
                        <li><a href=""> Đánh giá của chuyên gia - công nghiệp</a></li>
                        <li><a href=""> Đánh giá của chuyên gia - thương mại và dịc vụ</a></li>
                        <li><a href=""> Đánh giá của chuyên gia - khác</a></li>
                    </ul>
                </li>

                <li class="list-divider"></li>

                <li class="menu-title mt-3"> <span>Quản lý người dùng</span> </li>
                <li class="submenu"> <a href="#"><i class="fa-regular fa-user"></i><span> Tài khoản </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{route('admin.taikhoan.danhsach')}}"> Danh sách tài khoản tổng</a></li>
                        <li><a href=""> Tài khoản - hiệp hội doanh nghiệp cấp</a></li>
                    </ul>
                </li>

                <li> <a href="{{route('admin.vaitro.danhsach')}}"><i class="fa-regular fa-circle-user"></i> <span>Vai trò tài khoản</span></a> </li>

                <li class="list-divider"></li>

                <li class="menu-title mt-3"> <span>Quản lý tin tức</span> </li>

                <li class="submenu"> <a href="#"><i class="fa-regular fa-newspaper"></i> <span> Tin tức </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{route('admin.tintuc.danhsach')}}"> Danh sách tin tức </a></li>
                        <li><a href="{{route('admin.tintuc.danhsachnongnghiep')}}"> Tin tức nông nghiệp </a></li>
                        <li><a href="{{route('admin.tintuc.danhsachcongnghiep')}}"> Tin tức công nghiệp </a></li>
                        <li><a href="{{route('admin.tintuc.danhsachthuongmaidichvu')}}"> Tin tức thương mại & dịch vụ </a></li>
                    </ul>
                </li>

                <li class="list-divider"></li>

                <li class="menu-title mt-3"> <span>Quản lý hệ thống</span> </li>

                <li class="submenu"> <a href="#"><i class="fa-solid fa-pen-to-square"></i><span> Trang chủ </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{route('admin.tintuc.danhsach')}}"> Danh sách tin tức </a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
