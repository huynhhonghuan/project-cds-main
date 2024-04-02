<?php

namespace App\Http\Controllers\Admin\Chienluocchitiet;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep_Loaihinh;
use Illuminate\Http\Request;

class ChienluocchitietController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Chi tiết chiến lược chuyển đổi số';
        $danhsach = Doanhnghiep_Loaihinh::all();
        return view('trangquanly.admin.chienluoc-chitiet.danhsach', compact('tendanhsach', 'danhsach'));
    }
}
