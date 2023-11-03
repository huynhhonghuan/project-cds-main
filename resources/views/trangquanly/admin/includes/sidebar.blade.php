{{--Sidebar bên phải--}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active"> <a href="{{route('admin.home')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                <li class="list-divider"></li>
                <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Tin tức </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{route('admin.tintuc.danhsach')}}"> Danh sách tin tức </a></li>
                        <li><a href="{{route('admin.tintuc.danhsachnongnghiep')}}"> Tin tức nông nghiệp </a></li>
                        <li><a href="{{route('admin.tintuc.danhsachcongnghiep')}}"> Tin tức công nghiệp </a></li>
                        <li><a href="{{route('admin.tintuc.danhsachthuongmaidichvu')}}"> Tin tức thương mại & dịch vụ </a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
