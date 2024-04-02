<?php

namespace App\Http\Controllers\Admin\Linhvuc;

use App\Http\Controllers\Controller;
use App\Models\Linhvuc;
use Illuminate\Http\Request;

class LinhvucController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách lĩnh vực';
        $danhsach  = Linhvuc::all();
        return view('trangquanly.admin.linhvuc.danhsach', compact('tendanhsach','danhsach'));
    }
}
