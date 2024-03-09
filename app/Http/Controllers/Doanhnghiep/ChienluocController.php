<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Khaosat;
use Illuminate\Http\Request;

class ChienluocController extends Controller
{
    public function getxem($id)
    {

        $tendanhsach = 'Chiến lược chuyển đổi số';
        $chienluoc = Khaosat::find($id)->getchienluoc;
        dd($chienluoc);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.doanhnghiep.chienluoc.xem', compact('tendanhsach', 'chienluoc'));
    }
}
