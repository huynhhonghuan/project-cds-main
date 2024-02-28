<?php

namespace App\Http\Controllers\Chuyengia\Chienluoc;

use App\Http\Controllers\Controller;
use App\Models\Mohinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChienluocController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách chiến lược chuyển đổi số';
        $danhsach  = Mohinh::where('user_id', '=', null)->get();
        // dd($danhsach);
        // $loai = 1;
        return view('trangquanly.chuyengia.chienluoc.danhsach', compact('danhsach', 'tendanhsach'));
    }
    public function getdanhsachdexuat()
    {
        $tendanhsach = 'Danh sách đề xuất chiến lược chuyển đổi số';
        $danhsach  = Mohinh::where('user_id', '=', Auth::user()->id)->get();
        return view('trangquanly.chuyengia.chienluoc.danhsach', compact('danhsach', 'tendanhsach'));
    }
    public function getxem($id)
    {
        $danhsach  = Mohinh::find($id);
        $tendanhsach = 'Xem chi tiết chiến lược chuyển đổi số';
        $loai = 1; //admin
        if ($danhsach->user_id == Auth::user()->id)
            $loai = 2;
        return view('trangquanly.chuyengia.chienluoc.xem', compact('danhsach', 'tendanhsach', 'loai'));
    }
}
