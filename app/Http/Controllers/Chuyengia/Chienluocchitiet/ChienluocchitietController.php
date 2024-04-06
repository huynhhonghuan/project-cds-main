<?php

namespace App\Http\Controllers\Chuyengia\Chienluocchitiet;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep_Loaihinh;
use App\Models\Mohinh;
use App\Models\Mohinh_Doanhnghiep_Trucot;
use App\Models\Mohinh_Trucot;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ChienluocchitietController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Chi tiết chiến lược chuyển đổi số';
        $danhsach = Doanhnghiep_Loaihinh::all();
        $mohinh_trucot = Mohinh_Trucot::all();
        $mohinh = Mohinh::all();
        return view('trangquanly.chuyengia.chienluoc-chitiet.danhsach', compact('tendanhsach', 'danhsach', 'mohinh_trucot', 'mohinh'));
    }
    public function getxem($id)
    {
        $danhsach  = Mohinh::find($id);
        $tendanhsach = 'Xem chi tiết chiến lược chuyển đổi số';
        return view('trangquanly.chuyengia.chienluoc.xem', compact('danhsach', 'tendanhsach'));
    }
    public function postthem(Request $request)
    {
        $request->validate([
            'mohinh_id' => 'required|exists:mohinh,id',
            'iddoanhnghieploaihinh' => 'required|exists:doanhnghiep_loaihinh,id',
            'idmohinhtrucot' => 'required|exists:mohinh_trucot,id'
        ]);
        // dd($request);
        Mohinh_Doanhnghiep_Trucot::create([
            'mohinh_id' => $request->mohinh_id,
            'doanhnghiep_loaihinh_id' => $request->iddoanhnghieploaihinh,
            'mohinh_trucot_id' => $request->idmohinhtrucot
        ]);
        Toastr::success('Thêm mô hình cho loại hình doanh nghiệp thành công', 'success');
        return redirect()->route('chuyengia.chienluocchitiet.danhsach');
    }
    public function postsua(Request $request)
    {
        $request->validate([
            'idmohinhdoanhnghieptrucot' => 'required|exists:mohinh_doanhnghiep_trucot,id',
            'mohinh_id1' => 'required|exists:mohinh,id',
            // 'iddoanhnghieploaihinh' => 'required|exists:doanhnghiep_loaihinh,id',
            // 'idmohinhtrucot' => 'required|exists:mohinh_trucot,id'
        ]);
        // dd($request);
        $up = Mohinh_Doanhnghiep_Trucot::find($request->idmohinhdoanhnghieptrucot);
        $up->update([
            'mohinh_id' => $request->mohinh_id1,
            // 'doanhnghiep_loaihinh_id' => $request->iddoanhnghieploaihinh,
            // 'mohinh_trucot_id' => $request->idmohinhtrucot
        ]);
        Toastr::success('Thay thế mô hình cho loại hình doanh nghiệp thành công', 'success');
        return redirect()->route('chuyengia.chienluocchitiet.danhsach');
    }
}
