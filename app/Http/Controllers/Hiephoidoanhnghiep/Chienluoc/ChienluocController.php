<?php

namespace App\Http\Controllers\Hiephoidoanhnghiep\Chienluoc;

use App\Http\Controllers\Controller;
use App\Models\Mohinh;
use Illuminate\Http\Request;

class ChienluocController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách chiến lược chuyển đổi số';
        $danhsach  = Mohinh::all();
        return view('trangquanly.hiephoidoanhnghiep.chienluoc.danhsach', compact('danhsach', 'tendanhsach'));
    }
    public function getxem($id)
    {
        $danhsach  = Mohinh::find($id);
        $tendanhsach = 'Xem chi tiết chiến lược chuyển đổi số';
        return view('trangquanly.hiephoidoanhnghiep.chienluoc.xem', compact('danhsach', 'tendanhsach'));
    }
}
