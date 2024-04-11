<?php

namespace App\Http\Controllers\Admin\Danhgia;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep;
use App\Models\Khaosat;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DanhgiaController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách đánh giá của chuyên gia';
        $danhsach = Doanhnghiep::orderBy('updated_at', 'desc')->get();
        return view('trangquanly.admin.danhgia.danhsach', compact('tendanhsach', 'danhsach'));
    }
    public function getxemdanhgia($id)
    {
        $khaosat = Khaosat::find($id);
        $tendanhsach = 'Xem chi tiết đánh giá';
        if ($khaosat != null && $khaosat->trangthai == 2) {
            $danhsach  = $khaosat;
            return view('trangquanly.admin.danhgia.xemdanhgia', compact('danhsach', 'tendanhsach'));
        } else if ($khaosat != null && $khaosat->trangthai == 0) {
            Toastr::warning('Chưa có đánh giá và góp!', 'Warning');
            return redirect()->route('admin.danhgia.danhsach');
        } else {
            Toastr::warning('Chưa có đánh giá và góp!', 'Warning');
            return redirect()->route('admin.danhgia.danhsach');
        }
    }
}
