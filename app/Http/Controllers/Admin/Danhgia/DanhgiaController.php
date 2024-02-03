<?php

namespace App\Http\Controllers\Admin\Danhgia;

use App\Http\Controllers\Controller;
use App\Models\Chuyengia_Danhgia;
use Illuminate\Http\Request;

class DanhgiaController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách đánh giá của chuyên gia';
        $danhsach  = Chuyengia_Danhgia::all();
        // dd($danhsach[0]->getDoanhnghiep);
        // dd($danhsach);
        return view('trangquanly.admin.danhgia.danhsach', compact('tendanhsach','danhsach'));
    }
    public function getdanhsachnongnghiep()
    {
        $tendanhsach = 'Danh sách đánh giá của chuyên gia';
        $danhsach  = Chuyengia_Danhgia::all();
        return view('trangquanly.admin.danhgia.danhsach', compact('tendanhsach','danhsach'));
    }
    public function getdanhsachcongnghiep()
    {
        $tendanhsach = 'Danh sách đánh giá của chuyên gia';
        $danhsach  = Chuyengia_Danhgia::all();
        return view('trangquanly.admin.danhgia.danhsach', compact('tendanhsach','danhsach'));
    }
    public function getdanhsachthuongmaidichvu()
    {
        $tendanhsach = 'Danh sách đánh giá của chuyên gia';
        $danhsach  = Chuyengia_Danhgia::all();
        return view('trangquanly.admin.danhgia.danhsach', compact('tendanhsach','danhsach'));
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
