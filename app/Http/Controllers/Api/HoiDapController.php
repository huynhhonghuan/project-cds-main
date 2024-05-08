<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoanhNghiepResource;
use App\Http\Resources\HoiThoaiResource;
use App\Http\Resources\TinNhanResource;
use App\Http\Services\NotificationService;
use App\Http\Services\WitService;
use App\Models\Doanhnghiep;
use App\Models\Doanhnghiep_Loaihinh;
use App\Models\HoiThoai;
use App\Models\Mohinh;
use App\Models\Mohinh_Doanhnghiep_Trucot;
use App\Models\TinNhan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoiDapController extends Controller
{
    // lấy danh sách hội thoại
    public function hoithoai()
    {
        $user = User::findOrFail(auth()->id());
        $isDoanhNghiep = $user->Check_Doanhnghiep();
        $isChuyenGia = $user->Check_Chuyengia();
        if ($isDoanhNghiep) {
            $hoiThoais = HoiThoai::where('doanhnghiep_id', $user->id)->get();
        } else if ($isChuyenGia) {
            $hoiThoais = HoiThoai::where('chuyengia_id', $user->id)->get();
        }
        return HoiThoaiResource::collection($hoiThoais);
    }

    // lấy message của hội thoại
    public function tinnhan(Request $request)
    {
        $request->validate([
            'toUserId' => 'required',
        ]);
        $user = User::findOrFail(auth()->id());
        $toUser = User::findOrFail(request()->toUserId);

        $doanhnghiep_id = null;
        $chuyengia_id = null;

        if ($user->Check_Doanhnghiep() && $toUser->Check_Chuyengia()) {
            $doanhnghiep_id = $user->id;
            $chuyengia_id = $toUser->id;
        } else if ($user->Check_Chuyengia() && $toUser->Check_Doanhnghiep()) {
            $doanhnghiep_id = $toUser->id;
            $chuyengia_id = $user->id;
        }

        if ($doanhnghiep_id && $chuyengia_id) {
            $hoiThoai = HoiThoai::where('chuyengia_id', $chuyengia_id)
                ->where('doanhnghiep_id', $doanhnghiep_id)
                ->first();

            if (!$hoiThoai) {
                $hoiThoai = new HoiThoai([
                    'chuyengia_id' => $chuyengia_id,
                    'doanhnghiep_id' => $doanhnghiep_id,
                ]);
                $hoiThoai->save();
            }

            return new HoiThoaiResource($hoiThoai);
        }
    }

    public function gettinnhanbyhoithoai()
    {
        $hoiThoaiId = request()->hoiThoaiId;
        $user = User::findOrFail(auth()->id());
        if ($user->Check_Doanhnghiep()) {
            $hoiThoai = HoiThoai::where('id', $hoiThoaiId)->where('doanhnghiep_id', $user->id)->first();
        } else if ($user->Check_Chuyengia()) {
            $hoiThoai = HoiThoai::where('id', $hoiThoaiId)->where('chuyengia_id', $user->id)->first();
        }
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
                'noidung' => request()->message,
                'loai' => 'tinnhan',
                'loai_id' => $hoiThoai->id
            ];
            (new NotificationService())->sendNotification($message, $to);
        } else if ($user->Check_Doanhnghiep()) {
            $to = $hoiThoai->chuyengia_id;
            $message = [
                'tieude' => 'Doanh nghiệp ' . $user->getDoanhNghiep->tentiengviet,
                'noidung' => request()->message,
                'loai' => 'tinnhan',
                'loai_id' => $hoiThoai->id
            ];
            (new NotificationService())->sendNotification($message, $to);
        }

        return new TinNhanResource($model);
    }

    public function deletehoithoai($id)
    {
        $hoiThoai = HoiThoai::findOrFail($id);
        $hoiThoai->delete();
        return response()->json(['message' => "Xóa thành công"]);
    }

    // Chuyên gia tìm kiếm doanh nghiệp để tư vấn
    // ĐK: Doanh nghiệp có nhu cầu hoặc đã thực hiện khảo sát
    public function timkiem()
    {
        $user = User::findOrFail(auth()->id());
        $doanhNghieps = Doanhnghiep::select('doanhnghiep.*')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('doanhnghiep_id'))
                    ->from('khaosat')
                    ->groupBy('doanhnghiep_id');
            })->orWhereIn('id', function ($query) {
                $query->select(DB::raw('doanhnghiep_id'))
                    ->from('khaosat')
                    ->groupBy('doanhnghiep_id');
            })
            ->get();

        return DoanhNghiepResource::collection($doanhNghieps);
    }

    public function test()
    {
        return (new WitService())->getIntentByMessage('cần mua 3 ký lúa');
    }
}
