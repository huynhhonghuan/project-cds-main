<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Ketquaphieu1;
use App\Models\Khaosat;
use App\Models\Mohinh_Trucot;
use App\Models\Mucdo;
use App\Models\User;
use App\Models\Doanhnghiep;
use App\Models\Sanpham;
use App\Models\ThongBao;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoanhnghiepController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //home doanh nghiệp
    public function home()
    {
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();

        $khaosat1 = Auth::user()->getdoanhnghiep->getkhaosat;
        //Biểu đồ tròn
        $trucot1 = Mohinh_Trucot::all();
        $trucot_labels = $trucot1->pluck('tentrucot');

        //Biểu đồ đường
        $mucdo1 = Mucdo::all();
        $mucdo_labels = $mucdo1->pluck('tenmucdo');
        $mucdo_labels->prepend('Chưa bắt đầu');

        $colors = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 172, 255, 0.2)'
        ];

        $trucot = [];
        $mucdo = [];
        $khaosat = [];

        foreach ($khaosat1 as $key => $it) {
            // lấy giá trị trụ cột
            // if ($it->getdanhsachphieu1->getketquaphieu1)
            //     $trucot = [
            //         $it->getdanhsachphieu1->getketquaphieu1[0]->phantram,
            //         $it->getdanhsachphieu1->getketquaphieu1[1]->phantram,
            //         $it->getdanhsachphieu1->getketquaphieu1[2]->phantram,
            //         $it->getdanhsachphieu1->getketquaphieu1[3]->phantram,
            //         $it->getdanhsachphieu1->getketquaphieu1[4]->phantram,
            //         $it->getdanhsachphieu1->getketquaphieu1[5]->phantram,
            //     ];
            //tính toán giá trị mức độ
            if ($it->trangthai != 0) {
                $it->tongdiem == 0 ? $mucdo = [0] : '';
                ($it->tongdiem > 0 && $it->tongdiem <= 64) ? $mucdo = [0, $it->tongdiem] : '';
                ($it->tongdiem > 64 && $it->tongdiem <= 128) ? $mucdo = [0, 64, $it->tongdiem] : '';
                ($it->tongdiem > 128 && $it->tongdiem <= 192) ? $mucdo = [0, 64, 128, $it->tongdiem] : '';
                ($it->tongdiem > 192 && $it->tongdiem <= 256) ? $mucdo = [0, 64, 128, 192, $it->tongdiem] : '';
                ($it->tongdiem == 320) ? $mucdo = [0, 64, 128, 192, 256, 320] : '';
            }
            $khaosat[] = [
                'id' => $it->id,
                'lan' => $key + 1,
                'trangthai' => $it->trangthai,
                'tongdiem' => $it->tongdiem,
                'soluongdanhgia' => count($it->getdanhgia),
                'colors' => $colors,
                'trucot_labels' => $trucot_labels,
                'trucot' => $trucot,
                'mucdo_labels' => $mucdo_labels,
                'mucdo' => $mucdo,
            ];
            $trucot = [];
            $mucdo = [];
        }


        return view('trangquanly.doanhnghiep.home', compact('khaosat', 'thongbaos'));
    }

    //profile doanh nghiệp
    public function profile()
    {
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        return view('trangquanly.doanhnghiep.profile', compact('thongbaos'));
    }

    //duyệt bài báo
    public function getduyet($id)
    {
        $doanhnghiep = Doanhnghiep::find($id);
        // dd($doanhnghiep);

        //nếu 1 thì set = 0 và ngược lại
        $doanhnghiep->trangthai == 1 ? $input['trangthai'] = 0 : $input['trangthai'] = 1;

        $doanhnghiep->trangthai = $input['trangthai'];

        //Tintuc::where('id',$id)->update($tintuc);
        $doanhnghiep->save();

        Toastr::success('Duyệt thành công:)', 'Success');
        return redirect()->route('doanhnghiep.home');
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
            return redirect()->route('doanhnghiep.profile');
        } else {
            Toastr::warning('Đổi mật khẩu thất bại!', 'Warning');
            return redirect()->route('doanhnghiep.profile');
        }
    }



    // public function postsua(Request $request, $id)
    // {
    //     $user = User::find($id);
    //     $tk = new TaikhoanController();

        
    //     //Sửa đổi thông tin doanh nghiệp
    //     if ($loai == 'dn-tt') {
    //         // dd($request);
    //         $request->validate([
    //             //thông tin doanh nghiệp
    //             'doanhnghiep_tentiengviet' => ['required', 'string'],
    //             'doanhnghiep_tentienganh',
    //             'doanhnghiep_tenviettat',
    //             'doanhnghiep_loaihinh_id' => ['required', 'int'],
    //             'doanhnghiep_ngaylap' => ['string'],
    //             'doanhnghiep_mathue',
    //             'doanhnghiep_fax',
    //             'doanhnghiep_soluongnhansu' => ['int'],
    //             'doanhnghiep_sdt',
    //             'doanhnghiep_thanhpho' => ['required', 'string'],
    //             'doanhnghiep_huyen' => ['required', 'string'],
    //             'doanhnghiep_xa' => ['required', 'string'],
    //             'doanhnghiep_diachi' => ['string'],
    //             'doanhnghiep_mota',
    //         ]);
        
    //         //Thông thông tin doanh nghiệp
    //         $model_doanhnghiep = $user->getdoanhnghiep;
    //         $doanhnghiep_namecolumn = [
    //             'doanhnghiep_loaihinh_id' => 'doanhnghiep_loaihinh_id',
    //             'tentiengviet' => 'doanhnghiep_tentiengviet',
    //             'tentienganh' => 'doanhnghiep_tentienganh',
    //             'tenviettat' => 'doanhnghiep_tenviettat',
    //             'thanhpho' => 'doanhnghiep_thanhpho',
    //             'huyen' => 'doanhnghiep_huyen',
    //             'xa' => 'doanhnghiep_xa',
    //             'diachi' => 'doanhnghiep_diachi',
    //             "sdt" => 'doanhnghiep_sdt',
    //             'mathue' => 'doanhnghiep_mathue',
    //             'fax' => 'doanhnghiep_fax',
    //             'soluongnhansu' => 'doanhnghiep_soluongnhansu',
    //             'mota' => 'doanhnghiep_mota',
    //         ];

    //         $dateString = $request->doanhnghiep_ngaylap;
    //         $date = Carbon::createFromFormat('d/m/Y', $dateString);
    //         $doanhnghiep_nameobject = [
    //             'user_id' => $user->id,
    //             'ngaylap' => $date->format('Y-m-d'),
    //         ];
    //         $tk->sua($model_doanhnghiep, $request, $doanhnghiep_namecolumn, $doanhnghiep_nameobject);

    //         Toastr::success('Sửa thông tin doanh nghiệp thành công', 'Success');
    //         return redirect()->route('admin.taikhoan.danhsach');
    //     }
    //     if ($loai == 'dn-dd') {
    //         $request->validate([
    //             //thông tin đại diện doanh nghiệp
    //             'doanhnghiep_daidien_tendaidien' => ['required', 'string'],
    //             'doanhnghiep_daidien_email' => ['required', 'string', 'email'],
    //             'doanhnghiep_daidien_sdt' => ['required', 'string'],
    //             'doanhnghiep_daidien_chucvu' => ['required', 'string'],
    //             'doanhnghiep_daidien_cccd' => ['required', 'string'],
    //             'doanhnghiep_daidien_thanhpho' => ['required', 'string'],
    //             'doanhnghiep_daidien_huyen' => ['required', 'string'],
    //             'doanhnghiep_daidien_xa' => ['required', 'string'],
    //             'doanhnghiep_daidien_diachi' => ['string'],
    //             'doanhnghiep_daidien_img_mattruoc' => ['image'],
    //             'doanhnghiep_daidien_img_matsau' => ['image'],
    //             'doanhnghiep_daidien_mota'
    //         ]);

    //         //Thêm thông tin đại diện doanh nghiệp
    //         $model_doanhnghiep_daidien = $user->getdoanhnghiep->getdaidien;
    //         $doanhnghiep_daidien_namecolumn = [
    //             'tendaidien' => 'doanhnghiep_daidien_tendaidien',
    //             'email' => 'doanhnghiep_daidien_email',
    //             'sdt' => 'doanhnghiep_daidien_sdt',
    //             'cccd' => 'doanhnghiep_daidien_cccd',
    //             'thanhpho' => 'doanhnghiep_daidien_thanhpho',
    //             'huyen' => 'doanhnghiep_daidien_huyen',
    //             'xa' => 'doanhnghiep_daidien_xa',
    //             'diachi' => 'doanhnghiep_daidien_diachi',
    //             'chucvu' => 'doanhnghiep_daidien_chucvu',
    //         ];
    //         $doanhnghiep_daidien_nameobject = [
    //             'doanhnghiep_id' => $user->getdoanhnghiep->id,
    //         ];

    //         $doanhnghiep_daidien = $tk->them($model_doanhnghiep_daidien, $request, $doanhnghiep_daidien_namecolumn, $doanhnghiep_daidien_nameobject);
    //         $tk->luuhinhanh($request, $doanhnghiep_daidien, "dndd_cccd_mt", "doanhnghiep_daidien_img_mattruoc", "img_mattruoc", "assets/backend/img/hoso/");
    //         $tk->luuhinhanh($request, $doanhnghiep_daidien, "dndd_cccd_ms", "doanhnghiep_daidien_img_matsau", "img_matsau", "assets/backend/img/hoso/");

    //         Toastr::success('Sửa thông tin đại diện doanh nghiệp thành công', 'Success');
    //         return redirect()->route('admin.taikhoan.danhsach');
    //     }
    //     if ($loai == 'dn-tk') {
    //         // dd($request);
    //         $request->validate([
    //             //thông tin tài khoản
    //             'email' => ['required', 'string', 'email', 'unique:users,email,' . $user->id],
    //             'doanhnghiep_img' => ['image'],
    //             'status' => ['required', 'string'],
    //         ]);

    //         if ($request->password != null) {
    //             $request->validate([
    //                 //thông tin tài khoản
    //                 'password' => ['required', 'min:8', 'confirmed'],
    //             ]);
    //             //Sửa tài khoản
    //             $user_namecolumn = [
    //                 'password' => 'password',
    //             ];
    //             $model_user = User::find($id);
    //             $user = $tk->sua($model_user, $request, $user_namecolumn, null);
    //         }

    //         //Sửa tài khoản
    //         $user_namecolumn = [
    //             'email' => 'email',
    //             'status' => 'status'
    //         ];
    //         $model_user = User::find($id);
    //         $user = $tk->sua($model_user, $request, $user_namecolumn, null);
    //         $tk->suahinhanh($request, $user, "dn", "doanhnghiep_img", "image", "assets/backend/img/hoso/"); //gọi function lưu hình ảnh

    //         Toastr::success('Sửa tài khoản doanh nghiệp thành công', 'Success');
    //         return redirect()->route('admin.taikhoan.danhsach');
    //     }
    // }
}
