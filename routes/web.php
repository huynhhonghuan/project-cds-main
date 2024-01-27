<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Chuyengia\ChuyengiaController;
use App\Http\Controllers\Doanhnghiep\DoanhnghiepController;
use App\Http\Controllers\Congtacvien\CongtacvienController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TintucController;
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
Route::group(['prefix' => 'admin' , 'middleware' => ['auth','check_admin'], 'as'=>'admin.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [AdminController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    //-------------------------------------Tin tức--------------------------------------------//
    Route::group(['prefix'=>'tintuc', 'as' => 'tintuc.'], function(){
        Route::get('danhsach',[TintucController::class,'getdanhsach'])->name('danhsach');
        Route::get('danhsachnongnghiep',[TintucController::class,'getdanhsachnongnghiep'])->name('danhsachnongnghiep');
        Route::get('danhsachcongnghiep',[TintucController::class,'getdanhsachcongnghiep'])->name('danhsachcongnghiep');
        Route::get('danhsachthuongmaidichvu',[TintucController::class,'getdanhsachthuongmaidichvu'])->name('danhsachthuongmaidichvu');

        Route::get('them',[TintucController::class,'getthem'])->name('them');
        Route::post('them',[TintucController::class,'postthem'])->name('them');
        Route::get('sua/{id}',[TintucController::class,'getsua'])->name('sua');
        Route::post('sua/{id}',[TintucController::class,'postsua'])->name('sua');
        Route::post('xoa',[TintucController::class,'getxoa'])->name('xoa');
        Route::get('duyet/{id}',[TintucController::class,'getduyet'])->name('duyet');
    });

});

//-------------------------------------Doanh nghiệp--------------------------------------------//
Route::group(['prefix' => 'doanhnghiep', 'middleware' => ['auth','check_doanhnghiep'],'as'=>'doanhnghiep.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [DoanhnghiepController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [DoanhnghiepController::class, 'profile'])->name('profile');
});

//-------------------------------------Chuyên gia--------------------------------------------//
Route::group(['prefix' => 'chuyengia', 'middleware' => ['auth','check_chuyengia'],'as'=>'chuyengia.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [ChuyengiaController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [ChuyengiaController::class, 'profile'])->name('profile');
});

//-------------------------------------Hiệp hội doanh nghiệp--------------------------------------------//
Route::group(['prefix' => 'hiephoidoanhnghiep', 'middleware' => ['auth','check_hoidoanhnghiep'], 'as' =>'hiephoidoanhnghiep.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [HiephoidoanhnghiepController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [HiephoidoanhnghiepController::class, 'profile'])->name('profile');
});

//-------------------------------------Cộng tác viên--------------------------------------------//
Route::group(['prefix' => 'congtacvien' , 'middleware' => ['auth','check_congtacvien'], 'as'=>'congtacvien.'], function () {
    //-------------------------------------Home--------------------------------------------//
    Route::get('home', [CongtacvienController::class, 'home'])->name('home');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [CongtacvienController::class, 'profile'])->name('profile');
});
