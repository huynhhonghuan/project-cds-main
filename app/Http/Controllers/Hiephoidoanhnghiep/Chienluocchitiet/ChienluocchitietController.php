<?php

namespace App\Http\Controllers\Hiephoidoanhnghiep\Chienluocchitiet;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep_Loaihinh;
use App\Models\Mohinh;
use App\Models\Mohinh_Trucot;
use Illuminate\Http\Request;

class ChienluocchitietController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Chi tiết chiến lược chuyển đổi số';
        $danhsach = Doanhnghiep_Loaihinh::all();
        $mohinh_trucot = Mohinh_Trucot::all();
        $mohinh = Mohinh::all();
        return view('trangquanly.hiephoidoanhnghiep.chienluoc-chitiet.danhsach', compact('tendanhsach', 'danhsach', 'mohinh_trucot', 'mohinh'));
    }
    public function getxem($id)
    {
        $danhsach  = Mohinh::find($id);
        $tendanhsach = 'Xem chi tiết chiến lược chuyển đổi số';
        return view('trangquanly.hiephoidoanhnghiep.chienluoc.xem', compact('danhsach', 'tendanhsach'));
    }
}
