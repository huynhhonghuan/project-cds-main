<?php

namespace App\Http\Controllers\Api;

use App\Exports\Taikhoan\Chuyengia;
use App\Http\Controllers\Controller;
use App\Http\Resources\HoiThoaiResource;
use App\Http\Resources\TinNhanResource;
use App\Models\Chuyengia as ModelsChuyengia;
use App\Models\Doanhnghiep;
use App\Models\HoiThoai;
use App\Models\TinNhan;
use App\Models\User;
use Illuminate\Http\Request;

class HoiDapController extends Controller
{
    public function hoithoai()
    {
        $userId = auth()->id();
        $hoiThoais = HoiThoai::with(['getChuyenGia',  'getDoanhNghiep', 'getDoanhNghiep.getUser'])
            ->where('doanhnghiep_id', $userId)->get();
        return HoiThoaiResource::collection($hoiThoais);
    }

    public function chuyengiahoithoai()
    {
        // Userid  =  chuyengiaId
        $userId = auth()->id();
        $hoiThoais = HoiThoai::with(['getChuyenGia', 'getDoanhNghiep', 'getDoanhNghiep.getUser'])
            ->where('chuyengia_id', $userId)->get();
        // $hoiThoais = HoiThoai::all();
        return HoiThoaiResource::collection($hoiThoais);
    }

    public function tinnhan(Request $request)
    {
        $request->validate([
            'chuyenGiaId' => 'required|exists:chuyengia,id',
        ]);
        $userId = auth()->id();
        $chuyenGiaId = request()->chuyenGiaId;

        $chuyenGiaUser = ModelsChuyengia::where('id', $chuyenGiaId)->firstOrFail();

        $hoiThoai = HoiThoai::with('getDoanhNghiep', 'getDoanhNghiep.getUser', 'getChuyenGia', 'getTinNhans', 'getTinNhans.getUser')
            ->where('chuyengia_id', $chuyenGiaUser->user_id)
            ->where('doanhnghiep_id', $userId)
            ->first();

        if (!$hoiThoai) {
            $hoiThoai = new HoiThoai([
                'chuyengia_id' => $chuyenGiaUser->user_id,
                'doanhnghiep_id' => $userId,
            ]);
            $hoiThoai->save();
        }

        return new HoiThoaiResource($hoiThoai);
    }

    public function tinnhanchuyengia(Request $request)
    {
        $request->validate([
            'doanhNghiepId' => 'required|exists:doanhnghiep,id',
        ]);
        $userId = auth()->id(); // user_id của chuyên gia
        $doanhNghiepId = request()->doanhNghiepId; // doanhnghiep_id

        $doanhnghiep = Doanhnghiep::where('id', $doanhNghiepId)->firstOrFail();

        $hoiThoai = HoiThoai::with('getDoanhNghiep', 'getDoanhNghiep.getUser', 'getChuyenGia', 'getTinNhans', 'getTinNhans.getUser')
            ->where('chuyengia_id', $userId)
            ->where('doanhnghiep_id', $doanhnghiep->user_id)
            ->firstOrFail();

        return new HoiThoaiResource($hoiThoai);
    }

    public function themtinnhan(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'hoiThoaiId' => 'required|exists:hoithoai,id',
        ]);

        $userId = auth()->id();

        $model = new TinNhan([
            'user_id' => $userId,
            'hoithoai_id' => request()->hoiThoaiId,
            'noidung' => request()->message
        ]);
        $model->save();
        return response()->json(['message' => "Lưu thành công"]);
    }
}
