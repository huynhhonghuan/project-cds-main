<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

//Dùng chung cho các quyền tài khoản và xử lý bên trong
use App\Http\Controllers\Chung\Bocauhoi\BocauhoiController;
use App\Http\Controllers\Chung\Trucot\TrucotController;
use App\Http\Controllers\Chung\Mucdo\MucdoController;

//Chức năng dành cho quản trị viên
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Chienluoc\ChienluocController;
use App\Http\Controllers\Admin\Chienluocchitiet\ChienluocchitietController;
use App\Http\Controllers\Admin\Danhgia\DanhgiaController;
use App\Http\Controllers\Admin\Khaosat\KhaosatController;
use App\Http\Controllers\Admin\Linhvuc\LinhvucController;
use App\Http\Controllers\Admin\Loaihinhdoanhnghiep\LoaihinhdoanhnghiepController;
use App\Http\Controllers\Admin\Taikhoan\TaikhoanController;
use App\Http\Controllers\Admin\Taikhoan\VaitroController;
use App\Http\Controllers\Admin\Tintuc\TintucController;
use App\Http\Controllers\Frontend\BannerController;


//Chức năng dùng cho doanh nghiệp
use App\Http\Controllers\Doanhnghiep\DoanhnghiepController;
use App\Http\Controllers\Doanhnghiep\DanhgiacController as DoanhnghiepDanhgiacController;
use App\Http\Controllers\Doanhnghiep\KhaosatController as DoanhnghiepKhaosatController;


//Chức năng dành cho hiệp hội doanh nghiệp
use App\Http\Controllers\Hiephoidoanhnghiep\HiephoidoanhnghiepController;
use App\Http\Controllers\Hiephoidoanhnghiep\Taikhoan\TaikhoanController as TaikhoanController_hhdn;
use App\Http\Controllers\Hiephoidoanhnghiep\Chienluoc\ChienluocController as ChienluocChienluocController;
use App\Http\Controllers\Hiephoidoanhnghiep\Chienluocchitiet\ChienluocchitietController as ChienluocchitietChienluocchitietController;
use App\Http\Controllers\Hiephoidoanhnghiep\Danhgia\DanhgiaController as HiephoidoanhnghiepDanhgiaDanhgiaController;
use App\Http\Controllers\Hiephoidoanhnghiep\Khaosat\KhaosatController as KhaosatKhaosatController;

//Chức năng dành cho chuyên gia
use App\Http\Controllers\Chuyengia\ChuyengiaController;
use App\Http\Controllers\Chuyengia\Chienluoc\ChienluocController as ChienluocController_cg;
use App\Http\Controllers\Chuyengia\Chienluocchitiet\ChienluocchitietController as ChienluocchitietController_cg;
use App\Http\Controllers\Chuyengia\Danhgia\DanhgiaController as DanhgiaDanhgiaController;
use App\Http\Controllers\Chuyengia\Thongtin\DoanhnghiepController as ThongtinDoanhnghiepController;

//Chức năng dành cho cộng tác viên
use App\Http\Controllers\Congtacvien\CongtacvienController;
use App\Http\Controllers\Doanhnghiep\ChienluocController as DoanhnghiepChienluocController;
use Livewire\Livewire;


//Hiển thị lên giao diện màn hình chính
use App\Http\Controllers\Frontend\TrangtinController;
use App\Http\Controllers\Frontend\ThuvienController;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\Frontend\ThongtinCDSController;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\Frontend\ThuvienController;


function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

// cập nhật lại đường dẫn của livewire theo project
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('project-cds-main/public/livewire/update/', $handle);
});

Route::get('/demo', function () {
    return view('demo');
});

//-------------------------------------Khởi tạo home của trang chủ----------------------------------//
Route::get('/', function () {
    return view('trangchu.home');
})->name('home');


//Đăng kí Auth
Auth::routes();

