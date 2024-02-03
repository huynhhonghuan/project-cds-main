<?php

namespace App\Http\Controllers\Admin\Taikhoan;

use App\Http\Controllers\Controller;
use App\Models\Vaitro;
use Illuminate\Http\Request;

class VaitroController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách vai trò';
        $danhsach  = Vaitro::all();
        // dd($danhsach);
        return view('trangquanly.admin.vaitro.danhsach', compact('tendanhsach', 'danhsach'));
    }
    public function getthem()
    {
    }
    public function postthem(Request $request)
    {
    }
    public function getsua($id)
    {
    }
    public function postsua(Request $request, $id)
    {
    }
    public function postxoa(Request $request)
    {
    }
    public function getduyet($id)
    {
    }
}
