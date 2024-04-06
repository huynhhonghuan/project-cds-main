<?php

namespace App\Http\Controllers\Chuyengia\Chienluoc;

use App\Http\Controllers\Controller;
use App\Models\Mohinh;
use App\Models\Mohinh_Lotrinh;
use Brian2694\Toastr\Facades\Toastr;
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
    public function getthem()
    {
        return view('trangquanly.chuyengia.chienluoc.them');
    }
    public function postthem(Request $request)
    {
        $request->validate([
            'tenmohinh' => 'required|string',
            'hinhanh' => 'nullable|image',
            'thoigian' => 'required|string',
            'nhansu' => 'required|string',
            'taichinh' => 'required|string',
            'noidung_mota' => 'required|string',
            'noidung_lotrinh'  => 'required|string',
            'luuy'  => 'nullable|string',
        ]);
        $mohinh = Mohinh::create([
            'user_id' => Auth::user()->id,
            'tenmohinh' => $request->tenmohinh,
            'noidung' => $request->noidung_mota,
        ]);
        $this->luuhinhanh($request, $mohinh, 'mohinh', 'hinhanh', 'hinhanh', "assets/backend/img/mohinh/");
        $lotring = Mohinh_Lotrinh::create([
            'mohinh_id' => $mohinh->id,
            'thoigian' => $request->thoigian,
            'nhansu' => $request->nhansu,
            'taichinh' => $request->taichinh,
            'noidung' => $request->noidung_lotrinh,
            'luuy' => $request->luuy,
        ]);

        Toastr::success('Thêm mô hình thành công', 'success');
        return redirect()->route('chuyengia.chienluoc.danhsachdexuat');
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
