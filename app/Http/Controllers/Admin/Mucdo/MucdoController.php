<?php

namespace App\Http\Controllers\Admin\Mucdo;

use App\Http\Controllers\Controller;
use App\Models\Mucdo;
use Illuminate\Http\Request;

class MucdoController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Mức độ chuyển đổi số';
        $mucdo = Mucdo::all();
        return view('trangquanly.admin.mucdo.danhsach', compact('tendanhsach','mucdo'));
    }
}
