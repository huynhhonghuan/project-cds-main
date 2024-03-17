<?php

namespace App\Http\Controllers\Admin\Taikhoan;

use App\Exports\Taikhoan\ChuyengiaExport;
use App\Exports\Taikhoan\CongtacvienExport;
use App\Exports\Taikhoan\Doanhnghiep as TaikhoanDoanhnghiep;
use App\Exports\Taikhoan\DoanhnghiepExport;
use App\Exports\Taikhoan\HiephoidoanhnghiepExport;
use App\Http\Controllers\Controller;
use App\Imports\Taikhoan\DoanhnghiepImport;
use App\Models\Chuyengia;
use App\Models\Doanhnghiep;
use App\Models\Doanhnghiep_Daidien;
use App\Models\Doanhnghiep_Loaihinh;
use App\Models\Doanhnghiep_Sdt;
use App\Models\Hiephoidoanhnghiep;
use App\Models\Hiephoidoanhnghiep_Daidien;
use App\Models\Linhvuc;
use App\Models\User;
use App\Models\User_Vaitro;
use App\Models\Vaitro;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;

class TaikhoanController extends Controller
{
    public function getdanhsach()
    {
        $danhsach  = User::all();
        return view('trangquanly.admin.taikhoan.danhsach', compact('danhsach'));
    }
    public function getxem($id)
    {
        $user = User::find($id);
        if ($user->getvaitro[0]->id == 'ad') {
            $danhsach  = User::all();
            Toastr::info('Không thể xem tài khoản quản trị viên', 'Info');
            return view('trangquanly.admin.taikhoan.danhsach', compact('danhsach'));
        }
        if ($user->getvaitro[0]->id == 'ctv') {
            $tendanhsach = 'Xem thông tin cộng tác viên';
            $suataikhoan = 'Sửa thông tin cộng tác viên';
            // dd($user->getdoanhnghiep->getloaihinh);
            return view('trangquanly.admin.taikhoan.xem', compact('user', 'tendanhsach', 'suataikhoan'));
        }
        if ($user->getvaitro[0]->id == 'dn') {
            $tendanhsach = 'Xem thông tin doanh nghiệp';
            $suataikhoan = 'Sửa thông tin doanh nghiệp';

            // dd($user->getdoanhnghiep->getloaihinh);
            return view('trangquanly.admin.taikhoan.xem', compact('user', 'tendanhsach', 'suataikhoan'));
        }
        if ($user->getvaitro[0]->id == 'cg') {
            $tendanhsach = 'Xem thông tin chuyên gia';
            $suataikhoan = 'Sửa thông tin chuyên gia';

            return view('trangquanly.admin.taikhoan.xem', compact('user', 'tendanhsach', 'suataikhoan'));
        }
        if ($user->getvaitro[0]->id == 'hhdn') {
            $tendanhsach = 'Xem thông tin hiệp hội doanh nghiệp';
            $suataikhoan = 'Sửa thông tin hiệp hội doanh nghiệp';
            return view('trangquanly.admin.taikhoan.xem', compact('user', 'tendanhsach', 'suataikhoan'));
        }
    }
    public function getthem()
    {
        $vaitro = Vaitro::all();
        $loaihinh = Doanhnghiep_Loaihinh::all();
        $linhvuc = Linhvuc::all();
        return view('trangquanly.admin.taikhoan.them', compact('vaitro', 'loaihinh', 'linhvuc'));
    }
    public function postthem(Request $request, $loai)
    {
        if ($loai == 'ctv') {
            //kiểm tra giá trị request
            $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'password' => ['required', 'min:8', 'confirmed'],
                'congtacvien_img' => ['image'],
            ]);

            //Khởi tạo lớp để gọi function
            $tk = new  TaikhoanController();

            // định nghĩa mảng tên giá trị request và tên trường của bảng dạng key : value
            $user_namecolumn = [
                'name' => 'name',
                'email' => 'email',
                'password' => 'password'
            ];
            //định nghĩa các giá trị truyền vào nhưng không nhận từ Request
            $user_nameobject = [
                'status' => 'Active',
            ];

            //Tạo mới model
            $model_user = new User();
            $user = $tk->them($model_user, $request, $user_namecolumn, $user_nameobject); // gọi function thêm
            $tk->luuhinhanh($request, $user, "cvt", "congtacvien_img", "image", "assets/backend/img/hoso/"); //gọi function lưu hình ảnh

            // định nghĩa mảng dạng key : value
            $user_vaitro_nameobject = [
                'user_id' => $user->id,
                'vaitro_id' => 'ctv',
                'cap_vaitro_id' => 'ad',
                'duyet_user_id' => Auth::user()->id,
            ];

            //Tạo mới model
            $model_user_vaitro = new User_Vaitro();
            $user_vaitro = $tk->them($model_user_vaitro, $request, null, $user_vaitro_nameobject); // gọi hàm thêm

