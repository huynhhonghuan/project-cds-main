<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ThacMacResource;
use App\Http\Services\NotificationService;
use App\Models\ThacMac;
use Illuminate\Http\Request;

class ThacMacController extends Controller
{

    public function getAllThacMac()
    {
        $thacMacs = ThacMac::orderBy('created_at', 'desc')->get();
        return ThacMacResource::collection($thacMacs);
    }
    public function getThacMacOfUser()
    {
        $user_id = auth()->id();
        $thacMacs = ThacMac::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return ThacMacResource::collection($thacMacs);
    }

    public function postTraLoi($id, Request $request)
    {
        $thacMac = ThacMac::findOrFail($id);
        $thacMac->traloi = $request->traLoi;
        $thacMac->ngaytraloi = now();
        $thacMac->save();

        $message = [
            'tieude' => 'Bạn có một câu hỏi đã được giải đáp',
            'noidung' => $thacMac->noidung,
            'loai' => 'thacmac',
            'loai_id' => $thacMac->id
        ];
        (new NotificationService())->sendNotification($message, $thacMac->user_id);

        return new ThacMacResource($thacMac);
    }

    public function createThacMac(Request $request)
    {
        $thacMac = new ThacMac();
        $thacMac->user_id = auth()->id();
        $thacMac->noidung = $request->noiDung;
        $thacMac->save();
        return new ThacMacResource($thacMac);
    }

    public function deleteThacMac($id)
    {
        $user_id = auth()->id();
        $thacMac = ThacMac::where('user_id', $user_id)->where('id', $id)->firstOrFail();
        $thacMac->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }
}
