<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chuyengia_Danhgia;
use App\Models\Khaosat;
use App\Models\Mohinh;
use App\Models\Mohinh_Doanhnghiep_Trucot;
use App\Models\User;
use App\Models\User_Vaitro;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $colors = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 172, 255, 0.2)'
        ];
        $taikhoan_labels = ['Doanh nghiệp', 'Chuyên gia', 'Hiệp hội doanh nghiệp', 'Cộng tác viên'];
        $taikhoan_soluong = count(User::all());
        $dn = User_Vaitro::where('vaitro_id', 'dn')->get();
        $cg = User_Vaitro::where('vaitro_id', 'cg')->get();
        $hhdn = User_Vaitro::where('vaitro_id', 'hhdn')->get();
        $ctv = User_Vaitro::where('vaitro_id', 'ctv')->get();
        $tk = [count($dn), count($cg), count($hhdn), count($ctv)];

        $taikhoan = [
            'id' => 1,
            'soluong' => $taikhoan_soluong,
            'colors' => $colors,
            'labels' => $taikhoan_labels,
            'taikhoan' => $tk,
        ];

        $chienluoc_soluong = count(Mohinh::all());
        // $sl = 0;
        // $cl = Mohinh_Doanhnghiep_Trucot::all();
        // $cl_nn = 0;
        // $cl_cn = 0;
        // $cl_tmdv = 0;
        // $cl_kh = 0;
        // foreach ($cl as $item) {
        //     $item->getloaihinh->linhvuc_id == 'nn' ? $cl_nn++ : '';
        //     $item->getloaihinh->linhvuc_id == 'cn' ? $cl_cn++ : '';
        //     $item->getloaihinh->linhvuc_id == 'tmdv' ? $cl_tmdv++ : '';
        //     $item->getloaihinh->linhvuc_id == 'kh' ? $cl_kh++ : '';
        // }

        // $chienluoc = [
        //     'soluong' => $chienluoc_soluong,
        //     'colors' => $colors,
        //     'labels' => $chienluoc_labels,
        //     'chienluoc' => [$cl_nn, $cl_cn, $cl_tmdv, $cl_kh],
        // ];

        $khaosat_labels = ['Nông nghiệp', 'Công nghiệp', 'Thương mại và dịch vụ', 'Khác'];
        $kh_nn = 0;
        $kh_cn = 0;
        $kh_tmdv = 0;
        $kh_kh = 0;
        foreach (Khaosat::all() as $item) {
            $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'nn' ? $kh_nn++ : '';
            $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'cn' ? $kh_cn++ : '';
            $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'tmdv' ? $kh_tmdv++ : '';
            $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'kh' ? $kh_kh++ : '';
        }

        $khaosat = [
            'id' => 2,
            'soluong' => count(Khaosat::all()),
            'colors' => $colors,
            'labels' => $khaosat_labels,
            'khaosat' => [$kh_nn, $kh_cn, $kh_tmdv, $kh_kh],
        ];

        $danhgia_soluong = count(Chuyengia_Danhgia::all());
        return view('trangquanly.admin.home', compact('taikhoan', 'chienluoc_soluong', 'khaosat', 'danhgia_soluong'));
    }
    //profile
    public function profile()
    {
        return view('trangquanly.admin.profile');
    }

    public function doimatkhau(Request $request, $id)
    {
        $request->validate([
            'password_old' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::find($id);
        if (Hash::check($request->password_old, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            Toastr::success('Đổi mật khẩu thành công', 'Success');
            return redirect()->route('admin.profile');
        } else {
            Toastr::warning('Đổi mật khẩu thất bại!', 'Warning');
            return redirect()->route('admin.profile');
        }
    }
}
