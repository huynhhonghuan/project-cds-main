{{-- Sidebar bên phải --}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active"> <a href="{{ route('chuyengia.home') }}"><i class="fas fa-tachometer-alt"></i>
                        <span>Bảng điều
                            khiển</span></a> </li>
                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý đánh giá và đề xuất</span> </li>
                <li> <a href="{{ route('chuyengia.danhgia.danhsach') }}"><i class="fa-regular fa-square-check"></i>
                        <span>Danh sách đánh giá</span></a> </li>
                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý chiến lược</span> </li>
                <li> <a href="{{ route('chuyengia.chienluoc.danhsach') }}"><i class="fa-solid fa-list"></i><span>Danh
                            sách chiến lược</span></a> </li>
                <li> <a href="{{ route('chuyengia.chienluocchitiet.danhsach') }}"><i
                            class="fa-solid fa-bars-staggered"></i>
                        <span>Chiến
                            lược chi tiết</span></a> </li>
                <li> <a href="{{ route('chuyengia.chienluoc.danhsachdexuat') }}"><i
                            class="fa-solid fa-diagram-project"></i> <span>Chiến lược đề
                            xuất</span></a> </li>

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
                <li class="menu-title mt-3"> <span>Thông tin doanh nghiệp</span> </li>
                <li> <a href="{{ route('chuyengia.doanhnghiep.danhsach', Auth::user()->id) }}"><i class="fa-regular fa-building"></i>
                        <span>Danh sách doanh
                            nghiệp</span>
                </a> </li>
            </ul>
        </div>
    </div>
</div>
