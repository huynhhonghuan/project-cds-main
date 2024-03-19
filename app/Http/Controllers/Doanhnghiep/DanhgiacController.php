<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Khaosat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhgiacController extends Controller
{
    public function getxem($id)
    {
        $tendanhsach = 'Đánh giá chuyển đổi số';
        $danhsach = Khaosat::find($id);
        // $danhgia = null;
        // dd(count($danhsach->getdanhgia));
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.doanhnghiep.danhgia.xem', compact('tendanhsach', 'danhsach'));
    }
}