//-------------------------------------Login--------------------------------------------//
Route::get('/login', [LoginController::class, 'login'])->name('login');
//-------------------------------------Login xử lý--------------------------------------------//
Route::post('/login', [LoginController::class, 'authenticate']);
//-------------------------------------Logout--------------------------------------------//
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//-------------------------------------Đăng ký doanh nghiệp--------------------------------------------//
Route::get('/registerdoanhnghiep', [RegisterController::class, 'registerdoanhnghiep'])->name('registerdoanhnghiep');
//-------------------------------------Đăng ký doanh nghiệp xử lý--------------------------------------------//
Route::post('/registerdoanhnghiep', [RegisterController::class, 'storeUserdoanhnghiep'])->name('registerdoanhnghiep');

//-------------------------------------Chuyên gia--------------------------------------------//
Route::group(['prefix' => 'chung', 'middleware' => ['auth'], 'as' => 'chung.'], function () {

    //-------------------------------------Bộ câu chuyển đổi số--------------------------------------------//
    Route::group(['prefix' => 'bocauhoi', 'as' => 'bocauhoi.'], function () {
        //Chỉ có quản trị viên mới có thể nhập và xuất bằng excel
        Route::post('nhap', [BocauhoiController::class, 'postnhap'])->name('nhap'); //nhập bộ câu hỏi từ excel 1 - 2 - 3
        Route::get('xuat', [BocauhoiController::class, 'getxuat'])->name('xuat'); //nhập bộ câu hỏi từ excel 1 - 2 - 3

        //Dành cho quyền doanh nghiệp, hiệp hội doanh nghiệp, chuyên gia để xem phiếu đánh giá chuyển đổi số
        Route::get('danhsachphieu1', [BocauhoiController::class, 'getdanhsachphieu1'])->name('danhsachphieu1');
        Route::get('danhsachphieu2', [BocauhoiController::class, 'getdanhsachphieu2'])->name('danhsachphieu2');
        Route::get('danhsachphieu3', [BocauhoiController::class, 'getdanhsachphieu3'])->name('danhsachphieu3');
        Route::get('danhsachphieu4', [BocauhoiController::class, 'getdanhsachphieu4'])->name('danhsachphieu4');
    });

    //-------------------------------------Mức độ chuyển đổi số--------------------------------------------//
    Route::group(['prefix' => 'mucdo', 'as' => 'mucdo.'], function () {
        Route::get('danhsach', [MucdoController::class, 'getdanhsach'])->name('danhsach');
    });

    //-------------------------------------Trụ cột chuyển đổi số--------------------------------------------//
    Route::group(['prefix' => 'trucot', 'as' => 'trucot.'], function () {
        Route::get('danhsach', [TrucotController::class, 'getdanhsach'])->name('danhsach');
    });
});

