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
        return view('trangquanly.admin.loaihinhdoanhnghiep.danhsach', compact('tendanhsach', 'danhsach', 'linhvuc'));
    }
    public function getthem()
    {
        $tendanhsach = 'Thêm loại hình hoạt động của doanh nghiệp';
        $linhvuc = Linhvuc::all();
        return view('trangquanly.admin.loaihinhdoanhnghiep.them', compact('tendanhsach', 'linhvuc'));
    }
    public function postthem(Request $request)
    {
        $request->validate([
            'tenloaihinh' => 'required|string',
            'linhvuc_id' => 'required|string|exists:linhvuc,id',
            'hinhanh' => 'image',
        ]);
        $doanhnghiep_loaihinh = Doanhnghiep_Loaihinh::create([
            'tenloaihinh' => $request->tenloaihinh,
            'linhvuc_id' => $request->linhvuc_id,
            'mota' => null,
        ]);
        $this->luuhinhanh($request, $doanhnghiep_loaihinh, "loaihinh", "hinhanh", "hinhanh", "assets/backend/img/loaihinhdoanhnghiep/"); //gọi function lưu hình ảnh
        return redirect()->route('admin.loaihinhdoanhnghiep.danhsach');
    }
    public function getsua($id)
    {
        $tendanhsach = 'Sửa loại hình hoạt động của doanh nghiệp';
        $danhsach  = Doanhnghiep_Loaihinh::find($id);
        $linhvuc = Linhvuc::all();
        return view('trangquanly.admin.loaihinhdoanhnghiep.sua', compact('tendanhsach', 'linhvuc', 'danhsach'));
    }
    public function postsua(Request $request, $id)
    {
        $request->validate([
            'tenloaihinh' => 'required|string',
            'linhvuc_id' => 'required|string|exists:linhvuc,id',
            'hinhanh' => 'image',
        ]);
        $doanhnghiep_loaihinh  = Doanhnghiep_Loaihinh::find($id);
        $doanhnghiep_loaihinh->update([
            'tenloaihinh' => $request->tenloaihinh,
            'linhvuc_id' => $request->linhvuc_id,
        ]);
        $this->suahinhanh($request, $doanhnghiep_loaihinh, "loaihinh", "hinhanh", "hinhanh", "assets/backend/img/loaihinhdoanhnghiep/");
        return redirect()->route('admin.loaihinhdoanhnghiep.danhsach');
    }
    public function postxoa(Request $request)
    {
        $doanhnghiep_loaihinh = Doanhnghiep_Loaihinh::find($request->id);
        $this->xoahinhanh($doanhnghiep_loaihinh, "hinhanh", "assets/backend/img/loaihinhdoanhnghiep/");
        Doanhnghiep_Loaihinh::destroy($request->id);
        return redirect()->route('admin.loaihinhdoanhnghiep.danhsach');
    }
    //dùng để lưu hình ảnh vào public
    public function luuhinhanh($request, $model, $nameprofile, $namefile, $namecolumn, $duongdan)
    {
        if ($img = $request->file($namefile)) {
            $Path = $duongdan;
            $profileImage = $nameprofile . "-" . $model->id . "."  . $img->getClientOriginalExtension();
            $img->move($Path, $profileImage);
            $model->$namecolumn = "$profileImage";
            $model->save();
        }
    }
    public function suahinhanh($request, $model, $nameprofile, $namefile, $namecolumn, $duongdan)
    {
        if ($img = $request->file($namefile)) {

            //xóa ảnh cũ nếu có
            if ($model->$namecolumn != null && file_exists($duongdan . '/' . $model->$namecolumn)) {
                unlink($duongdan . '/' . $model->$namecolumn);
            }

            $Path = $duongdan;
            $profileImage = $nameprofile . "-" . $model->id . "."  . $img->getClientOriginalExtension();
            $img->move($Path, $profileImage);
            $model->$namecolumn = "$profileImage";
            $model->save();
        }
    }
    public function xoahinhanh($model, $namecolumn, $duongdan)
    {
        if ($model->$namecolumn != null && file_exists($duongdan . '/' . $model->$namecolumn)) {
            unlink($duongdan . '/' . $model->$namecolumn);
        }
    }
}
