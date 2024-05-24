<?php

use App\Http\Controllers\Api\BaiVietController;
use App\Http\Controllers\Api\BinhLuanController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\ChuyenGiaController;
use App\Http\Controllers\Api\DanhMucController;
use App\Http\Controllers\Api\DoanhNghiepController;
use App\Http\Controllers\Api\HiepHoiDoanhNghiepController;
use App\Http\Controllers\Api\HoiDapController;
use App\Http\Controllers\Api\KhaoSatController;
use App\Http\Controllers\Api\LinhVucController;
use App\Http\Controllers\Api\LoaiHinhDoanhNghiepController;
use App\Http\Controllers\Api\MucDoController;
use App\Http\Controllers\Api\SanPhamController;
use App\Http\Controllers\Api\TaiKhoanController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\ThacMacController;
use App\Http\Controllers\Api\ThongBaoController;
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

// Thông báo
Route::group(['prefix' => 'thongbao'], function () {
    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('', [ThongBaoController::class, 'getThongBaoUser']);
        Route::post('', [ThongBaoController::class, 'createThongBao']);
        Route::put('{id}/read', [ThongBaoController::class, 'readThongBao']);
        Route::delete('{id}', [ThongBaoController::class, 'deleteThongBao']);
    });
    Route::get('push-noti', [ThongBaoController::class, 'pushNotiPhone']);
});

// Diễn đàn
Route::group(['prefix' => 'baiviet'], function () {
    Route::get('search', [BaiVietController::class, 'searchBaiViet']);
    Route::get('user/{id}', [BaiVietController::class, 'getBaiVietsByUser']);
    Route::get('{id}/binhluan', [BaiVietController::class, 'getBinhLuans']);
    Route::get('{id}', [BaiVietController::class, 'detail']);
    Route::get('', [BaiVietController::class, 'index']);
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('create', [BaiVietController::class, 'createBaiViet']);
        Route::post('{id}/binhluan', [BaiVietController::class, 'createBinhLuan']);
        Route::post('{id}/edit', [BaiVietController::class, 'editBaiViet']);
        Route::post('{id}/like', [BaiVietController::class, 'like']);
        Route::delete('{id}', [BaiVietController::class, 'deleteBaiViet']);
    });
});

Route::group(['prefix' => 'danhmuc'], function () {
    Route::get('', [DanhMucController::class, 'index']);
    Route::get('{id}', [DanhMucController::class, 'detail']);
    Route::get('{id}/baiviet', [DanhMucController::class, 'getBaiViets']);
});


Route::group(['prefix' => 'thongke'], function () {
    Route::get('mucdo', [ThongKeController::class, 'mucdo']);
    Route::get('soluongdoanhnghiep', [ThongKeController::class, 'soluongdoanhnghiep']);
    Route::get('mucdotheohuyen', [ThongKeController::class, 'mucdotheohuyen']);
    Route::get('doanhnghieptheoloaihinh', [ThongKeController::class, 'doanhnghieptheoloaihinh']);
    Route::get('doanhnghieptheolinhvuc', [ThongKeController::class, 'doanhnghieptheolinhvuc']);
    Route::get('taikhoan', [ThongKeController::class, 'taikhoan']);
});


Route::group(['prefix' => 'sanpham'], function () {
    Route::get('index', [SanPhamController::class, 'index']);
    Route::get('newest', [SanPhamController::class, 'getSanPhamMoiNhat']);
    Route::get('random', [SanPhamController::class, 'getSanPhamRandom']);
    Route::get('{id}', [SanPhamController::class, 'detail']);
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('create', [SanPhamController::class, 'create']);
        Route::post('{id}/edit', [SanPhamController::class, 'edit']);
        Route::post('hinhanh/create', [SanPhamController::class, 'createanhsanpham']);
        Route::delete('{id}', [SanPhamController::class, 'delete']);
        Route::delete('hinhanh/{id}', [SanPhamController::class, 'deleteanhsanpham']);
    });
});


