<?php

namespace App\Http\Controllers\Frontend;

use App\Exports\Taikhoan\Chuyengia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\HoiThoai;
use App\Models\TinNhan;
use App\Models\Chuyengia as ModelsChuyengia;
use App\Models\Doanhnghiep;
use App\Models\Tintuc;
use Exception;
use App\Http\Services\NotificationService;
use App\Models\ThongBao;

class HoidapController extends Controller
{
    public function __construct()
    {
        
    }
    // Phần Doanh Nghiệp
    public function hoithoai() {
        $userId = auth()->id();
        $hoiThoais = HoiThoai::with(['getChuyenGia',  'getDoanhNghiep', 'getDoanhNghiep.getUser'])
            ->where('doanhnghiep_id', $userId)->get();
        $thongbaos = ThongBao::where("user_id" , $userId)->orderBy('created_at', 'desc')->get();
        // $chuyengia = ModelsChuyengia::all();    
        // dd($hoiThoais); 
        return view('trangquanly.doanhnghiep.chat', compact('hoiThoais','thongbaos'));
    }

    public function tinnhan($id)
    {
        $hoiThoaiId = $id;
        $userId = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $userId)->orderBy('created_at', 'desc')->get();
        // dd($thongbaos);
        $tinnhans = Tinnhan::with(['getUser'])->where('hoithoai_id', $hoiThoaiId)->get();
        $hoithoai = DB::table('hoithoai')->where('id', $hoiThoaiId)->first();
        $laychuyengia = HoiThoai::with('getChuyenGia', 'getChuyenGiaUser','getChuyenGia')
            ->where('id', $hoiThoaiId)->first();

        if (!$hoithoai) {
            $hoithoai = new HoiThoai([
                'chuyengia_id' => 1,
                'doanhnghiep_id' => $userId,
            ]);
            $hoithoai->save();
        }
        // dd($laychuyengia);
        return view('trangquanly.doanhnghiep.tinnhan', compact('tinnhans','hoithoai','laychuyengia','thongbaos'));
    }


    // Phần Chuyên Gia
    public function chuyengiahoithoai()
    {
        $userId = auth()->id();
        $hoiThoais = HoiThoai::with(['getChuyenGia', 'getDoanhNghiep', 'getDoanhNghiep.getUser'])
            ->where('chuyengia_id', $userId)->get();
        // dd($hoiThoais);    
            
        return view('trangquanly.chuyengia.chat', compact('hoiThoais'));
    }

    public function chuyengiatinnhan($id)
    {
        $hoiThoaiId = $id;
        $tinnhans = Tinnhan::with(['getUser'])->where('hoithoai_id', $hoiThoaiId)->get();
        $hoithoai = DB::table('hoithoai')->where('id', $hoiThoaiId)->first();
        $laydoanhnghiep = HoiThoai::with('getChuyenGia', 'getDoanhNghiepUser','getDoanhNghiep')->where('id', $hoiThoaiId)->first();
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        // dd($hoiThoaiId);
        return view('trangquanly.chuyengia.tinnhan', compact('tinnhans','hoithoai','laydoanhnghiep','thongbaos'));
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
        $user = User::find(Auth::user()->id);
        $hoiThoai = HoiThoai::find($request->hoiThoaiId);
        if($user->Check_Chuyengia()) {
            $to = $hoiThoai->doanhnghiep_id;
            $message = [
                'tieude' => 'Chuyên gia ' .$user->name. ' đã phản hồi bạn',
                'noidung' => $request->message,
                'loai' => 'tinnhan',
                'loai_id' => $request->hoiThoaiId
                 
            ];
            (new NotificationService())->sendNotification($message, $to);
        } else if($user->Check_DoanhNghiep()) {
            $to = $hoiThoai->chuyengia_id;
            $message = [
                'tieude' => 'Doanh nghiệp ' .$user->getDoanhNghiep->tentiengviet. ' có câu hỏi cho bạn',
                'noidung' => $request->message,
                'loai' => 'tinnhan',
                'loai_id' => $request->hoiThoaiId  
            ];
            (new NotificationService())->sendNotification($message, $to);
        }

        // return response()->json(['message' => "Lưu thành công"]);
        // return view('trangquanly.doanhnghiep.tinnhan', compact('tinnhans', 'hoithoai'));
        return redirect()->route('doanhnghiep.tinnhan', request()->hoiThoaiId);
    }

    public function themtinnhanchuyengia(Request $request)
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
        $user = User::find(Auth::user()->id);
        $hoiThoai = HoiThoai::find($request->hoiThoaiId);
        if($user->Check_Chuyengia()) {
            $to = $hoiThoai->doanhnghiep_id;
            $message = [
                'tieude' => 'Chuyên gia ' .$user->getChuyenGia->tenchuyengia. ' đã phản hồi bạn',
                'noidung' => $request->message,
                'loai' => 'tinnhan',
                'loai_id' => $request->hoiThoaiId  
            ];
            (new NotificationService())->sendNotification($message, $to);
        } else if($user->Check_DoanhNghiep()) {
            $to = $hoiThoai->chuyengia_id;
            $message = [
                'tieude' => 'Doanh nghiệp ' .$user->getDoanhNghiep->tentiengviet. ' có câu hỏi cho bạn',
                'noidung' => $request->message,
                'loai' => 'tinnhan',
                'loai_id' => $request->hoiThoaiId 
            ];
            (new NotificationService())->sendNotification($message, $to);
        }
        // return response()->json(['message' => "Lưu thành công"]);
        // return view('trangquanly.chuyengia.tinnhan', compact('tinnhans','hoithoai'));
        return redirect()->route('chuyengia.tinnhan', request()->hoiThoaiId);
    }
}
