<?php

namespace App\Http\Controllers\Chuyengia\Thongtin;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoanhnghiepController extends Controller
{
    public function getdanhsach()
    {
        $danhsach = Doanhnghiep::all();
        foreach ($danhsach as $value) {
            if ($value->getloaihinh->getlinhvuc->id != Auth::user()->getchuyengia->getlinhvuc->id) {
                unset($value);
            }
        }
        // dd($danhsach);
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        return view('trangquanly.chuyengia.doanhnghiep.danhsach', compact('danhsach', 'thongbaos'));
    }
    public function getxemdoanhnghiep($id)
    {
        $user = Doanhnghiep::with(['getUser', 'getLoaiHinh'])->find($id);
        // dd($user);
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        $tendanhsach = 'Thông tin doanh nghiệp';
        return view('trangquanly.chuyengia.doanhnghiep.xem', compact('user', 'tendanhsach', 'thongbaos'));
    }
}