//-------------------------------------Admin--------------------------------------------//
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check_admin'], 'as' => 'admin.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [AdminController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');

    Route::post('doimatkhau/{id}', [AdminController::class, 'doimatkhau'])->name('doimatkhau');

    //-------------------------------------Tin tức--------------------------------------------//
    Route::group(['prefix' => 'tintuc', 'as' => 'tintuc.'], function () {
        Route::get('danhsach', [TintucController::class, 'getdanhsach'])->name('danhsach');
        Route::get('danhsachnongnghiep', [TintucController::class, 'getdanhsachnongnghiep'])->name('danhsachnongnghiep');
        Route::get('danhsachcongnghiep', [TintucController::class, 'getdanhsachcongnghiep'])->name('danhsachcongnghiep');
        Route::get('danhsachthuongmaidichvu', [TintucController::class, 'getdanhsachthuongmaidichvu'])->name('danhsachthuongmaidichvu');

        Route::get('them', [TintucController::class, 'getthem'])->name('them');
        Route::post('them', [TintucController::class, 'postthem'])->name('them');
        Route::get('sua/{id}', [TintucController::class, 'getsua'])->name('sua');
        Route::post('sua/{id}', [TintucController::class, 'postsua'])->name('sua');
        Route::post('xoa', [TintucController::class, 'postxoa'])->name('xoa');
        Route::get('duyet/{id}', [TintucController::class, 'getduyet'])->name('duyet');
    });
    //-------------------------------------Banner-------------------------------------------------//
    Route::group(['prefix' => 'banner', 'as' => 'banner.'], function () {
        Route::get('danhsach', [BannerController::class, 'getdanhsach'])->name('danhsach');
        Route::get('them', [BannerController::class, 'getthem'])->name('them');
        Route::post('them', [BannerController::class, 'postthem'])->name('them');
        Route::get('sua/{id}', [BannerController::class, 'getsua'])->name('sua');
        Route::post('sua/{id}', [BannerController::class, 'postsua'])->name('sua');
        Route::post('xoa', [BannerController::class, 'postxoa'])->name('xoa');
        Route::get('duyet/{id}', [BannerController::class, 'getduyet'])->name('duyet');
    });
    //------------------------------------- Video ----------------------------------------------//
    Route::group(['prefix' => 'video', 'as' => 'video.'], function () {
        Route::get('danhsach', [VideoController::class, 'getdanhsach'])->name('danhsach');
        Route::get('them', [VideoController::class, 'getthem'])->name('them');
        Route::post('them', [VideoController::class, 'postthem'])->name('them');
        Route::get('sua/{id}', [VideoController::class, 'getsua'])->name('sua');
        Route::post('sua/{id}', [VideoController::class, 'postsua'])->name('sua');
        Route::post('xoa', [VideoController::class, 'postxoa'])->name('xoa');
        Route::get('duyet/{id}', [VideoController::class, 'getduyet'])->name('duyet');
    });
    //------------------------------------- Thư Viện ----------------------------------------------//
    Route::group(['prefix' => 'thuvien', 'as' => 'thuvien.'], function () {
        Route::get('danhsach', [ThuvienController::class, 'getdanhsach'])->name('danhsach');
        Route::get('them', [ThuvienController::class, 'getthem'])->name('them');
        Route::post('them', [ThuvienController::class, 'postthem'])->name('them');
        // Route::get('sua/{id}', [VideoController::class, 'getsua'])->name('sua');
        // Route::post('sua/{id}', [VideoController::class, 'postsua'])->name('sua');
        // Route::post('xoa', [VideoController::class, 'postxoa'])->name('xoa');
        Route::get('/download/{file}', [ThuvienController::class, 'download']);
    });


    //------------------------------------------------------------------------------------------//
    //-------------------------------------Tài khoản--------------------------------------------//
    Route::group(['prefix' => 'taikhoan', 'as' => 'taikhoan.'], function () {
        Route::get('danhsach', [TaikhoanController::class, 'getdanhsach'])->name('danhsach');

        Route::get('xem/{id}', [TaikhoanController::class, 'getxem'])->name('xem');
        Route::get('them', [TaikhoanController::class, 'getthem'])->name('them');
        Route::post('them/{loai}', [TaikhoanController::class, 'postthem'])->name('them_loai'); //loai: dùng để biết thêm người dùng loại nào
        Route::get('sua/{id}', [TaikhoanController::class, 'getsua'])->name('sua');
        Route::post('sua/{loai}/{id}', [TaikhoanController::class, 'postsua'])->name('sua_loai');
        Route::post('xoa', [TaikhoanController::class, 'postxoa'])->name('xoa');
        Route::post('nguoiduyet', [TaikhoanController::class, 'postnguoiduyet'])->name('nguoiduyet');
        Route::post('trangthai', [TaikhoanController::class, 'posttrangthai'])->name('trangthai');

        //nhập excel thông tin tài khoản
        Route::post('nhapdoanhnghiep', [TaikhoanController::class, 'postnhapdoanhnghiep'])->name('nhapdoanhnghiep');
        Route::post('nhapchuyengia', [TaikhoanController::class, 'postnhapchuyengia'])->name('nhapchuyengia');
        Route::post('nhaphiephoidoanhnghiep', [TaikhoanController::class, 'postnhaphiephoidoanhnghiep'])->name('nhaphiephoidoanhnghiep');
        Route::post('nhapcongtacvien', [TaikhoanController::class, 'postnhapcongtacvien'])->name('nhapcongtacvien');

        //xuất excel thông tin tài khoản
        Route::get('xuatdoanhnghiep', [TaikhoanController::class, 'getxuatdoanhnghiep'])->name('xuatdoanhnghiep');
        Route::get('xuatchuyengia', [TaikhoanController::class, 'getxuatchuyengia'])->name('xuatchuyengia');
        Route::get('xuathiephoidoanhnghiep', [TaikhoanController::class, 'getxuathiephoidoanhnghiep'])->name('xuathiephoidoanhnghiep');
        Route::get('xuatcongtacvien', [TaikhoanController::class, 'getxuatcongtacvien'])->name('xuatcongtacvien');
    });

    //-------------------------------------Vai trò--------------------------------------------//
    Route::group(['prefix' => 'vaitro', 'as' => 'vaitro.'], function () {
        Route::get('danhsach', [VaitroController::class, 'getdanhsach'])->name('danhsach');

        Route::get('them', [VaitroController::class, 'getthem'])->name('them');
        Route::post('them/{loai}', [VaitroController::class, 'postthem'])->name('them');
        Route::get('sua/{id}', [VaitroController::class, 'getsua'])->name('sua');
        Route::post('sua/{id}', [VaitroController::class, 'postsua'])->name('sua');
        Route::post('xoa', [VaitroController::class, 'postxoa'])->name('xoa');
        Route::post('duyet', [VaitroController::class, 'postduyet'])->name('duyet');
    });

    //-------------------------------------Lĩnh vực--------------------------------------------//
    Route::group(['prefix' => 'linhvuc', 'as' => 'linhvuc.'], function () {
        Route::get('danhsach', [LinhvucController::class, 'getdanhsach'])->name('danhsach');

        Route::get('them', [LinhvucController::class, 'getthem'])->name('them');
        Route::post('them/{loai}', [LinhvucController::class, 'postthem'])->name('them');
        Route::get('sua/{id}', [LinhvucController::class, 'getsua'])->name('sua');
        Route::post('sua/{id}', [LinhvucController::class, 'postsua'])->name('sua');
        Route::post('xoa', [LinhvucController::class, 'postxoa'])->name('xoa');
        Route::post('duyet', [LinhvucController::class, 'postduyet'])->name('duyet');
    });

    //-------------------------------------Loại hình hoạt động--------------------------------------------//
    Route::group(['prefix' => 'loaihinhdoanhnghiep', 'as' => 'loaihinhdoanhnghiep.'], function () {
        Route::get('danhsach', [LoaihinhdoanhnghiepController::class, 'getdanhsach'])->name('danhsach');

        Route::get('them', [LoaihinhdoanhnghiepController::class, 'getthem'])->name('them');
        Route::post('them', [LoaihinhdoanhnghiepController::class, 'postthem'])->name('them');
        Route::get('sua/{id}', [LoaihinhdoanhnghiepController::class, 'getsua'])->name('sua');
        Route::post('sua/{id}', [LoaihinhdoanhnghiepController::class, 'postsua'])->name('sua');
        Route::post('xoa', [LoaihinhdoanhnghiepController::class, 'postxoa'])->name('xoa');
        Route::post('duyet', [LoaihinhdoanhnghiepController::class, 'postduyet'])->name('duyet');
    });

    //-------------------------------------Danh sách chiến lược--------------------------------------------//
    Route::group(['prefix' => 'chienluoc', 'as' => 'chienluoc.'], function () {
        Route::get('danhsach', [ChienluocController::class, 'getdanhsach'])->name('danhsach');

        Route::get('xem/{id}', [ChienluocController::class, 'getxem'])->name('xem');
        Route::get('them', [ChienluocController::class, 'getthem'])->name('them');
        Route::post('them', [ChienluocController::class, 'postthem'])->name('them');
        Route::get('sua/{id}', [ChienluocController::class, 'getsua'])->name('sua');
        Route::post('sua/{id}', [ChienluocController::class, 'postsua'])->name('sua');
        Route::post('xoa', [ChienluocController::class, 'postxoa'])->name('xoa');
        // Route::post('duyet', [DanhgiaController::class, 'postduyet'])->name('duyet');
    });

    //-------------------------------------Danh sách chiến lược chi tiết--------------------------------------------//
    Route::group(['prefix' => 'chienluocchitiet', 'as' => 'chienluocchitiet.'], function () {
        Route::get('danhsach', [ChienluocchitietController::class, 'getdanhsach'])->name('danhsach');

        Route::get('xem/{id}', [ChienluocchitietController::class, 'getxem'])->name('xem');
        // Route::get('them', [ChienluocController::class, 'getthem'])->name('them');
        Route::post('them', [ChienluocchitietController::class, 'postthem'])->name('them');
        // Route::get('sua/{id}', [ChienluocController::class, 'getsua'])->name('sua');
        Route::post('sua', [ChienluocchitietController::class, 'postsua'])->name('sua');
        // Route::post('xoa', [ChienluocController::class, 'postxoa'])->name('xoa');
        // Route::post('duyet', [DanhgiaController::class, 'postduyet'])->name('duyet');
    });

    //-------------------------------------Đánh giá của chuyên gia--------------------------------------------//
    Route::group(['prefix' => 'danhgia', 'as' => 'danhgia.'], function () {
        Route::get('danhsach', [DanhgiaController::class, 'getdanhsach'])->name('danhsach');
        Route::get('danhsachnongnghiep', [DanhgiaController::class, 'getdanhsachnongnghiep'])->name('danhsachnongnghiep');
        Route::get('danhsachcongnghiep', [DanhgiaController::class, 'getdanhsachcongnghiep'])->name('danhsachcongnghiep');
        Route::get('danhsachthuongmaidichvu', [DanhgiaController::class, 'getdanhsachthuongmaidichvu'])->name('danhsachthuongmaidichvu');

        Route::get('them', [DanhgiaController::class, 'getthem'])->name('them');
        Route::post('them/{loai}', [DanhgiaController::class, 'postthem'])->name('them');
        Route::get('sua/{id}', [DanhgiaController::class, 'getsua'])->name('sua');
        Route::post('sua/{id}', [DanhgiaController::class, 'postsua'])->name('sua');
        Route::post('xoa', [DanhgiaController::class, 'postxoa'])->name('xoa');
        Route::post('duyet', [DanhgiaController::class, 'postduyet'])->name('duyet');
    });

    //-------------------------------------Khảo sát của doanh nghiệp--------------------------------------------//
    Route::group(['prefix' => 'khaosat', 'as' => 'khaosat.'], function () {
        Route::get('danhsach', [KhaosatController::class, 'getdanhsach'])->name('danhsach');
        Route::post('nhap', [KhaosatController::class, 'postnhap'])->name('nhap');

        Route::get('xem/{id}', [KhaosatController::class, 'getxem'])->name('xem');
        Route::get('them', [KhaosatController::class, 'getthem'])->name('them');
        Route::post('them', [KhaosatController::class, 'postthem'])->name('them');
        Route::get('sua/{id}', [KhaosatController::class, 'getsua'])->name('sua');
        Route::post('sua/{id}', [KhaosatController::class, 'postsua'])->name('sua');
        Route::post('xoa', [KhaosatController::class, 'postxoa'])->name('xoa');
        // Route::post('duyet', [DanhgiaController::class, 'postduyet'])->name('duyet');
    });
});

