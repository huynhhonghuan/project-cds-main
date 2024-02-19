<?php

namespace App\Http\Controllers\Admin\Trucot;

use App\Http\Controllers\Controller;
use App\Models\Mohinh_Trucot;
use Illuminate\Http\Request;

class TrucotController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Trụ cột chuyển đổi số';
        $trucot = Mohinh_Trucot::all();
        return view('trangquanly.admin.trucot.danhsach', compact('tendanhsach', 'trucot'));
    }
}
