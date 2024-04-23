<?php

namespace App\Http\Controllers\Frontend;

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
        // dd($hoiThoais); 
        return view('trangquanly.doanhnghiep.chat', compact('hoiThoais'));
    }

    public function tinnhan($id)
    {
        $hoiThoaiId = $id;
        $tinnhans = Tinnhan::with(['getUser'])->where('hoithoai_id', $hoiThoaiId)->get();
        $hoithoai = DB::table('hoithoai')->where('id', $hoiThoaiId)->first();
        $laychuyengia = HoiThoai::with('getChuyenGia', 'getChuyenGiaUser','getChuyenGia')->where('id', $hoiThoaiId)->first();
        // dd($laychuyengia);
        return view('trangquanly.doanhnghiep.tinnhan', compact('tinnhans','hoithoai','laychuyengia'));
    }


    // Phần Chuyên Gia
    public function chuyengiahoithoai()
    {
        $userId = auth()->id();
        $hoiThoais = HoiThoai::with(['getChuyenGia', 'getDoanhNghiep', 'getDoanhNghiep.getUser'])
            ->where('chuyengia_id', $userId)->get();
        return view('trangquanly.chuyengia.chat', compact('hoiThoais'));
    }

    public function chuyengiatinnhan($id)
    {
        $hoiThoaiId = $id;
        $tinnhans = Tinnhan::with(['getUser'])->where('hoithoai_id', $hoiThoaiId)->get();
        $hoithoai = DB::table('hoithoai')->where('id', $hoiThoaiId)->first();
        $laydoanhnghiep = HoiThoai::with('getChuyenGia', 'getDoanhNghiepUser','getDoanhNghiep')->where('id', $hoiThoaiId)->first();
        // dd($laydoanhnghiep);
        return view('trangquanly.chuyengia.tinnhan', compact('tinnhans','hoithoai','laydoanhnghiep'));
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

        // return response()->json(['message' => "Lưu thành công"]);
        // return view('trangquanly.chuyengia.tinnhan', compact('tinnhans','hoithoai'));
        return redirect()->route('chuyengia.tinnhan', request()->hoiThoaiId);

    }

}
