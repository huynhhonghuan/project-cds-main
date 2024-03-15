<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

//Dùng chung cho các quyền tài khoản và xử lý bên trong
use App\Http\Controllers\Chung\Bocauhoi\BocauhoiController;
use App\Http\Controllers\Chung\Trucot\TrucotController;
use App\Http\Controllers\Chung\Mucdo\MucdoController;

//Chức năng dành cho quản trị viên
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Chienluoc\ChienluocController;
use App\Http\Controllers\Admin\Danhgia\DanhgiaController;
use App\Http\Controllers\Admin\Khaosat\KhaosatController;
use App\Http\Controllers\Admin\Linhvuc\LinhvucController;
use App\Http\Controllers\Admin\Loaihinhdoanhnghiep\LoaihinhdoanhnghiepController;
use App\Http\Controllers\Admin\Taikhoan\TaikhoanController;
use App\Http\Controllers\Admin\Taikhoan\VaitroController;
use App\Http\Controllers\Admin\Tintuc\TintucController;

//Chức năng dùng cho doanh nghiệp
use App\Http\Controllers\Doanhnghiep\DoanhnghiepController;
use App\Http\Controllers\Doanhnghiep\DanhgiacController as DoanhnghiepDanhgiacController;
use App\Http\Controllers\Doanhnghiep\KhaosatController as DoanhnghiepKhaosatController;

//Chức năng dành cho hiệp hội doanh nghiệp
use App\Http\Controllers\Hiephoidoanhnghiep\HiephoidoanhnghiepController;
use App\Http\Controllers\Hiephoidoanhnghiep\Taikhoan\TaikhoanController as TaikhoanController_hhdn;

//Chức năng dành cho chuyên gia
use App\Http\Controllers\Chuyengia\ChuyengiaController;
use App\Http\Controllers\Chuyengia\Chienluoc\ChienluocController as ChienluocController_cg;
use App\Http\Controllers\Chuyengia\Thongtin\DoanhnghiepController as ThongtinDoanhnghiepController;

//Chức năng dành cho cộng tác viên
use App\Http\Controllers\Congtacvien\CongtacvienController;
use App\Http\Controllers\Doanhnghiep\ChienluocController as DoanhnghiepChienluocController;
use Livewire\Livewire;


//Hiển thị lên giao diện màn hình chính
use App\Http\Controllers\Frontend\TrangtinController;

function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

// cập nhật lại đường dẫn của livewire theo project
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('project-cds-main/livewire/update/', $handle);
});

Route::get('/demo', function () {
    return view('demo');
});

//-------------------------------------Khởi tạo home của trang chủ----------------------------------//
Route::get('/', function () {
    return view('trangchu.home');
})->name('home');

// Route::get('/home', function () {
//     return view('trangchu.home');
// })->name('home');

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


//Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

//Route::group(['prefix'=>'trangquanly', 'middleware' => 'auth:sanctum'],function () {

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
        Route::post('them/{loai}', [LoaihinhdoanhnghiepController::class, 'postthem'])->name('them');
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

        // Route::get('sua1/{id}/{diem}', [DoanhnghiepKhaosatController::class, 'getsua1'])->name('sua1');

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

    Route::group(['prefix' => 'doanhnghiep', 'as' => 'doanhnghiep.'], function () {
        Route::get('danhsach', [ThongtinDoanhnghiepController::class, 'getdanhsach'])->name('danhsach');
    });
});

//-------------------------------------Hiệp hội doanh nghiệp--------------------------------------------//
Route::group(['prefix' => 'hiephoidoanhnghiep', 'middleware' => ['auth', 'check_hoidoanhnghiep'], 'as' => 'hiephoidoanhnghiep.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [HiephoidoanhnghiepController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [HiephoidoanhnghiepController::class, 'profile'])->name('profile');

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
});

//-------------------------------------Cộng tác viên--------------------------------------------//
Route::group(['prefix' => 'congtacvien', 'middleware' => ['auth', 'check_congtacvien'], 'as' => 'congtacvien.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [CongtacvienController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [CongtacvienController::class, 'profile'])->name('profile');
});


// Giao diện chính
Route::get('/', [TrangtinController::class, 'getslides'])->name('home');
Route::get('/tintuc/{LinhVuc}', [TrangtinController::class, 'TinTheoLV'])->name('tintuc');
Route::get('/tintuc', [TrangtinController::class, 'AllTin'])->name('AllTin');
Route::get('/tin/{id}', [TrangtinController::class, 'TinDetail'])->name('tindetail');