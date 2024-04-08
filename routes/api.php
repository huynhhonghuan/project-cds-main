<?php

use App\Http\Controllers\Api\BaiVietController;
use App\Http\Controllers\Api\BinhLuanController;
use App\Http\Controllers\Api\ChuyenGiaController;
use App\Http\Controllers\Api\DanhMucController;
use App\Http\Controllers\Api\DoanhNghiepController;
use App\Http\Controllers\Api\HiepHoiDoanhNghiepController;
use App\Http\Controllers\Api\HoiDapController;
use App\Http\Controllers\Api\KhaoSatController;
use App\Http\Controllers\Api\LinhVucController;
use App\Http\Controllers\Api\LoaiHinhDoanhNghiepController;
use App\Http\Controllers\Api\MucDoController;
use App\Http\Controllers\Api\TaiKhoanController;
use App\Http\Controllers\Api\ThongKeController;
use App\Http\Controllers\Api\TinTucController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Store image;
// Route::group(['middleware' => ['auth:api']], function () {
Route::post('store-image', function (Request $request) {
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = $request->path;
        $fileName =  uniqid() . "."  . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
        return $fileName;
    }
    return 'ko có ảnh';
});
// });

// Public routes
Route::apiResource("linhvuc", LinhVucController::class);
Route::apiResource("chuyengia", ChuyenGiaController::class);
Route::apiResource("hiephoidoanhnghiep", HiepHoiDoanhNghiepController::class);
Route::apiResource("loaihinhdoanhnghiep", LoaiHinhDoanhNghiepController::class);
Route::apiResource("mucdo", MucDoController::class);

Route::group(['prefix' => 'tintuc'], function () {
    Route::get('index', [TinTucController::class, 'index']);
    Route::get('detail', [TinTucController::class, 'show']);
    Route::get('slide', [TinTucController::class, 'slide']);
    Route::get('video', [TinTucController::class, 'video']);
    Route::get('thuvien', [TinTucController::class, 'thuvien']);
});

// Diễn đàn
Route::group(['prefix' => 'baiviet'], function () {
    Route::get('', [BaiVietController::class, 'index']);
    Route::get('{id}', [BaiVietController::class, 'detail']);
    Route::get('{id}/binhluan', [BaiVietController::class, 'getBinhLuans']);
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('{id}/binhluan', [BaiVietController::class, 'createBinhLuan']);
        Route::delete('{id}', [BaiVietController::class, 'deleteBaiViet']);
        Route::post('{id}/edit', [BaiVietController::class, 'editBaiViet']);
        Route::post('create', [BaiVietController::class, 'createBaiViet']);
        Route::post('{id}/like', [BaiVietController::class, 'like']);
    });
});

Route::group(['prefix' => 'danhmuc'], function () {
    Route::get('', [DanhMucController::class, 'index']);
    Route::get('{id}', [DanhMucController::class, 'detail']);
    Route::get('{id}/baiviet', [DanhMucController::class, 'getBaiViets']);
});


Route::group(['prefix' => 'thongke'], function () {
    Route::get('mucdo', [ThongKeController::class, 'mucdo']);
});


// Private routes
Route::group(['prefix' => 'doanhnghiep'], function () {
    Route::get("index", [DoanhNghiepController::class, 'index']);
    Route::post('register', [DoanhNghiepController::class, 'register']);
    Route::post("login", [DoanhNghiepController::class, 'login']);
    Route::post("loginemail", [DoanhNghiepController::class, 'loginemail']);

    // Authenticated routes
    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('profile', [DoanhNghiepController::class, 'profile']);
        Route::post('logout', [DoanhNghiepController::class, 'logout']);
    });
});

Route::group(['prefix' => 'taikhoan',  'middleware' => ['auth:api']], function () {
    Route::get('profile', [TaiKhoanController::class, 'profile']);
    Route::post('avatar', [TaiKhoanController::class, 'avatar']);
    Route::post('changepassword', [TaiKhoanController::class, 'changepassword']);
    Route::post('changename', [TaiKhoanController::class, 'changename']);
});

Route::group(['prefix' => 'binhluan'], function () {
    Route::get('', [BinhLuanController::class, 'index']);
    Route::post('', [BinhLuanController::class, 'store']);
});

Route::group(['prefix' => 'khaosat', 'middleware' => ['auth:api']], function () {
    Route::get('', [KhaoSatController::class, 'index']);
});



Route::group(['prefix' => 'hoidap', 'middleware' => ['auth:api']], function () {
    Route::get('hoithoai', [HoiDapController::class, 'hoithoai']);
    Route::get('chuyengiahoithoai', [HoiDapController::class, 'chuyengiahoithoai']);
    Route::get('tinnhan', [HoiDapController::class, 'tinnhan']);
    Route::get('tinnhanchuyengia', [HoiDapController::class, 'tinnhanchuyengia']);
    Route::post('tinnhan', [HoiDapController::class, 'themtinnhan']);
    Route::get('test', [HoiDapController::class, 'test']);
});