//-------------------------------------Doanh nghiệp--------------------------------------------//
Route::group(['prefix' => 'doanhnghiep', 'middleware' => ['auth', 'check_doanhnghiep'], 'as' => 'doanhnghiep.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [DoanhnghiepController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [DoanhnghiepController::class, 'profile'])->name('profile');

    Route::post('doimatkhau/{id}', [DoanhnghiepController::class, 'doimatkhau'])->name('doimatkhau');

    //-------------------------------------Khảo sát của doanh nghiệp--------------------------------------------//
    Route::group(['prefix' => 'khaosat', 'as' => 'khaosat.'], function () {
        Route::get('khoitao', [DoanhnghiepKhaosatController::class, 'getkhoitao'])->name('khoitao');
        Route::get('xem/{id}/{solankhaosat}', [DoanhnghiepKhaosatController::class, 'getxem'])->name('xem');
        // Route::get('xem', [DoanhnghiepKhaosatController::class, 'getxem'])->name('xem');
        Route::get('phieu1/{id}', [DoanhnghiepKhaosatController::class, 'getphieu1'])->name('phieu1');
        Route::get('phieu2/{id}', [DoanhnghiepKhaosatController::class, 'getphieu2'])->name('phieu2');
        Route::get('phieu3/{id}', [DoanhnghiepKhaosatController::class, 'getphieu3'])->name('phieu3');
        Route::get('phieu4/{id}', [DoanhnghiepKhaosatController::class, 'getphieu4'])->name('phieu4');
        Route::post('phieu4/{id}', [DoanhnghiepKhaosatController::class, 'postphieu4'])->name('phieu4');

        Route::post('xoa', [DoanhnghiepKhaosatController::class, 'postxoa'])->name('xoa');
        Route::get('hoanthanh/{id}', [DoanhnghiepKhaosatController::class, 'gethoanthanh'])->name('hoanthanh');
    });
    Route::group(['prefix' => 'chienluoc', 'as' => 'chienluoc.'], function () {
        Route::get('xem/{id}', [DoanhnghiepChienluocController::class, 'getxem'])->name('xem');
    });

    Route::group(['prefix' => 'danhgia', 'as' => 'danhgia.'], function () {
        Route::get('xem/{id}', [DoanhnghiepDanhgiacController::class, 'getxem'])->name('xem');
    });
});

