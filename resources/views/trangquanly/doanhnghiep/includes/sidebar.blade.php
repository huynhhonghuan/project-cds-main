{{-- Sidebar bên phải --}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active"> <a href="{{ route('doanhnghiep.home') }}"><i class="fas fa-tachometer-alt"></i>
                        <span>Bảng điều khiển</span></a> </li>

                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Quản lý khảo sát</span> </li>

                {{-- chạy foreach để hiện ra số lần khảo sát cho từng lần khảo sát --}}
                <li class="submenu"> <a href="#"><i class="fa-solid fa-list-ol"></i> <span> Khảo sát </span> <span
                            class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        {{-- <li><a href="{{ route('doanhnghiep.khaosat.khoitao') }}">  </a></li> --}}
                        <li><a data-toggle="modal" data-target="#khoitaokhaosat_modal" href="#"> Khởi tạo khảo
                                sát</a></li>
                        @foreach (Auth::user()->getdoanhnghiep->getkhaosat as $key => $item)
                            <li><a
                                    href="{{ route('doanhnghiep.khaosat.xem', ['id' => $item->id, 'solankhaosat' => $key + 1]) }}">
                                    Khảo sát lần
                                    {{ $key + 1 }}</a></li>
                        @endforeach
                    </ul>
                </li>

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
                <li class="menu-title mt-3"> <span>Quản lý chiến lược</span> </li>
                {{-- chạy foreach để hiện ra chiến lược cho từng lần khảo sát --}}
                <li class="submenu"> <a href="#"><i class="fa-solid fa-chart-line"></i> <span> Chiến lược </span>
                        <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        @foreach (Auth::user()->getdoanhnghiep->getkhaosat as $key => $item)
                            @if ($item->getchienluoc != null)
                                <li><a href="{{ route('doanhnghiep.chienluoc.xem', ['id' => $item->id]) }}">
                                        Chiến lược khảo sát lần
                                        {{ $key + 1 }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>

                <li class="list-divider"></li>
                <li class="menu-title mt-3"> <span>Đánh giá từ chuyên gia</span> </li>

                {{-- chạy foreach để hiện ra đánh giá từ chuyên gia cho từng lần khảo sát --}}
                <li class="submenu"> <a href="#"><i class="fa-regular fa-comments"></i> <span> Đánh giá và góp ý
                        </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        @foreach (Auth::user()->getdoanhnghiep->getkhaosat as $key => $item)
                            @if ($item != null)
                                <li><a href="{{ route('doanhnghiep.danhgia.xem', ['id' => $item->id]) }}">
                                        Đánh giá của khảo sát lần
                                        {{ $key + 1 }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class=""> <a href="{{ route('doanhnghiep.hoithoai', Auth::user()->id) }}"><i class='bx bx-conversation'></i>
                    <span>Hỏi Đáp Chuyên Gia</span></a> </li>
            </ul>
        </div>
    </div>
</div>

<div id="khoitaokhaosat_modal" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('doanhnghiep.khaosat.khoitao') }}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <h3 class="delete_class">Khởi tạo khảo sát!</h3>
                    <hr>
                    <div class="m-t-20">
                        {{-- <input class="form-control mb-3" type="file" name="excel_file"> --}}
                        <a href="#" class="btn btn-white" data-dismiss="modal">Đóng</a>
                        <button type="submit" class="btn btn-danger">Khởi tạo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
