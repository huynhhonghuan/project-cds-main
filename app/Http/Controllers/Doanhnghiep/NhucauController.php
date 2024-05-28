<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Exports\Taikhoan\Doanhnghiep;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\BaiViet_Anh;
use Illuminate\Support\Facades\Auth;
use App\Models\ThongBao;
use App\Models\NhuCau;

class NhucauController extends Controller
{
    public function __construct()
    {
        
    }

    public function nhucau(Request $request) {
        $user_id = Auth::user()->id;
        $nhucau = BaiViet::all()->where('user_id', $user_id);
    
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        // dd($sanpham);
        return view('trangquanly.doanhnghiep.nhucau.danhsach', compact('nhucau','thongbaos'));
    }

    public function getthem()
    {
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        $nhucau = BaiViet::all()->where('user_id', $user_id);

        return view('trangquanly.doanhnghiep.nhucau.them', compact('nhucau','thongbaos'));
    }

    public function postthem(Request $request)
    {
        //kiểm tra dữ liệu từ form
        $request->validate([
            'noidung' => 'required',
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user_id = Auth::user()->id;

        $nhucau = new BaiViet();
        $nhucau->noidung = $request->noidung;
        $nhucau->user_id = $user_id;
        $nhucau->save();
        // //Thêm dữ liệu vào csdl
        //thêm hình ảnh vào publish theo đường dẫn và sử lý lưu tên hình thay thế bằng năm tháng ngày giờ phút giây
        if ($image = $request->file('hinhanh')) {
            $destinationPath = 'assets/frontend/img/diendan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            // $input['hinhanh'] = "$profileImage";

            // $sanpham_id = $input->id;
            $hinhanhnc = new BaiViet_Anh();
            $hinhanhnc->baiviet_id = $nhucau->id;
            $hinhanhnc->hinhanh = $profileImage;
            $hinhanhnc->save();
        }
        $hinhanh = BaiViet_Anh::all();
        Toastr::success('Thêm thành công:)', 'Success');
        return redirect()->route('doanhnghiep.nhucau.danhsach', compact('hinhanh'));
    }

    // Xóa Banner
    public function postxoa(Request $request)
    {
        //xóa dữ liệu trong csdl
        BaiViet::destroy($request->id);

        unlink('assets/frontend/img/diendan/'.$request->hinhanh);
        Toastr::success('Xóa nhu cầu thành công :)', 'Success');
        return redirect()->back();
    }
}
