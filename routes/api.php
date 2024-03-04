<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\BinhLuanController;
use App\Http\Controllers\Api\ChuyenGiaController;
use App\Http\Controllers\Api\DoanhNghiepController;
use App\Http\Controllers\Api\HiepHoiDoanhNghiepController;
use App\Http\Controllers\Api\LinhVucController;
use App\Http\Controllers\Api\LoaiHinhDoanhNghiepController;
use App\Http\Controllers\Api\TaiKhoanController;
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


Route::apiResource("linhvuc", LinhVucController::class);
Route::apiResource("tintuc", TinTucController::class);
Route::apiResource("chuyengia", ChuyenGiaController::class);
Route::apiResource("hiephoidoanhnghiep", HiepHoiDoanhNghiepController::class);
Route::apiResource("loaihinhdoanhnghiep", LoaiHinhDoanhNghiepController::class);

Route::group(['prefix' => 'doanhnghiep'], function () {
    Route::post('register', [DoanhNghiepController::class, 'register']);
    Route::post("login", [DoanhNghiepController::class, 'login']);
    Route::post("loginemail", [DoanhNghiepController::class, 'loginemail']);

    // Authenticated routes
    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('profile', [DoanhNghiepController::class, 'profile']);
        Route::post('avatar', [DoanhNghiepController::class, 'avatar']);
        Route::post('changepassword', [DoanhNghiepController::class, 'changepassword']);
        Route::post('logout', [DoanhNghiepController::class, 'logout']);
    });
});

Route::group(['prefix' => 'taikhoan',  'middleware' => ['auth:api']], function () {
    Route::get('profile', [TaiKhoanController::class, 'profile']);
    Route::post('avatar', [TaiKhoanController::class, 'avatar']);
    Route::post('changepassword', [TaiKhoanController::class, 'changepassword']);
});

Route::group(['prefix' => 'binhluan', 'middleware' => ['auth:api']], function () {
    Route::get('', [BinhLuanController::class, 'index']);
    Route::post('', [BinhLuanController::class, 'store']);
});
//,  'middleware' => ['auth:api']