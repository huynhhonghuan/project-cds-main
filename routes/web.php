<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Chuyengia\ChuyengiaController;
use App\Http\Controllers\Doanhnghiep\DoanhnghiepController;
use App\Http\Controllers\Congtacvien\CongtacvienController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Bocauhoi\BocauhoiController;
use App\Http\Controllers\Admin\Danhgia\DanhgiaController;
use App\Http\Controllers\Admin\Linhvuc\LinhvucController;
use App\Http\Controllers\Admin\Loaihinhdoanhnghiep\LoaihinhdoanhnghiepController;
use App\Http\Controllers\Admin\Mucdo\MucdoController;
use App\Http\Controllers\Admin\Taikhoan\TaikhoanController;
use App\Http\Controllers\Admin\Taikhoan\VaitroController;
use App\Http\Controllers\Admin\Tintuc\TintucController;
use App\Http\Controllers\Admin\Trucot\TrucotController;
use App\Http\Controllers\Hiephoidoanhnghiep\HiephoidoanhnghiepController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/demo', function () {
    return view('demo');
});

//-------------------------------------Khởi tạo home của trang chủ----------------------------------//
Route::get('/', function () {
    return view('trangchu.home');
})->name('home');

Route::get('/home', function () {
    return view('trangchu.home');
})->name('home');

//-------------------------------------Phân quyền Login--------------------------------------------//
Route::group(['middleware' => 'auth'], function () {
    //admin
    Route::get('admin/home', function () {
        return view('trangquanly.admin.home');
    });
    //admin
    Route::get('congtacvien/home', function () {
        return view('trangquanly.congtacvien.home');
    });
    //doanh nghiep - có thể đăng kí
    Route::get('doanhnghiep/home', function () {
        return view('trangquanly.doanhnghiep.home');
    });
    //chuyên gia - admin và hội doanh nghiệp cấp tk
    //thêm đề xuất mô hình - nó quyết định
    Route::get('chuyengia/home', function () {
        return view('trangquanly.chuyengia.home');
    });
    //hội doanh nghiệp - admin cấp tài khoản - 3 loại người dùng của HDN
    //cũng thêm được mô hình
    Route::get('hoidoanhnghiep/home', function () {
        return view('trangquanly.hoidoanhnghiep.home');
    });
});

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
//Route::group(['prefix'=>'trangquanly', 'middleware' => ['auth','check_admin']],function () {

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

        Route::get('them', [TaikhoanController::class, 'getthem'])->name('them');
        Route::post('them/{loai}', [TaikhoanController::class, 'postthem'])->name('them_loai'); //loai: dùng để biết thêm người dùng loại nào
        Route::get('sua/{id}', [TaikhoanController::class, 'getsua'])->name('sua');
        Route::post('sua/{loai}/{id}', [TaikhoanController::class, 'postsua'])->name('sua_loai');
        Route::post('xoa', [TaikhoanController::class, 'postxoa'])->name('xoa');
        Route::post('nguoiduyet', [TaikhoanController::class, 'postnguoiduyet'])->name('nguoiduyet');
        Route::post('trangthai', [TaikhoanController::class, 'posttrangthai'])->name('trangthai');
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

    //-------------------------------------Mức độ chuyển đổi số--------------------------------------------//
    Route::group(['prefix' => 'mucdo', 'as' => 'mucdo.'], function () {
        Route::get('danhsach', [MucdoController::class, 'getdanhsach'])->name('danhsach');
    });

    //-------------------------------------Trụ cột chuyển đổi số--------------------------------------------//
    Route::group(['prefix' => 'trucot', 'as' => 'trucot.'], function () {
        Route::get('danhsach', [TrucotController::class, 'getdanhsach'])->name('danhsach');
    });

    //-------------------------------------Trụ cột chuyển đổi số--------------------------------------------//
    Route::group(['prefix' => 'bocauhoi', 'as' => 'bocauhoi.'], function () {

        Route::post('nhap', [BocauhoiController::class, 'postnhap'])->name('nhap'); //nhập bộ câu hỏi từ excel 1 - 2 - 3
        Route::get('xuat', [BocauhoiController::class, 'getxuat'])->name('xuat'); //nhập bộ câu hỏi từ excel 1 - 2 - 3

        Route::get('danhsachphieu1', [BocauhoiController::class, 'getdanhsachphieu1'])->name('danhsachphieu1');
        Route::get('danhsachphieu2', [BocauhoiController::class, 'getdanhsachphieu2'])->name('danhsachphieu2');
        Route::get('danhsachphieu3', [BocauhoiController::class, 'getdanhsachphieu3'])->name('danhsachphieu3');
        Route::get('danhsachphieu4', [BocauhoiController::class, 'getdanhsachphieu4'])->name('danhsachphieu4');
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
});

//-------------------------------------Doanh nghiệp--------------------------------------------//
Route::group(['prefix' => 'doanhnghiep', 'middleware' => ['auth', 'check_doanhnghiep'], 'as' => 'doanhnghiep.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [DoanhnghiepController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [DoanhnghiepController::class, 'profile'])->name('profile');
});

//-------------------------------------Chuyên gia--------------------------------------------//
Route::group(['prefix' => 'chuyengia', 'middleware' => ['auth', 'check_chuyengia'], 'as' => 'chuyengia.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [ChuyengiaController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [ChuyengiaController::class, 'profile'])->name('profile');
});

//-------------------------------------Hiệp hội doanh nghiệp--------------------------------------------//
Route::group(['prefix' => 'hiephoidoanhnghiep', 'middleware' => ['auth', 'check_hoidoanhnghiep'], 'as' => 'hiephoidoanhnghiep.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [HiephoidoanhnghiepController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [HiephoidoanhnghiepController::class, 'profile'])->name('profile');
});

//-------------------------------------Cộng tác viên--------------------------------------------//
Route::group(['prefix' => 'congtacvien', 'middleware' => ['auth', 'check_congtacvien'], 'as' => 'congtacvien.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [CongtacvienController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [CongtacvienController::class, 'profile'])->name('profile');
});
