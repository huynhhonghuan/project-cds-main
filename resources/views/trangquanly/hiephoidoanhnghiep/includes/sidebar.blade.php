{{-- Sidebar bên phải --}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active"> <a href="{{ route('hiephoidoanhnghiep.home') }}"><i class="fas fa-tachometer-alt"></i>
                        <span>Bảng điều khiển</span></a> </li>

                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý doanh nghiệp</span> </li>
                <li> <a href="{{ route('hiephoidoanhnghiep.khaosat.danhsach') }}"><i class="fa-regular fa-building"></i>
                        <span>Khảo sát</span></a> </li>

                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý chuyên gia</span> </li>
                <li> <a href="{{ route('hiephoidoanhnghiep.danhgia.danhsach') }}"><i
                            class="fa-regular fa-circle-check"></i> <span> Đánh giá - đề xuất</a></li>
                {{-- <li> <a href=""><i class="fa-solid fa-recycle"></i></i><span>Chiến lược đề xuât</span></a> </li> --}}

                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý chiến lược</span> </li>
                <li> <a href="{{ route('hiephoidoanhnghiep.chienluoc.danhsach') }}"><i class="fa-solid fa-list-ol"></i>
                        <span>Danh
                            sách chiến lược</span></a> </li>

                <li> <a href="{{ route('chung.mucdo.danhsach') }}"><i class="fa-solid fa-list-ol"></i> <span>Mức độ
                            chuyển đổi số</span></a> </li>

                <li> <a href="{{ route('chung.trucot.danhsach') }}"><i class="fa-solid fa-recycle"></i></i><span>Trụ cột
                            chuyển đổi số</span></a> </li>

                <li class="submenu"> <a href="#"><i class="fa-regular fa-circle-question"></i> <span> Bộ câu hỏi
                            khảo sát</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('chung.bocauhoi.danhsachphieu1') }}"> Phiếu 1 </a></li>
                        <li><a href="{{ route('chung.bocauhoi.danhsachphieu2') }}"> Phiếu 2 </a></li>
                        <li><a href="{{ route('chung.bocauhoi.danhsachphieu3') }}"> Phiếu 3 </a></li>
                        <li><a href="{{ route('chung.bocauhoi.danhsachphieu4') }}"> Phiếu 4 </a></li>
                    </ul>
                </li>

                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý người dùng</span> </li>
                <li> <a href="{{ route('hiephoidoanhnghiep.taikhoan.danhsach') }}"><i class="fa-regular fa-user"></i>
                        <span>Danh sách tài khoản</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
