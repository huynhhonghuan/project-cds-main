<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Khaosat;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use Auth;

class ChienluocController extends Controller
{
    public function getxem($id)
    {
        // dd($id);
        $tendanhsach = 'Xem chi tiết chiến lược chuyển đổi số';
        $danhsach = Khaosat::find($id)->getchienluoc->getmohinh;
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        return view('trangquanly.doanhnghiep.chienluoc.xem', compact('tendanhsach', 'danhsach','thongbaos'));
    }
}
