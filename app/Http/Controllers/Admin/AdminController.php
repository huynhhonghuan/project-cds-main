<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Taikhoan\Doanhnghiep;
use App\Http\Controllers\Api\TaiKhoanController;
use App\Http\Controllers\Controller;
use App\Models\Chuyengia_Danhgia;
use App\Models\Khaosat;
use App\Models\Mohinh;
use App\Models\Mohinh_Doanhnghiep_Trucot;
use App\Models\User;
use App\Models\Doanhnghiep as dnghiep;
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

        $khaosat_labels = ['Nông nghiệp', 'Công nghiệp', 'Thương mại và dịch vụ', 'Khác'];
        $kh_nn = 0;
        $kh_cn = 0;
        $kh_tmdv = 0;
        $kh_kh = 0;
        
        foreach (Khaosat::all() as $item) {
            if ($item->getdoanhnghiep->getloaihinh) {
                $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'nn' ? $kh_nn++ : '';
                $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'cn' ? $kh_cn++ : '';
                $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'tmdv' ? $kh_tmdv++ : '';
                $item->getdoanhnghiep->getloaihinh->linhvuc_id == 'kh' ? $kh_kh++ : '';
            }
        }

        $khaosat = [
            'id' => 2,
            'soluong' => count(Khaosat::all()),
            'colors' => $colors,
            'labels' => $khaosat_labels,
            'khaosat' => [$kh_nn, $kh_cn, $kh_tmdv, $kh_kh],
        ];

        $danhgia_soluong = count(Chuyengia_Danhgia::all());

        // thống kế số lượng khảo sát theo các huyện
        $khaosat_huyen_lables = [
            'Long Xuyên', //883
            'Châu Đốc', //884
            'An Phú', //886
            'Tân Châu', //887
            'Phú Tân', //888
            'Châu Phú', //889
            'Tịnh Biên', //890
            'Tri Tôn', //891
            'Châu Thành', //892
            'Chợ Mới', //893
            'Thoại Sơn' //894
        ];
        $lx = 0;
        $cd = 0;
        $ap = 0;
        $tc = 0;
        $pt = 0;
        $cp = 0;
        $tb = 0;
        $tt = 0;
        $ct = 0;
        $cm = 0;
        $ts = 0;

        foreach (Khaosat::all() as $item) {
            $item->getdoanhnghiep->huyen == 883 ? $lx++ : '';
            $item->getdoanhnghiep->huyen == 884 ? $cd++ : '';
            $item->getdoanhnghiep->huyen == 886 ? $ap++ : '';
            $item->getdoanhnghiep->huyen == 887 ? $tc++ : '';
            $item->getdoanhnghiep->huyen == 888 ? $pt++ : '';
            $item->getdoanhnghiep->huyen == 889 ? $cp++ : '';
            $item->getdoanhnghiep->huyen == 890 ? $tb++ : '';
            $item->getdoanhnghiep->huyen == 891 ? $tt++ : '';
            $item->getdoanhnghiep->huyen == 892 ? $ct++ : '';
            $item->getdoanhnghiep->huyen == 893 ? $cm++ : '';
            $item->getdoanhnghiep->huyen == 894 ? $ts++ : '';
        }

        $khaosat_huyen = [
            'id' => 3,
            'colors' => $colors,
            'labels' => $khaosat_huyen_lables,
            'khaosat' => [$lx, $cd, $ap, $tc, $pt, $cp, $tb, $tt, $ct, $cm, $ts],
        ];
        // dd($khaosat_huyen);

        //Biểu đồ thống kê mức độ khảo sát trung bình của các doanh nghiệp
        $lx_diem = 0;
        $cd_diem = 0;
        $ap_diem = 0;
        $tc_diem = 0;
        $pt_diem = 0;
        $cp_diem = 0;
        $tb_diem = 0;
        $tt_diem = 0;
        $ct_diem = 0;
        $cm_diem = 0;
        $ts_diem = 0;

        foreach (Khaosat::all() as $item) {
            $item->getdoanhnghiep->huyen == 883 ? $lx_diem += $item->tongdiem : '';
            $item->getdoanhnghiep->huyen == 884 ? $cd_diem += $item->tongdiem : '';
            $item->getdoanhnghiep->huyen == 886 ? $ap_diem += $item->tongdiem : '';
            $item->getdoanhnghiep->huyen == 887 ? $tc_diem += $item->tongdiem : '';
            $item->getdoanhnghiep->huyen == 888 ? $pt_diem += $item->tongdiem : '';
            $item->getdoanhnghiep->huyen == 889 ? $cp_diem += $item->tongdiem : '';
            $item->getdoanhnghiep->huyen == 890 ? $tb_diem += $item->tongdiem : '';
            $item->getdoanhnghiep->huyen == 891 ? $tt_diem += $item->tongdiem : '';
            $item->getdoanhnghiep->huyen == 892 ? $ct_diem += $item->tongdiem : '';
            $item->getdoanhnghiep->huyen == 893 ? $cm_diem += $item->tongdiem : '';
            $item->getdoanhnghiep->huyen == 894 ? $ts_diem += $item->tongdiem : '';
        }
        // $data2_line = ($lx_diem + $cd_diem + $ap_diem + $tc_diem + $pt_diem + $cp_diem + $tb_diem + $tt_diem + $ct_diem + $cm_diem + $ts_diem);
        $data2_line =  Khaosat::avg('tongdiem');
        $mucdo_huyen = [
            'id' => 4,
            'colors' => $colors,
            'labels' => $khaosat_huyen_lables,
            'data1' => [
                $lx_diem > 0 ? round($lx_diem / $lx) : 0,
                $cd_diem > 0 ? round($cd_diem / $cd) : 0,
                $ap_diem > 0 ? round($ap_diem / $ap) : 0,
                $tc_diem > 0 ? round($tc_diem / $tc) : 0,
                $pt_diem > 0 ? round($pt_diem / $pt) : 0,
                $cp_diem > 0 ? round($cp_diem / $cp) : 0,
                $tb_diem > 0 ? round($tb_diem / $tb) : 0,
                $tt_diem > 0 ? round($tt_diem / $tt) : 0,
                $ct_diem > 0 ? round($ct_diem / $ct) : 0,
                $cm_diem > 0 ? round($cm_diem / $cm) : 0,
                $ts_diem > 0 ? round($ts_diem / $ts) : 0,
            ],
            'data2' => [$data2_line, $data2_line, $data2_line, $data2_line, $data2_line, $data2_line, $data2_line, $data2_line, $data2_line, $data2_line, $data2_line],
        ];
        // dd($mucdo_huyen);
        return view('trangquanly.admin.home', compact('taikhoan', 'chienluoc_soluong', 'khaosat', 'danhgia_soluong', 'khaosat_huyen', 'mucdo_huyen'));
    }
    //profile
    public function profile()
    {
        return view('trangquanly.admin.profile');
    }

    public function dsdn(Request $request)
    {
        $danhsach = dnghiep::all();
        // dd($danhsach);

        return view('trangquanly.admin.doanhnghiep.dsdoanhnghiep', compact('danhsach'));
    }

    public function xemdn(Request $request)
    {
        $danhsach = dnghiep::all();
        // dd($danhsach);

        return view('trangquanly.admin.doanhnghiep.dsdoanhnghiep', compact('danhsach'));
    }

    public function getxemdn($id)
    {
        $user = User::find($id);

        // dd($user);
        return view('trangquanly.admin.doanhnghiep.xem', compact('user'));
    }

    public function getthongke(Request $request)
    {

        
        return view('trangquanly.admin.doanhnghiep.thongke');
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
