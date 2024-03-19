<?php

namespace App\Http\Controllers\Api;

use App\Exports\Taikhoan\Chuyengia;
use App\Http\Controllers\Controller;
use App\Http\Resources\HoiThoaiResource;
use App\Http\Resources\TinNhanResource;
use App\Models\Chuyengia as ModelsChuyengia;
use App\Models\HoiThoai;
use App\Models\TinNhan;
use App\Models\User;
use Illuminate\Http\Request;

class HoiDapController extends Controller
{
    public function hoithoai()
    {
        $userId = auth()->id();
        $hoiThoais = HoiThoai::with(['getDoanhNghiepUser', 'getChuyenGiaUser'])
            ->where('doanhnghiep_id', $userId)->get();
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

        $hoiThoai = HoiThoai::with('getDoanhNghiepUser', 'getChuyenGiaUser', 'getTinNhans', 'getTinNhans.getUser')
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