//-------------------------------------Chuyên gia--------------------------------------------//
Route::group(['prefix' => 'chuyengia', 'middleware' => ['auth', 'check_chuyengia'], 'as' => 'chuyengia.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [ChuyengiaController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [ChuyengiaController::class, 'profile'])->name('profile');

    Route::post('doimatkhau/{id}', [ChuyengiaController::class, 'doimatkhau'])->name('doimatkhau');

    //-------------------------------------Danh sách chiến lược--------------------------------------------//
    Route::group(['prefix' => 'chienluoc', 'as' => 'chienluoc.'], function () {
        Route::get('danhsach', [ChienluocController_cg::class, 'getdanhsach'])->name('danhsach');

        Route::get('danhsachdexuat', [ChienluocController_cg::class, 'getdanhsachdexuat'])->name('danhsachdexuat');

        Route::get('xem/{id}', [ChienluocController_cg::class, 'getxem'])->name('xem');
        Route::get('them', [ChienluocController_cg::class, 'getthem'])->name('them');
        Route::post('them', [ChienluocController_cg::class, 'postthem'])->name('them');
        Route::get('sua/{id}', [ChienluocController_cg::class, 'getsua'])->name('sua');
        Route::post('sua/{id}', [ChienluocController_cg::class, 'postsua'])->name('sua');
        Route::post('xoa', [ChienluocController_cg::class, 'postxoa'])->name('xoa');
        // Route::post('duyet', [DanhgiaController::class, 'postduyet'])->name('duyet');
    });

    //-------------------------------------Danh sách chiến lược chi tiết--------------------------------------------//
    Route::group(['prefix' => 'chienluocchitiet', 'as' => 'chienluocchitiet.'], function () {
        Route::get('danhsach', [ChienluocchitietController_cg::class, 'getdanhsach'])->name('danhsach');

        Route::get('xem/{id}', [ChienluocchitietController_cg::class, 'getxem'])->name('xem');
        Route::post('them', [ChienluocchitietController_cg::class, 'postthem'])->name('them');
        Route::post('sua', [ChienluocchitietController_cg::class, 'postsua'])->name('sua');
    });

    //-------------------------------------Thông tin doanh nghiệp--------------------------------------------//
    Route::group(['prefix' => 'doanhnghiep', 'as' => 'doanhnghiep.'], function () {
        Route::get('danhsach', [ThongtinDoanhnghiepController::class, 'getdanhsach'])->name('danhsach');
        Route::get('xemdoanhnghiep/{id}', [ThongtinDoanhnghiepController::class, 'getxemdoanhnghiep'])->name('xemdoanhnghiep');
    });

    //-------------------------------------Đánh giá và góp ý--------------------------------------------//
    Route::group(['prefix' => 'danhgia', 'as' => 'danhgia.'], function () {
        Route::get('danhsach', [DanhgiaDanhgiaController::class, 'getdanhsach'])->name('danhsach');

        Route::get('xemkhaosat/{id}', [DanhgiaDanhgiaController::class, 'getxemkhaosat'])->name('xemkhaosat');
        Route::get('phieu1/{id}', [DanhgiaDanhgiaController::class, 'getphieu1'])->name('phieu1');
        Route::get('phieu2/{id}', [DanhgiaDanhgiaController::class, 'getphieu2'])->name('phieu2');
        Route::get('phieu3/{id}', [DanhgiaDanhgiaController::class, 'getphieu3'])->name('phieu3');
        Route::get('phieu4/{id}', [DanhgiaDanhgiaController::class, 'getphieu4'])->name('phieu4');

        Route::get('xemchienluoc/{id}', [DanhgiaDanhgiaController::class, 'getxemchienluoc'])->name('xemchienluoc');

        Route::get('xemdanhgia/{id}', [DanhgiaDanhgiaController::class, 'getxemdanhgia'])->name('xemdanhgia');
        Route::post('themdanhgia', [DanhgiaDanhgiaController::class, 'posthemdanhgia'])->name('themdanhgia');
        Route::post('suadanhgia', [DanhgiaDanhgiaController::class, 'postsuadanhgia'])->name('suadanhgia');
        Route::get('laythongtindanhgia', [DanhgiaDanhgiaController::class, 'getlaythongtindanhgia'])->name('laythongtindanhgia');

        Route::post('xoadanhgia', [DanhgiaDanhgiaController::class, 'postxoadanhgia'])->name('xoadanhgia');
    });
});

