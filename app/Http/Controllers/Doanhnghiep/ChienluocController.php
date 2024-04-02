<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Khaosat;
use Illuminate\Http\Request;

class ChienluocController extends Controller
{
    public function getxem($id)
    {
        // dd($id);
        $tendanhsach = 'Xem chi tiết chiến lược chuyển đổi số';
        $danhsach = Khaosat::find($id)->getchienluoc->getmohinh;
        return view('trangquanly.doanhnghiep.chienluoc.xem', compact('tendanhsach', 'danhsach'));
    }
}