            Toastr::success('Thêm tài khoản cộng tác viên thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }

        if ($loai == 'dn') {
            // dd($request);
            $request->validate([
                //thông tin tài khoản
                'email' => ['required', 'string', 'email', 'unique:users'],
                'password' => ['required', 'min:8', 'confirmed'],
                'doanhnghiep_img' => ['required', 'image'],

                //thông tin doanh nghiệp
                'doanhnghiep_tentiengviet' => ['required', 'string'],
                'doanhnghiep_tentienganh' => ['required', 'string'],
                'doanhnghiep_tenviettat',
                'doanhnghiep_loaihinh_id' => ['required', 'int'],
                'doanhnghiep_ngaylap' => ['required', 'string'],
                'doanhnghiep_mathue' => ['required', 'string'],
                'doanhnghiep_fax' => ['string'],
                'doanhnghiep_soluongnhansu' => ['required', 'int'],
                'doanhnghiep_sdt' => ['required', 'string'],
                'doanhnghiep_loai_sdt' => ['required', 'string'],
                'doanhnghiep_thanhpho' => ['required', 'string'],
                'doanhnghiep_huyen' => ['required', 'string'],
                'doanhnghiep_xa' => ['required', 'string'],
                'doanhnghiep_diachi' => ['required', 'string'],
                'doanhnghiep_mota',

                //thông tin đại diện doanh nghiệp
                'doanhnghiep_daidien_tendaidien' => ['required', 'string'],
                'doanhnghiep_daidien_email' => ['required', 'string', 'email'],
                'doanhnghiep_daidien_sdt' => ['required', 'string'],
                'doanhnghiep_daidien_chucvu' => ['required', 'string'],
                'doanhnghiep_daidien_cccd' => ['required', 'string'],
                'doanhnghiep_daidien_thanhpho' => ['required', 'string'],
                'doanhnghiep_daidien_huyen' => ['required', 'string'],
                'doanhnghiep_daidien_xa' => ['required', 'string'],
                'doanhnghiep_daidien_diachi' => ['string'],
                'doanhnghiep_daidien_img_mattruoc' => ['required', 'image'],
                'doanhnghiep_daidien_img_matsau' => ['required', 'image'],
                'doanhnghiep_daidien_mota'
            ]);

            //Thêm tài khoản
            $tk = new TaikhoanController();
            $user_namecolumn = [
                'name' => 'doanhnghiep_daidien_tendaidien',
                'email' => 'email',
                'phone' => 'doanhnghiep_sdt',
                'password' => 'password',
            ];
            //định nghĩa các giá trị truyền vào nhưng không nhận từ Request
            $user_nameobject = [
                'status' => 'Active',
            ];
            $model_user = new User();
            $user = $tk->them($model_user, $request, $user_namecolumn, $user_nameobject);
            $tk->luuhinhanh($request, $user, "dn", "doanhnghiep_img", "image", "assets/backend/img/hoso/"); //gọi function lưu hình ảnh

            //Thêm vài trò của tài khoản
            $user_vaitro_nameobject = [
                'user_id' => $user->id,
                'vaitro_id' => 'dn',
                'cap_vaitro_id' => 'ad',
                'duyet_user_id' => Auth::user()->id,
            ];
            $model_user_vaitro = new User_Vaitro();
            $tk->them($model_user_vaitro, $request, null, $user_vaitro_nameobject); // gọi hàm thêm

            //Thông thông tin doanh nghiệp
            $model_doanhnghiep = new Doanhnghiep();
            $doanhnghiep_namecolumn = [
                'doanhnghiep_loaihinh_id' => 'doanhnghiep_loaihinh_id',
                'tentiengviet' => 'doanhnghiep_tentiengviet',
                'tentienganh' => 'doanhnghiep_tentienganh',
                'tenviettat' => 'doanhnghiep_tenviettat',
                'thanhpho' => 'doanhnghiep_thanhpho',
                'huyen' => 'doanhnghiep_huyen',
                'xa' => 'doanhnghiep_xa',
                'diachi' => 'doanhnghiep_diachi',
                'sdt' => 'doanhnghiep_sdt',
                'mathue' => 'doanhnghiep_mathue',
                'fax' => 'doanhnghiep_fax',
                'soluongnhansu' => 'doanhnghiep_soluongnhansu',
                'mota' => 'doanhnghiep_mota',
            ];
            $dateString = $request->doanhnghiep_ngaylap;
            $date = Carbon::createFromFormat('d/m/Y', $dateString);
            $doanhnghiep_nameobject = [
                'user_id' => $user->id,
                'ngaylap' => $date->format('Y-m-d'),
            ];
            $doanhnghiep = $tk->them($model_doanhnghiep, $request, $doanhnghiep_namecolumn, $doanhnghiep_nameobject);

            //Thông tin số điện thoại doanh nghiệp
            // $model_doanhnghiep_sdt = new Doanhnghiep_Sdt();
            // $doanhnghiep_sdt_namecolumn = [
            //     'sdt' => 'doanhnghiep_sdt',
            //     'loaisdt' => 'doanhnghiep_loai_sdt',
            // ];
            // $doanhnghiep_sdt_nameobject = [
            //     'doanhnghiep_id' => $doanhnghiep->id,
            // ];
            // $tk->them($model_doanhnghiep_sdt, $request, $doanhnghiep_sdt_namecolumn, $doanhnghiep_sdt_nameobject);

            //Thêm thông tin đại diện doanh nghiệp
            $model_doanhnghiep_daidien = new Doanhnghiep_Daidien();
            $doanhnghiep_daidien_namecolumn = [
                'tendaidien' => 'doanhnghiep_daidien_tendaidien',
                'email' => 'doanhnghiep_daidien_email',
                'sdt' => 'doanhnghiep_daidien_sdt',
                'cccd' => 'doanhnghiep_daidien_cccd',
                'thanhpho' => 'doanhnghiep_daidien_thanhpho',
                'huyen' => 'doanhnghiep_daidien_huyen',
                'xa' => 'doanhnghiep_daidien_xa',
                'diachi' => 'doanhnghiep_daidien_diachi',
                'chucvu' => 'doanhnghiep_daidien_chucvu',
            ];
            $doanhnghiep_daidien_nameobject = [
                'doanhnghiep_id' => $doanhnghiep->id,
            ];
            $doanhnghiep_daidien = $tk->them($model_doanhnghiep_daidien, $request, $doanhnghiep_daidien_namecolumn, $doanhnghiep_daidien_nameobject);
            $tk->luuhinhanh($request, $doanhnghiep_daidien, "dndd_cccd_mt", "doanhnghiep_daidien_img_mattruoc", "img_mattruoc", "assets/backend/img/hoso/");
            $tk->luuhinhanh($request, $doanhnghiep_daidien, "dndd_cccd_ms", "doanhnghiep_daidien_img_matsau", "img_matsau", "assets/backend/img/hoso/");

            Toastr::success('Thêm tài khoản doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }

        if ($loai == 'cg') {
            //kiểm tra giá trị request
            $request->validate([
                // 'name' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'password' => ['required', 'min:8', 'confirmed'],
                'chuyengia_img' => ['required', 'image'],

                'chuyengia_tendaidien' => ['required', 'string'],
                'chuyengia_sdt' => ['required', 'string'],
                'chuyengia_linhvuc_id'  => ['required', 'string'],
                'chuyengia_thanhpho'  => ['required', 'string'],
                'chuyengia_huyen'  => ['required', 'string'],
                'chuyengia_xa'  => ['required', 'string'],
                'chuyengia_diachi'  => ['required', 'string'],
                'chuyengia_cccd'  => ['required', 'string'],

                'chuyengia_cccd_img_mattruoc'  => ['required', 'image'],
                'chuyengia_cccd_img_matsau'  => ['required', 'image'],

                'chuyengia_mota'
            ]);

            //Khởi tạo lớp để gọi function
            $tk = new  TaikhoanController();

            // định nghĩa mảng tên giá trị request và tên trường của bảng dạng key : value
            $user_namecolumn = [
                'email' => 'email',
                'phone' => 'chuyengia_sdt',
                'password' => 'password'
            ];
            //định nghĩa các giá trị truyền vào nhưng không nhận từ Request
            $user_nameobject = [
                'name' => $request->chuyengia_tendaidien,
                'status' => 'Active',
            ];

            //Tạo mới model
            $model_user = new User();
            $user = $tk->them($model_user, $request, $user_namecolumn, $user_nameobject); // gọi function thêm
            $tk->luuhinhanh($request, $user, "cg", "chuyengia_img", "image", "assets/backend/img/hoso/"); //gọi function lưu hình ảnh

            // định nghĩa mảng dạng key : value
            $user_vaitro_nameobject = [
                'user_id' => $user->id,
                'vaitro_id' => 'cg',
                'cap_vaitro_id' => 'ad',
                'duyet_user_id' => Auth::user()->id,
            ];

            //Tạo mới model
            $model_user_vaitro = new User_Vaitro();
            $user_vaitro = $tk->them($model_user_vaitro, $request, null, $user_vaitro_nameobject); // gọi hàm thêm

            $chuyengia_namecolumn = [
                'linhvuc_id' => 'chuyengia_linhvuc_id',
                'tenchuyengia' => 'chuyengia_tendaidien',
                'sdt' => 'chuyengia_sdt',
                'cccd' => 'chuyengia_cccd',
                'mota' => 'chuyengia_mota',
            ];

            $chuyengia_nameobject = [
                'user_id' => $user->id,
                'diachi' => $request->chuyengia_diachi . ', ' . $request->chuyengia_thanhpho . ', ' . $request->chuyengia_huyen . ', ' . $request->chuyengia_xa,
            ];
            $model_chuyengia = new Chuyengia();
            $chuyengia = $tk->them($model_chuyengia, $request, $chuyengia_namecolumn, $chuyengia_nameobject);
            $tk->luuhinhanh($request, $chuyengia, 'cg_cccd_mt', 'chuyengia_cccd_img_mattruoc', 'img_mattruoc',  "assets/backend/img/hoso/");
            $tk->luuhinhanh($request, $chuyengia, 'cg_cccd_ms', 'chuyengia_cccd_img_matsau', 'img_matsau',  "assets/backend/img/hoso/");

            Toastr::success('Thêm tài khoản chuyên gia thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }

        if ($loai == 'hhdn') {
            //kiểm tra giá trị request
            $request->validate([
                // 'name' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'password' => ['required', 'min:8', 'confirmed'],
                'hiephoidoanhnghiep_img' => ['required', 'image'],

                'hiephoidoanhnghiep_tentiengviet' => ['required', 'string'],
                'hiephoidoanhnghiep_tentienganh'  => ['required', 'string'],
                'hiephoidoanhnghiep_sdt'  => ['required', 'string'],
                'hiephoidoanhnghiep_thanhpho'  => ['required', 'string'],
                'hiephoidoanhnghiep_huyen'  => ['required', 'string'],
                'hiephoidoanhnghiep_xa'  => ['required', 'string'],
                'hiephoidoanhnghiep_diachi'  => ['required', 'string'],
                'hiephoidoanhnghiep_mota',

                'hiephoidoanhnghiep_daidien_tendaidien'  => ['required', 'string'],
                'hiephoidoanhnghiep_daidien_email'  => ['required', 'string', 'email'],
                'hiephoidoanhnghiep_daidien_sdt'  => ['required', 'string'],
                'hiephoidoanhnghiep_daidien_mota',
            ]);

            //Khởi tạo lớp để gọi function
            $tk = new  TaikhoanController();

            // định nghĩa mảng tên giá trị request và tên trường của bảng dạng key : value
            $user_namecolumn = [
                'email' => 'email',
                'phone' => 'hiephoidoanhnghiep_sdt',
                'password' => 'password'
            ];
            //định nghĩa các giá trị truyền vào nhưng không nhận từ Request
            $user_nameobject = [
                'name' => $request->hiephoidoanhnghiep_daidien_tendaidien,
                'status' => 'Active',
            ];

            //Tạo mới model
            $model_user = new User();
            $user = $tk->them($model_user, $request, $user_namecolumn, $user_nameobject); // gọi function thêm
            $tk->luuhinhanh($request, $user, "hhdn", "hiephoidoanhnghiep_img", "image", "assets/backend/img/hoso/"); //gọi function lưu hình ảnh

            // định nghĩa mảng dạng key : value
            $user_vaitro_nameobject = [
                'user_id' => $user->id,
                'vaitro_id' => 'hhdn',
                'cap_vaitro_id' => 'ad',
                'duyet_user_id' => Auth::user()->id,
            ];

            //Tạo mới model
            $model_user_vaitro = new User_Vaitro();
            $user_vaitro = $tk->them($model_user_vaitro, $request, null, $user_vaitro_nameobject); // gọi hàm thêm

            //Thêm hhdn
            $hiephoidoanhnghiep_namecolumn = [
                'tentiengviet' => 'hiephoidoanhnghiep_tentiengviet',
                'tentienganh' => 'hiephoidoanhnghiep_tentienganh',
                'sdt' => 'hiephoidoanhnghiep_sdt',
                'thanhpho' => 'hiephoidoanhnghiep_thanhpho',
                'huyen' => 'hiephoidoanhnghiep_huyen',
                'xa' => 'hiephoidoanhnghiep_xa',
                'diachi' => 'hiephoidoanhnghiep_diachi',
                'mota' => 'hiephoidoanhnghiep_mota',
            ];
            $hiephoidoanhnghiep_nameobject = [
                'user_id' => $user->id,
            ];
            $model_hiephoidoanhnghiep = new Hiephoidoanhnghiep();
            $hiephoidoanhnghiep = $tk->them($model_hiephoidoanhnghiep, $request, $hiephoidoanhnghiep_namecolumn, $hiephoidoanhnghiep_nameobject);

            //thêm đại diện hhdn
            $hiephoidoanhnghiep_daidien_namecolumn = [
                'tendaidien' => 'hiephoidoanhnghiep_daidien_tendaidien',
                'email' => 'hiephoidoanhnghiep_daidien_email',
                'sdt' => 'hiephoidoanhnghiep_daidien_sdt',
                'mota' => 'hiephoidoanhnghiep_daidien_mota',
            ];
            $hiephoidoanhnghiep_daidien_nameobject = [
                'hiephoidoanhnghiep_id' => $hiephoidoanhnghiep->id,
            ];
            $model_hiephoidoanhnghiep_daidien = new Hiephoidoanhnghiep_Daidien();
            $hiephoidoanhnghiep_daidien = $tk->them($model_hiephoidoanhnghiep_daidien, $request, $hiephoidoanhnghiep_daidien_namecolumn, $hiephoidoanhnghiep_daidien_nameobject);

            Toastr::success('Thêm tài khoản hiệp hội doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }
    }
    //dùng để thêm tài khoản
    public function them($model, $request, $namecolumn, $nameobject)
    {
        if (!empty($namecolumn))
            foreach ($namecolumn as $key => $value) {
                if ($key == "password")
                    $model->$key = Hash::make($request->$value);
                else
                    $model->$key = $request->$value;
            }
        if (!empty($nameobject))
            foreach ($nameobject as $key => $value) {
                $model->$key = $value;
            }
        $model->save();
        return $model;
    }

    public function getsua($id)
    {
        $user = User::find($id);
        $vaitro = Vaitro::all();
        $loaihinh = Doanhnghiep_Loaihinh::all();
        $linhvuc = Linhvuc::all();
        if ($user->getVaiTro[0]->id == 'ad') {
            Toastr::info('Không thể sửa tài khoản quản trị viên', 'Info');
            return redirect()->route('admin.taikhoan.danhsach');
        }
        if ($user->getVaiTro[0]->id == 'dn') {
            $tendanhsach = 'Sửa đổi thông tin doanh nghiệp';
            return view('trangquanly.admin.taikhoan.sua_doanhnghiep', compact('vaitro', 'loaihinh', 'linhvuc', 'tendanhsach', 'user'));
        }
        if ($user->getVaiTro[0]->id == 'cg') {
            $tendanhsach = 'Sửa đổi thông tin chuyên gia';
            return view('trangquanly.admin.taikhoan.sua_chuyengia', compact('vaitro', 'loaihinh', 'linhvuc', 'tendanhsach', 'user'));
        }
        if ($user->getVaiTro[0]->id == 'hhdn') {
            $tendanhsach = 'Sửa đổi thông tin hiệp hội doanh nghiệp';
            return view('trangquanly.admin.taikhoan.sua_hiephoidoanhnghiep', compact('vaitro', 'loaihinh', 'linhvuc', 'tendanhsach', 'user'));
        }
        if ($user->getVaiTro[0]->id == 'ctv') {
            $tendanhsach = 'Sửa đổi thông tin cộng tác viên';
            return view('trangquanly.admin.taikhoan.sua_congtacvien', compact('tendanhsach', 'user'));
        }
    }
    public function postsua(Request $request, $loai, $id)
    {
        $user = User::find($id);
        $tk = new TaikhoanController();

        //Sửa đổi thông tin cộng tác viên
        if ($loai == 'ctv') {
            //kiểm tra giá trị request
            $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'unique:users,email,' . $user->id],
                'status' => ['required', 'string'],
                'congtacvien_img' => ['image'],
            ]);

            if ($request->password != null) {
                $request->validate([
                    //thông tin tài khoản
                    'password' => ['required', 'min:8', 'confirmed'],
                ]);
                //Sửa tài khoản
                $user_namecolumn = [
                    'password' => 'password',
                ];
                $model_user = User::find($id);
                $user = $tk->sua($model_user, $request, $user_namecolumn, null);
            }

            // định nghĩa mảng tên giá trị request và tên trường của bảng dạng key : value
            $user_namecolumn = [
                'name' => 'name',
                'email' => 'email',
                'status' => 'status',
            ];

            //Tạo mới model
            $model_user = User::find($id);
            $user = $tk->sua($model_user, $request, $user_namecolumn, null); // gọi function thêm
            $tk->suahinhanh($request, $user, "cvt", "congtacvien_img", "image", "assets/backend/img/hoso/"); //gọi function lưu hình ảnh

            Toastr::success('Sửa tài khoản cộng tác viên thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }

        //Sửa đổi thông tin doanh nghiệp
        if ($loai == 'dn-tt') {
            // dd($request);
            $request->validate([
                //thông tin doanh nghiệp
                'doanhnghiep_tentiengviet' => ['required', 'string'],
                'doanhnghiep_tentienganh' => ['required', 'string'],
                'doanhnghiep_tenviettat',
                'doanhnghiep_loaihinh_id' => ['required', 'int'],
                'doanhnghiep_ngaylap' => ['required', 'string'],
                'doanhnghiep_mathue' => ['required', 'string'],
                'doanhnghiep_fax' => ['string'],
                'doanhnghiep_soluongnhansu' => ['required', 'int'],
                'doanhnghiep_sdt' => ['required', 'string'],
                'doanhnghiep_loai_sdt' => ['required', 'string'],
                'doanhnghiep_thanhpho' => ['required', 'string'],
                'doanhnghiep_huyen' => ['required', 'string'],
                'doanhnghiep_xa' => ['required', 'string'],
                'doanhnghiep_diachi' => ['required', 'string'],
                'doanhnghiep_mota',
            ]);

            //Thông thông tin doanh nghiệp
            $model_doanhnghiep = $user->getdoanhnghiep;
            $doanhnghiep_namecolumn = [
                'doanhnghiep_loaihinh_id' => 'doanhnghiep_loaihinh_id',
                'tentiengviet' => 'doanhnghiep_tentiengviet',
                'tentienganh' => 'doanhnghiep_tentienganh',
                'tenviettat' => 'doanhnghiep_tenviettat',
                'thanhpho' => 'doanhnghiep_thanhpho',
                'huyen' => 'doanhnghiep_huyen',
                'xa' => 'doanhnghiep_xa',
                'diachi' => 'doanhnghiep_diachi',
                'mathue' => 'doanhnghiep_mathue',
                'fax' => 'doanhnghiep_fax',
                'soluongnhansu' => 'doanhnghiep_soluongnhansu',
                'mota' => 'doanhnghiep_mota',
            ];

            $dateString = $request->doanhnghiep_ngaylap;
            $date = Carbon::createFromFormat('d/m/Y', $dateString);
            $doanhnghiep_nameobject = [
                'user_id' => $user->id,
                'ngaylap' => $date->format('Y-m-d'),
            ];
            $tk->sua($model_doanhnghiep, $request, $doanhnghiep_namecolumn, $doanhnghiep_nameobject);

            Toastr::success('Sửa thông tin doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }
        if ($loai == 'dn-dd') {
            $request->validate([
                //thông tin đại diện doanh nghiệp
                'doanhnghiep_daidien_tendaidien' => ['required', 'string'],
                'doanhnghiep_daidien_email' => ['required', 'string', 'email'],
                'doanhnghiep_daidien_sdt' => ['required', 'string'],
                'doanhnghiep_daidien_chucvu' => ['required', 'string'],
                'doanhnghiep_daidien_cccd' => ['required', 'string'],
                'doanhnghiep_daidien_thanhpho' => ['required', 'string'],
                'doanhnghiep_daidien_huyen' => ['required', 'string'],
                'doanhnghiep_daidien_xa' => ['required', 'string'],
                'doanhnghiep_daidien_diachi' => ['string'],
                'doanhnghiep_daidien_img_mattruoc' => ['image'],
                'doanhnghiep_daidien_img_matsau' => ['image'],
                'doanhnghiep_daidien_mota'
            ]);

            //Thêm thông tin đại diện doanh nghiệp
            $model_doanhnghiep_daidien = $user->getdoanhnghiep->getdaidien;
            $doanhnghiep_daidien_namecolumn = [
                'tendaidien' => 'doanhnghiep_daidien_tendaidien',
                'email' => 'doanhnghiep_daidien_email',
                'sdt' => 'doanhnghiep_daidien_sdt',
                'cccd' => 'doanhnghiep_daidien_cccd',
                'thanhpho' => 'doanhnghiep_daidien_thanhpho',
                'huyen' => 'doanhnghiep_daidien_huyen',
                'xa' => 'doanhnghiep_daidien_xa',
                'diachi' => 'doanhnghiep_daidien_diachi',
                'chucvu' => 'doanhnghiep_daidien_chucvu',
            ];
            $doanhnghiep_daidien_nameobject = [
                'doanhnghiep_id' => $user->getdoanhnghiep->id,
            ];

            $doanhnghiep_daidien = $tk->them($model_doanhnghiep_daidien, $request, $doanhnghiep_daidien_namecolumn, $doanhnghiep_daidien_nameobject);
            $tk->luuhinhanh($request, $doanhnghiep_daidien, "dndd_cccd_mt", "doanhnghiep_daidien_img_mattruoc", "img_mattruoc", "assets/backend/img/hoso/");
            $tk->luuhinhanh($request, $doanhnghiep_daidien, "dndd_cccd_ms", "doanhnghiep_daidien_img_matsau", "img_matsau", "assets/backend/img/hoso/");

            Toastr::success('Sửa thông tin đại diện doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }
        if ($loai == 'dn-tk') {
            // dd($request);
            $request->validate([
                //thông tin tài khoản
                'email' => ['required', 'string', 'email', 'unique:users,email,' . $user->id],
                'doanhnghiep_img' => ['image'],
                'status' => ['required', 'string'],
            ]);

            if ($request->password != null) {
                $request->validate([
                    //thông tin tài khoản
                    'password' => ['required', 'min:8', 'confirmed'],
                ]);
                //Sửa tài khoản
                $user_namecolumn = [
                    'password' => 'password',
                ];
                $model_user = User::find($id);
                $user = $tk->sua($model_user, $request, $user_namecolumn, null);
            }

            //Sửa tài khoản
            $user_namecolumn = [
                'email' => 'email',
                'status' => 'status'
            ];
            $model_user = User::find($id);
            $user = $tk->sua($model_user, $request, $user_namecolumn, null);
            $tk->suahinhanh($request, $user, "dn", "doanhnghiep_img", "image", "assets/backend/img/hoso/"); //gọi function lưu hình ảnh

            Toastr::success('Sửa tài khoản doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }

        //Sửa đổi thông tin chuyên gia
        if ($loai == 'cg-tt') {
            //kiểm tra giá trị request
            $request->validate([
                'chuyengia_tendaidien' => ['required', 'string'],
                'chuyengia_sdt' => ['required', 'string'],
                'chuyengia_linhvuc_id'  => ['required', 'string'],
                'chuyengia_thanhpho'  => ['required', 'string'],
                'chuyengia_huyen'  => ['required', 'string'],
                'chuyengia_xa'  => ['required', 'string'],
                'chuyengia_diachi'  => ['required', 'string'],
                'chuyengia_cccd'  => ['required', 'string'],
                'chuyengia_cccd_img_mattruoc'  => ['image'],
                'chuyengia_cccd_img_matsau'  => ['image'],
                'chuyengia_mota'
            ]);

            $chuyengia_namecolumn = [
                'linhvuc_id' => 'chuyengia_linhvuc_id',
                'tenchuyengia' => 'chuyengia_tendaidien',
                'thanhpho' => 'chuyengia_thanhpho',
                'huyen' => 'chuyengia_huyen',
                'xa' => 'chuyengia_xa',
                'diachi' => 'chuyengia_diachi',
                'sdt' => 'chuyengia_sdt',
                'cccd' => 'chuyengia_cccd',
                'mota' => 'chuyengia_mota',
            ];

            $chuyengia_nameobject = [
                'user_id' => $user->id,
            ];
            $model_chuyengia = $user->getchuyengia;
            $chuyengia = $tk->sua($model_chuyengia, $request, $chuyengia_namecolumn, $chuyengia_nameobject);
            $tk->suahinhanh($request, $chuyengia, 'cg_cccd_mt', 'chuyengia_cccd_img_mattruoc', 'img_mattruoc',  "assets/backend/img/hoso/");
            $tk->suahinhanh($request, $chuyengia, 'cg_cccd_ms', 'chuyengia_cccd_img_matsau', 'img_matsau',  "assets/backend/img/hoso/");

            Toastr::success('Sửa tài khoản chuyên gia thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }
        if ($loai == 'cg-tk') {
            //kiểm tra giá trị request
            $request->validate([
                // 'name' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'unique:users,email,' . $user->id],
                'status' => ['required', 'string'],
                'chuyengia_img' => ['image'],
            ]);

            if ($request->password != null) {
                $request->validate([
                    'password' => ['required', 'min:8', 'confirmed'],
                ]);
                //Sửa tài khoản
                $user_namecolumn = [
                    'password' => 'password',
                ];
                $model_user = User::find($id);
                $user = $tk->sua($model_user, $request, $user_namecolumn, null);
            }

            // định nghĩa mảng tên giá trị request và tên trường của bảng dạng key : value
            $user_namecolumn = [
                // 'name' => 'name',
                'email' => 'email',
                'status' => 'status',
            ];

            //Tạo mới model
            $model_user = User::find($id);
            $user = $tk->sua($model_user, $request, $user_namecolumn, null); // gọi function thêm
            $tk->suahinhanh($request, $user, "cg", "chuyengia_img", "image", "assets/backend/img/hoso/"); //gọi function lưu hình ảnh

            Toastr::success('Sửa tài khoản chuyên gia thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }

        //Sửa đổi thông tin hiệp hội doanh nghiệp
        if ($loai == 'hhdn-tt') {
            //kiểm tra giá trị request
            $request->validate([
                'hiephoidoanhnghiep_tentiengviet' => ['required', 'string'],
                'hiephoidoanhnghiep_tentienganh'  => ['required', 'string'],
                'hiephoidoanhnghiep_sdt'  => ['required', 'string'],
                'hiephoidoanhnghiep_thanhpho'  => ['required', 'string'],
                'hiephoidoanhnghiep_huyen'  => ['required', 'string'],
                'hiephoidoanhnghiep_xa'  => ['required', 'string'],
                'hiephoidoanhnghiep_diachi'  => ['required', 'string'],
                'hiephoidoanhnghiep_mota',
            ]);

            $hiephoidoanhnghiep_namecolumn = [
                'tentiengviet' => 'hiephoidoanhnghiep_tentiengviet',
                'tentienganh' => 'hiephoidoanhnghiep_tentienganh',
                'thanhpho' => 'hiephoidoanhnghiep_thanhpho',
                'huyen' => 'hiephoidoanhnghiep_huyen',
                'xa' => 'hiephoidoanhnghiep_xa',
                'diachi' => 'hiephoidoanhnghiep_diachi',
                'sdt' => 'hiephoidoanhnghiep_sdt',
                'mota' => 'hiephoidoanhnghiep_mota',
            ];
            $hiephoidoanhnghiep_nameobject = [
                'user_id' => $user->id,
            ];
            $model_hiephoidoanhnghiep = $user->gethiephoidoanhnghiep;
            $hiephoidoanhnghiep = $tk->sua($model_hiephoidoanhnghiep, $request, $hiephoidoanhnghiep_namecolumn, $hiephoidoanhnghiep_nameobject);

            Toastr::success('Sửa thông tin hiệp hội doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }

        if ($loai == 'hhdn-dd') {
            //kiểm tra giá trị request
            $request->validate([
                'hiephoidoanhnghiep_daidien_tendaidien'  => ['required', 'string'],
                'hiephoidoanhnghiep_daidien_email'  => ['required', 'string', 'email'],
                'hiephoidoanhnghiep_daidien_sdt'  => ['required', 'string'],
                'hiephoidoanhnghiep_daidien_mota',
            ]);

            $hiephoidoanhnghiep_daidien_namecolumn = [
                'tendaidien' => 'hiephoidoanhnghiep_daidien_tendaidien',
                'email' => 'hiephoidoanhnghiep_daidien_email',
                'sdt' => 'hiephoidoanhnghiep_daidien_sdt',
                'mota' => 'hiephoidoanhnghiep_daidien_mota',
            ];
            $hiephoidoanhnghiep_daidien_nameobject = [
                'hiephoidoanhnghiep_id' => $user->gethiephoidoanhnghiep->id,
            ];

            $model_hiephoidoanhnghiep_daidien = $user->gethiephoidoanhnghiep->getdaidien;
            $hiephoidoanhnghiep_daidien = $tk->sua($model_hiephoidoanhnghiep_daidien, $request, $hiephoidoanhnghiep_daidien_namecolumn, $hiephoidoanhnghiep_daidien_nameobject);

            Toastr::success('Sửa thông tin đại diện hiệp hội doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }
        if ($loai == 'hhdn-tk') {
            //kiểm tra giá trị request
            $request->validate([
                // 'name' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'unique:users,email,' . $user->id],
                'status' => ['required', 'string'],
                'hiephoidoanhnghiep_img' => ['image'],
            ]);

            if ($request->password != null) {
                $request->validate([
                    //thông tin tài khoản
                    'password' => ['required', 'min:8', 'confirmed'],
                ]);
                //Sửa tài khoản
                $user_namecolumn = [
                    'password' => 'password',
                ];
                $model_user = User::find($id);
                $user = $tk->sua($model_user, $request, $user_namecolumn, null);
            }

            // định nghĩa mảng tên giá trị request và tên trường của bảng dạng key : value
            $user_namecolumn = [
                // 'name' => 'name',
                'email' => 'email',
                'status' => 'status',
            ];

            //Tạo mới model
            $model_user = User::find($id);
            $user = $tk->sua($model_user, $request, $user_namecolumn, null); // gọi function thêm
            $tk->suahinhanh($request, $user, "hhdn", "hiephoidoanhnghiep_img", "image", "assets/backend/img/hoso/"); //gọi function lưu hình ảnh

            Toastr::success('Sửa tài khoản hiệp hội doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }
    }
    //dùng để sửa tài khoản
    public function sua($model, $request, $namecolumn, $nameobject)
    {
        if (!empty($namecolumn))
            foreach ($namecolumn as $key => $value) {
                if ($key == "password")
                    $model->$key = Hash::make($request->$value);
                else
                    $model->$key = $request->$value;
            }
        if (!empty($nameobject))
            foreach ($nameobject as $key => $value) {
                $model->$key = $value;
            }
        $model->update();
        return $model;
    }
    public function postxoa(Request $request)
    {
        try {
            $user = User::find($request->id);
            $xoahinhanh = new TaikhoanController();
            if ($user->image != null) {
                $xoahinhanh->xoahinhanh($user, "image", "assets/backend/img/hoso");
            }

            if ($user->getVaiTro[0]->id == 'dn') {
                if ($user->getDoanhNghiep != null) {
                    $doanhnghiep_daidien = $user->getDoanhNghiep->getDaiDien;
                    $xoahinhanh->xoahinhanh($doanhnghiep_daidien, "img_mattruoc", "assets/backend/img/hoso");
                    $xoahinhanh->xoahinhanh($doanhnghiep_daidien, "img_matsau", "assets/backend/img/hoso");
                }
            }

            if ($user->getVaiTro[0]->id == 'cg') {
                if ($user->getChuyenGia != null) {
                    $chuyengia = $user->getChuyenGia;
                    $xoahinhanh->xoahinhanh($chuyengia, "img_mattruoc", "assets/backend/img/hoso");
                    $xoahinhanh->xoahinhanh($chuyengia, "img_matsau", "assets/backend/img/hoso");
                }
            }

            if ($user->getVaiTro[0]->id == 'ad') {
                Toastr::info('Không thể xoá tài khoản quản trị viên', 'Info');
            } else {
                User::destroy($request->id);
                Toastr::success('Xoá tài khoản thành công', 'Success');
            }
        } catch (Exception $e) {
            Toastr::warning('Xoá tài khoản thất bại!', 'Warning');
        }
        return redirect()->route('admin.taikhoan.danhsach');
    }

    public function postnguoiduyet(Request $request)
    {
        try {
            $user_vaitro = User_Vaitro::where('user_id', $request->duyet_id)->first();
            if ($user_vaitro->vaitro_id == 'ad') {
                Toastr::info('Tài khoản quản trị không thể duyệt!', 'Info');
            } else if ($user_vaitro->vaitro_id != 'ad' && $user_vaitro->duyet_user_id == null) {
                $user_vaitro->duyet_user_id == null ? ($user_vaitro->duyet_user_id = Auth::user()->id) : null;
                $user_vaitro->save();
                Toastr::success('Duyệt thành công:)', 'Success');
            } else if ($user_vaitro->duyet_user_id != null) {
                Toastr::info('Tài khoản đã được duyệt!', 'Info');
            } else {
                Toastr::success('Duyệt thất bại!', 'Warning');
            }
        } catch (Exception $e) {
            Toastr::success('Duyệt thất bại!', 'Warning');
        }
        return redirect()->route('admin.taikhoan.danhsach');
    }

    public function posttrangthai(Request $request)
    {
        try {
            $user = User::find($request->trangthai_id);
            if ($user->getVaiTro[0]->id != 'ad') {
                $user->status == 'Active' ? ($user->status = 'Inactive') : ($user->status = 'Active');
                $user->save();
                Toastr::success('Cập nhật trang thái thành công:)', 'Success');
            } else if ($user->getVaiTro[0]->id == 'ad') {
                Toastr::info('Tài khoản quản trị không thể sửa trạng thái!', 'Info');
            }
        } catch (Exception $e) {
            Toastr::success('Cập nhật trạng thái thất bại!', 'Warning');
        }
        return redirect()->route('admin.taikhoan.danhsach');
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
    public function postnhapdoanhnghiep(Request $request)
    {
        // try {
        Excel::import(new DoanhnghiepImport, $request->file('excel_file'));
        Toastr::success('Nhập dữ liệu excel tài khoản doanh nghiệp', 'Success');
        return redirect()->route('admin.taikhoan.danhsach');
        // } catch (Exception $e) {
        //     Toastr::warning('Nhập dữ liệu excel tài khoản doanh nghiệp không thành công!', 'Warning');
        //     return redirect()->route('admin.taikhoan.danhsach');
        // }
    }
    public function postnhapchuyengia(Request $request)
    {
    }
    public function postnhaphiephoidoanhnghiep(Request $request)
    {
    }
    public function postnhapcongtacvien(Request $request)
    {
    }
    public function getxuatdoanhnghiep()
    {
        try {
            return Excel::download(new DoanhnghiepExport, 'doanhnghiep.xlsx');
        } catch (Exception $e) {
            Toastr::info('Xuất thông tin doanh nghiệp không thành công!', 'Info');
            return redirect()->route('admin.taikhoan.danhsach');
        }
    }
    public function getxuatchuyengia()
    {
        try {
            return Excel::download(new ChuyengiaExport, 'chuyengia.xlsx');
        } catch (Exception $e) {
            Toastr::info('Xuất thông tin chuyên gia không thành công!', 'Info');
            return redirect()->route('admin.taikhoan.danhsach');
        }
    }
    public function getxuathiephoidoanhnghiep()
    {
        try {
            return Excel::download(new HiephoidoanhnghiepExport, 'hiephoidoanhnghiep.xlsx');
        } catch (Exception $e) {
            Toastr::info('Xuất thông tin hiệp hội doanh nghiệp không thành công!', 'Info');
            return redirect()->route('admin.taikhoan.danhsach');
        }
    }
    public function getxuatcongtacvien()
    {
        try {
            return Excel::download(new CongtacvienExport, 'congtacvien.xlsx');
        } catch (Exception $e) {
            Toastr::info('Xuất thông tin doanh nghiệp không thành công!', 'Info');
            return redirect()->route('admin.taikhoan.danhsach');
        }
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
