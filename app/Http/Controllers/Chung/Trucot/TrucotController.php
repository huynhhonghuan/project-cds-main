<?php

namespace App\Http\Controllers\Chung\Trucot;

use App\Http\Controllers\Controller;
use App\Models\Mohinh_Trucot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrucotController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Trụ cột chuyển đổi số';
        $trucot = Mohinh_Trucot::all();

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
            return view('trangquanly.chung.trucot.danhsach', compact('tendanhsach', 'trucot', 'layout'));
    }
}