//-------------------------------------Hiệp hội doanh nghiệp--------------------------------------------//
Route::group(['prefix' => 'hiephoidoanhnghiep', 'middleware' => ['auth', 'check_hoidoanhnghiep'], 'as' => 'hiephoidoanhnghiep.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [HiephoidoanhnghiepController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [HiephoidoanhnghiepController::class, 'profile'])->name('profile');

    Route::post('doimatkhau/{id}', [HiephoidoanhnghiepController::class, 'doimatkhau'])->name('doimatkhau');

    //-------------------------------------Tài khoản--------------------------------------------//
    Route::group(['prefix' => 'taikhoan', 'as' => 'taikhoan.'], function () {
        Route::get('danhsach', [TaikhoanController_hhdn::class, 'getdanhsach'])->name('danhsach');

        Route::get('xem/{id}', [TaikhoanController_hhdn::class, 'getxem'])->name('xem');
        Route::get('them', [TaikhoanController_hhdn::class, 'getthem'])->name('them');
        Route::post('them/{loai}', [TaikhoanController_hhdn::class, 'postthem'])->name('them_loai'); //loai: dùng để biết thêm người dùng loại nào
        Route::get('sua/{id}', [TaikhoanController_hhdn::class, 'getsua'])->name('sua');
        Route::post('sua/{loai}/{id}', [TaikhoanController_hhdn::class, 'postsua'])->name('sua_loai');
        Route::post('xoa', [TaikhoanController_hhdn::class, 'postxoa'])->name('xoa');
        Route::post('nguoiduyet', [TaikhoanController_hhdn::class, 'postnguoiduyet'])->name('nguoiduyet');
        Route::post('trangthai', [TaikhoanController_hhdn::class, 'posttrangthai'])->name('trangthai');
    });

    //-------------------------------------Chiến lược--------------------------------------------//
    Route::group(['prefix' => 'chienluoc', 'as' => 'chienluoc.'], function () {
        Route::get('danhsach', [ChienluocChienluocController::class, 'getdanhsach'])->name('danhsach');
        Route::get('xem/{id}', [ChienluocChienluocController::class, 'getxem'])->name('xem');
    });

    //-------------------------------------Danh sách chiến lược chi tiết--------------------------------------------//
    Route::group(['prefix' => 'chienluocchitiet', 'as' => 'chienluocchitiet.'], function () {
        Route::get('danhsach', [ChienluocchitietChienluocchitietController::class, 'getdanhsach'])->name('danhsach');
        Route::get('xem/{id}', [ChienluocchitietChienluocchitietController::class, 'getxem'])->name('xem');
    });

    //-------------------------------------Khảo sát của doanh nghiệp--------------------------------------------//
    Route::group(['prefix' => 'khaosat', 'as' => 'khaosat.'], function () {
        Route::get('danhsach', [KhaosatKhaosatController::class, 'getdanhsach'])->name('danhsach');

        Route::get('xemkhaosat/{id}', [KhaosatKhaosatController::class, 'getxemkhaosat'])->name('xemkhaosat');
        Route::get('phieu1/{id}', [KhaosatKhaosatController::class, 'getphieu1'])->name('phieu1');
        Route::get('phieu2/{id}', [KhaosatKhaosatController::class, 'getphieu2'])->name('phieu2');
        Route::get('phieu3/{id}', [KhaosatKhaosatController::class, 'getphieu3'])->name('phieu3');
        Route::get('phieu4/{id}', [KhaosatKhaosatController::class, 'getphieu4'])->name('phieu4');

        Route::get('xemchienluoc/{id}', [KhaosatKhaosatController::class, 'getxemchienluoc'])->name('xemchienluoc');
        Route::get('xemdanhgia/{id}', [KhaosatKhaosatController::class, 'getxemdanhgia'])->name('xemdanhgia');
    });
    Route::group(['prefix' => 'danhgia', 'as' => 'danhgia.'], function () {
        Route::get('danhsach', [HiephoidoanhnghiepDanhgiaDanhgiaController::class, 'getdanhsach'])->name('danhsach');
    });
});

