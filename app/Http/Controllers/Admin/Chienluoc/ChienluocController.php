<?php

namespace App\Http\Controllers\Admin\Chienluoc;

use App\Http\Controllers\Controller;
use App\Models\Mohinh;
use Illuminate\Http\Request;

class ChienluocController extends Controller
{

    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách chiến lược chuyển đổi số';
        $danhsach  = Mohinh::all();
        return view('trangquanly.admin.chienluoc.danhsach', compact('danhsach', 'tendanhsach'));
    }
    public function getxem($id)
    {
        $danhsach  = Mohinh::find($id);
        $tendanhsach = 'Xem chi tiết chiến lược chuyển đổi số';
        return view('trangquanly.admin.chienluoc.xem', compact('danhsach', 'tendanhsach'));
    }
    //     public function getthem()
    //     {
    //     }
    //     public function postthem(Request $request)
    //     {
    //     }
    //     public function getsua($id)
    //     {
    //     }
    //     public function postsua(Request $request, $id)
    //     {
    //     }
    //     public function postxoa(Request $request)
    //     {
    //     }
    //     public function getduyet($id)
    //     {
    //     }

}
