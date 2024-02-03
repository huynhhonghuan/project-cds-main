<?php

namespace App\Http\Controllers\Admin\Taikhoan;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep_Loaihinh;
use App\Models\User;
use App\Models\User_Vaitro;
use App\Models\Vaitro;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TaikhoanController extends Controller
{
    public function getdanhsach()
    {
        $danhsach  = User::all();
        // dd($danhsach[0]->getDuyet[0]->duyet_user_id);
        return view('trangquanly.admin.taikhoan.danhsach', compact('danhsach'));
    }
    public function getthem()
    {
        $vaitro = Vaitro::all();
        $loaihinh = Doanhnghiep_Loaihinh::all();
        return view('trangquanly.admin.taikhoan.them', compact('vaitro', 'loaihinh'));
    }
    public function postthem(Request $request, $loai)
    {
        if ($loai == 'ctv') {
            $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'password' => ['required', 'min:8', 'confirmed'],
            ]);

            $orm = new User();
            $orm->name = $request->name;
            $orm->email = $request->email;
            $orm->password = Hash::make($request->password);
            $orm->status = 'Active';
            $orm->save();

            $user_vaitro = new User_Vaitro();
            $user_vaitro->user_id = $orm->id;
            $user_vaitro->vaitro_id = 'ctv';
            $user_vaitro->save();

            Toastr::success('Thêm tài khoản cộng tác viên thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }

        if ($loai == 'dn') {
            dd($request);
            $request->validate([
                'email' => ['required', 'string', 'email', 'unique:users'],
                'password' => ['required', 'min:8', 'confirmed'],
                'tentiengviet' => ['required','string'],
                'tentienganh' => ['required', 'string'],
                'tenviettat' => ['required', 'string'],
                'doanhnghiep_email' => ['required', 'string', 'email', 'unique:doanhnghiep'],
                'doanhnghiep_diachi' => ['string'],
                'mathue' => ['required','string'],
                'fax' =>['required','string'],
                'soluongnhansu' => ['required','int'],
                'ngaylap' => ['required','string'],
                'mota' => ['string'],
            ]);

            Toastr::success('Thêm tài khoản doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }
    }
    public function getsua($id)
    {
    }
    public function postsua(Request $request, $id)
    {
    }
    public function postxoa(Request $request)
    {
        $user_vaitro = User_Vaitro::where('user_id', $request->id)->first();
        $user_vaitro->delete();
        User::destroy($request->id);
        Toastr::success('Xoá tài khoản thành công', 'Success');
        return redirect()->route('admin.taikhoan.danhsach');
    }
    public function postduyet(Request $request)
    {
        $user = User::find($request->id);
        $user->status == 'Active' ? ($user->status = 'Inactive') : ($user->status = 'Active');
        $user->save();

        Toastr::success('Duyệt thành công:)', 'Success');
        return redirect()->route('admin.taikhoan.danhsach');
    }
}

// public function getdanhsach()
//     {
//         $tendanhsach = 'Loại hình hoạt động của doanh nghiệp';
//         $danhsach  = User::all();
//         return view('trangquanly.admin.taikhoan.danhsach', compact('danhsach'));
//     }
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
