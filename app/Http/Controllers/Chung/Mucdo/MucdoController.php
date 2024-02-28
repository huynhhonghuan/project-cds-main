<?php

namespace App\Http\Controllers\Chung\Mucdo;

use App\Http\Controllers\Controller;
use App\Models\Mucdo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MucdoController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Mức độ chuyển đổi số';
        $mucdo = Mucdo::all();
        $layout = '';
        if (Auth::user()->getvaitro[0]->id == 'ad') {
            $layout = 'trangquanly.admin.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'dn') {
            $layout = 'trangquanly.doanhnghiep.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'cg') {
            $layout = 'trangquanly.chuyengia.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'hhdn') {
            $layout = 'trangquanly.hiephoidoanhnghiep.layout';
        }
        if ($layout != null)
            return view('trangquanly.chung.mucdo.danhsach', compact('tendanhsach', 'mucdo', 'layout'));
    }
}
