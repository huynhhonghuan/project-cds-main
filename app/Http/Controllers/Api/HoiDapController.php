<?php

namespace App\Http\Controllers\Api;

use App\Exports\Taikhoan\Chuyengia;
use App\Http\Controllers\Controller;
use App\Http\Resources\HoiThoaiResource;
use App\Http\Resources\TinNhanResource;
use App\Http\Services\NotificationService;
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

        $user = User::find(auth()->id());
        $hoiThoai = HoiThoai::find(request()->hoiThoaiId);

        // Lưu tin nhắn
        $model = new TinNhan([
            'user_id' => $user->id,
            'hoithoai_id' => $hoiThoai->id,
            'noidung' => request()->message
        ]);
        $model->save();

        // Gửi thông báo

        if ($user->Check_Chuyengia()) {
            $to = $hoiThoai->doanhnghiep_id;
            $message = [
                'tieude' => 'Chuyên gia ' . $user->name . ' đã trả lời bạn',
                'noidung' => request()->message
            ];
            (new NotificationService())->sendNotification($message, $to);
        } else if ($user->Check_Doanhnghiep()) {
            $to = $hoiThoai->chuyengia_id;
            $message = [
                'tieude' => 'Doanh nghiệp ' . $user->getDoanhNghiep->tentiengviet,
                'noidung' => request()->message
            ];
            (new NotificationService())->sendNotification($message, $to);
        }

        return response()->json(['message' => "Lưu thành công"]);
    }
}
