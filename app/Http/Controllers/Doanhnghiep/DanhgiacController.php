<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhgiacController extends Controller
{
    public function getxem($id)
    {
        $tendanhsach = 'Chiến lược chuyển đổi số';
        $danhgia = Auth::user()->getkhaosat->getdanhgia;
        dd($danhgia);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.doanhnghiep.danhgia.xem', compact('tendanhsach', 'danhgia'));
    }
}
