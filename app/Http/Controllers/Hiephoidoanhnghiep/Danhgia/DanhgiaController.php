<?php

namespace App\Http\Controllers\Hiephoidoanhnghiep\Danhgia;

use App\Http\Controllers\Controller;
use App\Models\Chuyengia_Danhgia;
use Illuminate\Http\Request;

class DanhgiaController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách đánh giá của chuyên gia';
        $danhsach = Chuyengia_Danhgia::orderBy('updated_at', 'desc')->get();
        return view('trangquanly.hiephoidoanhnghiep.danhgia.danhsach', compact('tendanhsach','danhsach'));
    }
}