//-------------------------------------Cộng tác viên--------------------------------------------//
Route::group(['prefix' => 'congtacvien', 'middleware' => ['auth', 'check_congtacvien'], 'as' => 'congtacvien.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [CongtacvienController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [CongtacvienController::class, 'profile'])->name('profile');

    Route::post('doimatkhau/{id}', [CongtacvienController::class, 'doimatkhau'])->name('doimatkhau');
});

// Giao diện chính
Route::get('/', [TrangtinController::class, 'Index'])->name('home');
Route::get('/tintuc/{LinhVuc}', [TrangtinController::class, 'TinTheoLV'])->name('tintuc');
Route::get('/tintuc', [TrangtinController::class, 'AllTin'])->name('AllTin');
Route::get('/tin/{id}', [TrangtinController::class, 'TinDetail'])->name('tindetail');
Route::get('/video', [TrangtinController::class, 'AllVideo'])->name('AllVideo');
Route::get('/thuvien', [TrangtinController::class, 'thuvien'])->name('Thuvien');
Route::get('/tin/{id}', [TrangtinController::class, 'TinDetail'])->name('tindetail');
// Tìm kiếm
Route::get('/search', [TrangtinController::class, 'search'])->name('search');
Route::get('/searchvb', [TrangtinController::class, 'searchvb'])->name('search');
//Bình luận
Route::post('/BinhLuan', [TrangtinController::class, 'binhluan'])->name('binhluan');
// Hiển thị doanh nghiệp
Route::get('/Doanhnghiep', [TrangtinController::class, 'doanhnghiep'])->name('doanhnghiep');
//Giao diện trang tin chuyển đổi số
Route::get('/tinCDS', [ThongtinCDSController::class, 'Index'])->name('tinCDS');
//Giao diện thư viện
Route::get('/thuvien/{phanloai}', [ThuvienController::class, 'getloaithuvien'])->name('thuvien1');
