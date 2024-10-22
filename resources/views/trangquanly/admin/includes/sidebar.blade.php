{{-- Sidebar bên phải --}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active"> <a href="{{ route('admin.home') }}"><i class="fas fa-tachometer-alt"></i> <span>Bảng
                            điều khiển</span></a> </li>
                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý chung</span> </li>
                <li> <a href="{{ route('admin.thongkechung.danhsach') }}"><i class="fa-solid fa-list-check"></i><span> Quản lý chung</span></a>
                </li>
                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý doanh nghiệp</span> </li>
                <li> <a href="{{ route('admin.doanhnghiep.thongkedn') }}"><i class="fa-solid fa-chart-column"></i> <span>Thống kê doanh nghiệp</span></a>
                </li>
                <li> <a href="{{ route('admin.doanhnghiep.dsdoanhnghiep') }}"><i class="fa-regular fa-building"></i> <span>Danh sách doanh nghiệp</span></a>
                </li>
                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý khảo sát</span> </li>
                <li> <a href="{{ route('admin.khaosat.danhsach') }}"><i class="fa-solid fa-square-poll-horizontal"></i> <span> Khảo
                            sát </span></a>
                </li>
                <li> <a href="{{ route('admin.thongke.doanhnghiep') }}"><i class="fa-solid fa-ranking-star"></i> <span>
                            Thống kê thế mạnh</span></a>
                </li>

                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý chiến lược</span> </li>

                <li> <a href="{{ route('admin.chienluoc.danhsach') }}"><i class="fa-solid fa-list-ol"></i> <span>Danh
                            sách chiến lược</span></a> </li>
                <li> <a href="{{ route('admin.chienluocchitiet.danhsach') }}"><i class="fa-solid fa-bars-staggered"></i>
                        <span>Chiến
                            lược chi tiết</span></a> </li>
                <li> <a href="{{ route('chung.mucdo.danhsach') }}"><i class="fa-solid fa-arrow-trend-up"></i> <span>Mức
                            độ
                            chuyển đổi số</span></a> </li>

                <li> <a href="{{ route('chung.trucot.danhsach') }}"><i class="fa-solid fa-recycle"></i></i><span>Trụ cột
                            chuyển đổi số</span></a> </li>

                <li class="submenu"> <a href="#"><i class="fa-regular fa-circle-question"></i> <span> Bộ câu hỏi
                            khảo sát</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a data-toggle="modal" data-target="#nhap_modal" href="#"> Thêm bộ câu hỏi </a></li>
                        <li><a href="{{ route('chung.bocauhoi.danhsachphieu1') }}"> Phiếu 1 </a></li>
                        <li><a href="{{ route('chung.bocauhoi.danhsachphieu2') }}"> Phiếu 2 </a></li>
                        <li><a href="{{ route('chung.bocauhoi.danhsachphieu3') }}"> Phiếu 3 </a></li>
                        <li><a href="{{ route('chung.bocauhoi.danhsachphieu4') }}"> Phiếu 4 </a></li>
                    </ul>
                </li>

                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý đánh giá</span> </li>
                <li> <a href="{{ route('admin.danhgia.danhsach') }}"><i class="fa-regular fa-circle-check"></i> <span>
                            Đánh giá - đề xuất</span></a>
                </li>

                {{-- <li> <a href="#"><i class="fa-solid fa-recycle"></i></i><span>Chiến lược đề xuât</span></a> </li>
                --}}

                <li class="list-divider"></li>

                <li class="menu-title mt-3"> <span>Quản lý người dùng</span> </li>
                <li> <a href="{{ route('admin.taikhoan.danhsach') }}"><i class="fa-regular fa-user"></i>
                        <span>Danh sách tài khoản</span></a> </li>

                {{-- <li class="submenu"> <a href="#"><i class="fa-regular fa-user"></i><span> Tài khoản </span> <span
                            class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('admin.taikhoan.danhsach') }}"> Danh sách tài khoản tổng</a></li>
                        <li><a href=""> Tài khoản - hiệp hội doanh nghiệp cấp</a></li>
                    </ul>
                </li> --}}
                <li class="submenu"> <a href="#"><i class="fa-brands fa-nfc-symbol"></i> <span> Lĩnh vực </span>
                        <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('admin.linhvuc.danhsach') }}"> Danh sách lĩnh vực </a></li>
                        <li><a href="{{ route('admin.loaihinhdoanhnghiep.danhsach') }}"> Danh sách loại hình doanh
                                nghiệp </a></li>
                    </ul>
                </li>

                <li> <a href="{{ route('admin.vaitro.danhsach') }}"><i class="fa-regular fa-circle-user"></i>
                        <span>Vai trò tài khoản</span></a> </li>

                <li class="list-divider"></li>

                <li class="menu-title mt-3"> <span>Quản lý cổng thông tin</span> </li>
                <li><a href="{{ route('admin.tintuc.danhsach') }}"><i class="fa-regular fa-newspaper"></i>
                        <span>Danh sách tin tức</span></a>
                </li>
                <li><a href="{{ route('admin.banner.danhsach') }}"><i class='bx bxs-carousel'></i>
                        <span>Quản lý banner</span></a>
                </li>
                <li><a href="{{ route('admin.video.danhsach') }}"><i class='bx bxs-videos'></i>
                        <span>Quản lý video</span></a>
                </li>
                <li><a href="{{ route('admin.binhluan.danhsach') }}"><i class='bx bx-message-square-dots'></i>
                        <span>Quản lý Bình luận</span></a>
                </li>
                <li><a href="{{ route('admin.thuvien.danhsach') }}"><i class='bx bx-library'></i>
                        <span>Quản lý Thư Viện</span></a>
                </li>

                {{-- <li class="submenu"> <a href="#"><i class="fa-regular fa-newspaper"></i> <span> Tin tức </span>
                        <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('admin.tintuc.danhsach') }}"> Danh sách tin tức </a></li>
                        <li><a href="{{ route('admin.tintuc.danhsachnongnghiep') }}"> Tin tức nông nghiệp </a></li>
                        <li><a href="{{ route('admin.tintuc.danhsachcongnghiep') }}"> Tin tức công nghiệp </a></li>
                        <li><a href="{{ route('admin.tintuc.danhsachthuongmaidichvu') }}"> Tin tức thương mại & dịch
                                vụ
                            </a></li>
                    </ul>
                </li> --}}

                {{-- <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý hệ thống</span> </li> --}}

                {{-- <li class="submenu"> <a href="#"><i class="fa-solid fa-pen-to-square"></i><span> Trang chủ
                        </span>
                        <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('admin.tintuc.danhsach') }}"> Danh sách tin tức </a></li>
                    </ul>
                </li> --}}

            </ul>
        </div>
    </div>
</div>

{{-- Model thêm excel - bộ câu hỏi --}}
<div id="nhap_modal" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('chung.bocauhoi.nhap') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <h3 class="delete_class">Chọn file excel bộ câu hỏi chuyển đổi số!</h3>
                    <hr>
                    <div class="m-t-20">
                        <input class="form-control mb-3" type="file" name="excel_file">
                        <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                        <button type="submit" class="btn btn-danger">Thêm bộ câu hỏi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Model thêm excel - bộ câu hỏi --}}
