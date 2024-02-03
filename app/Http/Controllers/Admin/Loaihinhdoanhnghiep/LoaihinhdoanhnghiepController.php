<?php

namespace App\Http\Controllers\Admin\Loaihinhdoanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep_Loaihinh;
use App\Models\Linhvuc;
use Illuminate\Http\Request;

class LoaihinhdoanhnghiepController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Loại hình hoạt động của doanh nghiệp';
        $danhsach  = Doanhnghiep_Loaihinh::all();
        $linhvuc = Linhvuc::all();
        return view('trangquanly.admin.loaihinhdoanhnghiep.danhsach', compact('tendanhsach','danhsach','linhvuc'));
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
