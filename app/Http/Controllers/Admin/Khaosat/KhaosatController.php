<?php

namespace App\Http\Controllers\Admin\Khaosat;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep;
use Illuminate\Http\Request;

class KhaosatController extends Controller
{

    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách khảo sát của doanh nghiệp';
        $danhsach  = Doanhnghiep::all();
        return view('trangquanly.admin.khaosat.danhsach', compact('danhsach', 'tendanhsach'));
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
