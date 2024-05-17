<?php

namespace App\Http\Controllers\Admin\Nganhnghe;

use App\Http\Controllers\Controller;
use App\Models\NganhNghe;
use Illuminate\Http\Request;

class NganhngheController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Ngành nghề của doanh nghiệp';
        $danhsach  = NganhNghe::all();

        return view('trangquanly.admin.loaihinhdoanhnghiep.danhsach', compact('tendanhsach', 'danhsach', 'linhvuc'));
    }
    // public function getthem()
    // {
    //     $tendanhsach = 'Thêm loại hình hoạt động của doanh nghiệp';
    //     return view('trangquanly.admin.loaihinhdoanhnghiep.them', compact('tendanhsach', 'linhvuc'));
    // }
    // public function postthem(Request $request)
    // {
    //     $request->validate([
    //         'tenloaihinh' => 'required|string',
    //         'linhvuc_id' => 'required|string|exists:linhvuc,id',
    //         'hinhanh' => 'image',
    //     ]);
    //     $doanhnghiep_loaihinh = Doanhnghiep_Loaihinh::create([
    //         'tenloaihinh' => $request->tenloaihinh,
    //         'linhvuc_id' => $request->linhvuc_id,
    //         'mota' => null,
    //     ]);
    //     $this->luuhinhanh($request, $doanhnghiep_loaihinh, "loaihinh", "hinhanh", "hinhanh", "assets/backend/img/loaihinhdoanhnghiep/"); //gọi function lưu hình ảnh
    //     return redirect()->route('admin.loaihinhdoanhnghiep.danhsach');
    // }
    // public function getsua($id)
    // {
    //     $tendanhsach = 'Sửa loại hình hoạt động của doanh nghiệp';
    //     $danhsach  = Doanhnghiep_Loaihinh::find($id);
    //     $linhvuc = Linhvuc::all();
    //     return view('trangquanly.admin.loaihinhdoanhnghiep.sua', compact('tendanhsach', 'linhvuc', 'danhsach'));
    // }
    // public function postsua(Request $request, $id)
    // {
    //     $request->validate([
    //         'tenloaihinh' => 'required|string',
    //         'linhvuc_id' => 'required|string|exists:linhvuc,id',
    //         'hinhanh' => 'image',
    //     ]);
    //     $doanhnghiep_loaihinh  = Doanhnghiep_Loaihinh::find($id);
    //     $doanhnghiep_loaihinh->update([
    //         'tenloaihinh' => $request->tenloaihinh,
    //         'linhvuc_id' => $request->linhvuc_id,
    //     ]);
    //     $this->suahinhanh($request, $doanhnghiep_loaihinh, "loaihinh", "hinhanh", "hinhanh", "assets/backend/img/loaihinhdoanhnghiep/");
    //     return redirect()->route('admin.loaihinhdoanhnghiep.danhsach');
    // }
    // public function postxoa(Request $request)
    // {
    //     $doanhnghiep_loaihinh = Doanhnghiep_Loaihinh::find($request->id);
    //     $this->xoahinhanh($doanhnghiep_loaihinh, "hinhanh", "assets/backend/img/loaihinhdoanhnghiep/");
    //     Doanhnghiep_Loaihinh::destroy($request->id);
    //     return redirect()->route('admin.loaihinhdoanhnghiep.danhsach');
    // }
}
