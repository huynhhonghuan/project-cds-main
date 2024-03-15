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
    public function themhoithoai(Request $request)
    {
    }
    public function tinnhan(Request $request)
    {
        $request->validate([
            'chuyenGiaId' => 'required|exists:chuyengia,id',
        ]);
        $userId = auth()->id();
        $chuyenGiaId = request()->chuyenGiaId;

        $chuyenGiaUser = ModelsChuyengia::where('id', $chuyenGiaId)->firstOrFail();

        $hoiThoai = HoiThoai::where('chuyengia_id', $chuyenGiaUser->user_id)
            ->where('doanhnghiep_id', $userId)
            ->first();

        if (!$hoiThoai) {
            $model = new HoiThoai([
                'chuyengia_id' => $chuyenGiaUser->user_id,
                'doanhnghiep_id' => $userId,
            ]);
            $model->save();
            return [];
        }

        $tinNhans = TinNhan::with(['getUser'])
            ->where('hoithoai_id', $hoiThoai->id)
            ->get();
        return TinNhanResource::collection($tinNhans);
    }
    public function themtinnhan(Request $request)
    {
    }
}
