<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

//-------------------------------------Login--------------------------------------------//
Route::post('/login', [ApiController::class, 'login'])->name('login');
//-------------------------------------Register--------------------------------------------//
Route::post('/register', [ApiController::class, 'register'])->name('register');

//-------------------------------------Doanh nghiệp--------------------------------------------//
Route::group(['prefix' => 'doanhnghiep', 'middleware' => ['auth:api', 'check_doanhnghiep'], 'as' => 'doanhnghiep.'], function () {
    //-------------------------------------Profile--------------------------------------------//
    Route::get('profile', [ApiController::class, 'profile'])->name('profile');
    //-------------------------------------Profile--------------------------------------------//
    Route::get('refresh', [ApiController::class, 'refreshToken'])->name('refreshToken');
    //-------------------------------------Logout--------------------------------------------//
    Route::get('/logout', [ApiController::class, 'logout'])->name('logout');
});