Route::group(['prefix' => 'doanhnghiep'], function () {
    // Authenticated routes
    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('profile', [DoanhNghiepController::class, 'profile']);
        Route::post('logout', [DoanhNghiepController::class, 'logout']);
        Route::post('edit', [DoanhNghiepController::class, 'edit']);
        Route::post('editDaiDien', [DoanhNghiepController::class, 'editDaiDien']);
        Route::post('nhucau', [DoanhNghiepController::class, 'postNhuCau']);
        // Thành tích
        Route::post('thanhtich/create', [DoanhNghiepController::class, 'createThanhTich']);
        Route::delete('thanhtich/{id}', [DoanhNghiepController::class, 'deleteThanhTich']);

        // Hồ sơ năng lực
        Route::post('hosonangluc', [DoanhNghiepController::class, 'createHoSoNangLuc']);
    });
    Route::get("index", [DoanhNghiepController::class, 'index']);
    Route::get("nganhnghe", [DoanhNghiepController::class, 'nganhnghe']);
    Route::get("website", [DoanhNghiepController::class, 'getDoanhNghiepHasWebsite']);
    Route::get('{id}/sanpham', [SanPhamController::class, 'getSanPhamByDoanhNghiep']);
    Route::get('{id}/baiviet', [BaiVietController::class, 'getBaiVietByDoanhNghiep']);
    Route::get("{id}", [DoanhNghiepController::class, 'detail']);
    Route::post('register', [DoanhNghiepController::class, 'register']);
    Route::post("loginemail", [DoanhNghiepController::class, 'loginemail']);
    Route::post("login", [DoanhNghiepController::class, 'login']);
});

Route::group(['prefix' => 'taikhoan',  'middleware' => ['auth:api']], function () {
    Route::get('profile', [TaiKhoanController::class, 'profile']);
    Route::post('avatar', [TaiKhoanController::class, 'avatar']);
    Route::post('changepassword', [TaiKhoanController::class, 'changepassword']);
    Route::post('changename', [TaiKhoanController::class, 'changename']);
    Route::post('savedevicetoken', [TaiKhoanController::class, 'savedevicetoken']);
});

Route::group(['prefix' => 'binhluan'], function () {
    Route::get('', [BinhLuanController::class, 'index']);
    Route::post('', [BinhLuanController::class, 'store']);
});

Route::group(['prefix' => 'khaosat'], function () {
    Route::get('doanhnghiep/{id}', [KhaoSatController::class, 'getKhaoSatDoanhNghiep']);
    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('', [KhaoSatController::class, 'index']);
    });
});

Route::group(['prefix' => 'hoidap', 'middleware' => ['auth:api']], function () {
    Route::get('timkiem', [HoiDapController::class, 'timkiem']);

    Route::get('hoithoai', [HoiDapController::class, 'hoithoai']);
    Route::get('tinnhan', [HoiDapController::class, 'tinnhan']);
    Route::get('gettinnhanbyhoithoai', [HoiDapController::class, 'gettinnhanbyhoithoai']);
    Route::post('tinnhan', [HoiDapController::class, 'themtinnhan']);

    Route::delete('hoithoai/{id}', [HoiDapController::class, 'deletehoithoai']);
});

Route::group(['prefix' => 'test'], function () {
    Route::post('run', [HoiDapController::class, 'test']);
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('runAuth', [HoiDapController::class, 'testAuth']);
    });
});


Route::group(['prefix' => 'chat', 'middleware' => ['auth:api']], function () {
    Route::get('conversations', [ChatController::class, 'getAllConversations']);
    Route::get('conversation', [ChatController::class, 'getConversation']);
    Route::delete('conversation/{id}', [ChatController::class, 'deleteConversation']);
});


Route::group(['prefix' => 'thacmac', 'middleware' => ['auth:api']], function () {
    Route::post('create', [ThacMacController::class, 'createThacMac']);
    Route::delete('{id}', [ThacMacController::class, 'deleteThacMac']);
    Route::get('user', [ThacMacController::class, 'getThacMacOfUser']);
});
