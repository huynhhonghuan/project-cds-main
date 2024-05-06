<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ThongBaoResource;
use App\Http\Services\NotificationService;
use App\Models\ThongBao;
use App\Models\User;
use Illuminate\Http\Request;

class ThongBaoController extends Controller
{
    public function getThongBaoUser()
    {
        $user_id = auth()->user()->id;
        $thongbaos = ThongBao::where("user_id", $user_id)->orderBy('created_at', 'desc')->get();
        return ThongBaoResource::collection($thongbaos);
    }

    public function readThongBao($id)
    {
        $user_id = auth()->user()->id;
        $thongbao = ThongBao::where("user_id", $user_id)->where('id', $id)->firstOrFail();
        $thongbao->update(['daxem' => true]);
        $thongbao->save();

        $thongbaos = ThongBao::where("user_id", $user_id)->orderBy('created_at', 'desc')->get();
        return ThongBaoResource::collection($thongbaos);
    }

    public function deleteThongBao($id)
    {
        $user_id = auth()->user()->id;
        $thongbao = ThongBao::where("user_id", $user_id)->where('id', $id)->firstOrFail();
        $thongbao->delete();

        $thongbaos = ThongBao::where("user_id", $user_id)->orderBy('created_at', 'desc')->get();
        return ThongBaoResource::collection($thongbaos);
    }

    public function pushNotiPhone()
    {
        $message = [
            'tieude' => 'Xin chào',
            'noidung' => 'Test tin nhắn'
        ];
        $user_id = 75; // demo
        (new NotificationService())->sendNotification($message, $user_id);
        return response()->json(['success' => 'success'], 200);
    }
}
