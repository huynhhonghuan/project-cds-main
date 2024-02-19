<?php

namespace App\Http\Controllers\Admin\Taikhoan;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep;
use App\Models\Doanhnghiep_Daidien;
use App\Models\Doanhnghiep_Loaihinh;
use App\Models\Doanhnghiep_Sdt;
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

class TaikhoanController extends Controller
{
    public function getdanhsach()
    {
        $danhsach  = User::all();
        // dd($danhsach[0]->getVaiTro[0]->pivot->duyet_user_id);
        $ds = User_Vaitro::all();
        // dd($ds[0]->nguoiduyet);
        return view('trangquanly.admin.taikhoan.danhsach', compact('danhsach'));
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
                'mathue' => 'doanhnghiep_mathue',
                'fax' => 'doanhnghiep_fax',
                'soluongnhansu' => 'doanhnghiep_soluongnhansu',
                'mota' => 'doanhnghiep_mota',
            ];
            $dateString = $request->doanhnghiep_ngaylap;
            $date = Carbon::createFromFormat('d/m/Y', $dateString);
            $doanhnghiep_nameobject = [
                'user_id' => $user->id,
                'diachi' => $request->doanhnghiep_diachi . ', ' . $request->doanhnghiep_xa . ', ' . $request->doanhnghiep_huyen . ', ' . $request->doanhnghiep_thanhpho,
                'ngaylap' => $date->format('Y-m-d'),
            ];
            $doanhnghiep = $tk->them($model_doanhnghiep, $request, $doanhnghiep_namecolumn, $doanhnghiep_nameobject);

            //Thông tin số điện thoại doanh nghiệp
            $model_doanhnghiep_sdt = new Doanhnghiep_Sdt();
            $doanhnghiep_sdt_namecolumn = [
                'sdt' => 'doanhnghiep_sdt',
                'loaisdt' => 'doanhnghiep_loai_sdt',
            ];
            $doanhnghiep_sdt_nameobject = [
                'doanhnghiep_id' => $doanhnghiep->id,
            ];
            $tk->them($model_doanhnghiep_sdt, $request, $doanhnghiep_sdt_namecolumn, $doanhnghiep_sdt_nameobject);

            //Thêm thông tin đại diện doanh nghiệp
            $model_doanhnghiep_daidien = new Doanhnghiep_Daidien();
            $doanhnghiep_daidien_namecolumn = [
                'tendaidien' => 'doanhnghiep_daidien_tendaidien',
                'email' => 'doanhnghiep_daidien_email',
                'cccd' => 'doanhnghiep_daidien_cccd',
                'chucvu' => 'doanhnghiep_daidien_chucvu',
            ];
            $doanhnghiep_daidien_nameobject = [
                'doanhnghiep_id' => $doanhnghiep->id,
                'diachi' => $request->doanhnghiep_daidien_diachi . ', ' . $request->doanhnghiep_daidien_xa . ', ' . $request->doanhnghiep_daidien_huyen . ', ' . $request->doanhnghiep_daidien_thanhpho,
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

            Toastr::success('Thêm tài khoản chuyên gia thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }

        if ($loai == 'hhdn') {
            Toastr::success('Thêm tài khoản hiệp hội doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.taikhoan.danhsach');
        }
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
    public function xoahinhanh($model, $duongdan)
    {
        unlink($duongdan . '/' . $model->image);
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
    }
    public function postsua(Request $request, $id)
    {
    }
    public function postxoa(Request $request)
    {
        try {
            $user_vaitro = User_Vaitro::where('user_id', $request->id)->first();
            $user_vaitro->delete();

            $user = User::find($request->id);
            if ($user->image != null) {
                $xoahinhanh = new TaikhoanController();
                $xoahinhanh->xoahinhanh($user, "assets/backend/img/hoso/");
            }
            User::destroy($request->id);
            Toastr::success('Xoá tài khoản thành công', 'Success');
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



// $user = new User();
            // $user->name = $request->doanhnghiep_daidien_tendaidien;
            // $user->email = $request->email;
            // $user->password = Hash::make($request->password);
            // $user->status = 'Active';
            // $user->save();

            // //thêm hình ảnh vào publish theo đường dẫn và sử lý lưu tên hình thay thế bằng năm tháng ngày giờ phút giây
            // if ($user_image = $request->file('doanhnghiep_img')) {
            //     $destinationPath = 'assets/backend/img/hoso/';
            //     $profileImage = "dn-" . $user->id;
            //     $user_image->move($destinationPath, $profileImage);
            //     $user->image = "$profileImage";
            //     $user->save();
            // }

            // $user_vaitro = new User_Vaitro();
            // $user_vaitro->user_id = $user->id;
            // $user_vaitro->vaitro_id = 'dn';
            // $user_vaitro->cap_vaitro_id = 'ad';
            // $user_vaitro->duyet_user_id = Auth::user()->id;
            // $user_vaitro->save();

            // $doanhnghiep = new Doanhnghiep();
            // $doanhnghiep->user_id = $user->id;
            // $doanhnghiep->doanhnghiep_loaihinh_id = $request->doanhnghiep_loaihinh_id;
            // $doanhnghiep->tentiengviet = $request->doanhnghiep_tentiengviet;
            // $doanhnghiep->tentienganh = $request->doanhnghiep_tentienganh;
            // $doanhnghiep->tenviettat = $request->doanhnghiep_tenviettat;
            // $doanhnghiep->diachi = $request->doanhnghiep_diachi . ', ' . $request->doanhnghiep_xa . ', ' . $request->doanhnghiep_huyen . ', ' . $request->doanhnghiep_thanhpho;
            // $doanhnghiep->mathue = $request->doanhnghiep_mathue;
            // $doanhnghiep->fax = $request->doanhnghiep_fax;
            // $doanhnghiep->soluongnhansu = $request->doanhnghiep_soluongnhansu;

            // $dateString = $request->doanhnghiep_ngaylap;
            // $date = Carbon::createFromFormat('d/m/Y', $dateString);
            // $doanhnghiep->ngaylap = $date->format('Y-m-d');

            // $doanhnghiep->mota = $request->doanhnghiep_mota;
            // $doanhnghiep->save();

            // $doanhnghiep_sdt = new Doanhnghiep_Sdt();
            // $doanhnghiep_sdt->doanhnghiep_id = $doanhnghiep->id;
            // $doanhnghiep_sdt->sdt = $request->doanhnghiep_sdt;
            // $doanhnghiep_sdt->loaisdt = $request->doanhnghiep_loai_sdt;
            // $doanhnghiep_sdt->save();

            // $doanhnghiep_daidien = new Doanhnghiep_Daidien();
            // $doanhnghiep_daidien->doanhnghiep_id = $doanhnghiep->id;
            // $doanhnghiep_daidien->tendaidien = $request->doanhnghiep_daidien_tendaidien;
            // $doanhnghiep_daidien->email = $request->doanhnghiep_daidien_email;
            // $doanhnghiep_daidien->diachi = $request->doanhnghiep_daidien_diachi . ', ' . $request->doanhnghiep_daidien_xa . ', ' . $request->doanhnghiep_daidien_huyen . ', ' . $request->doanhnghiep_daidien_thanhpho;
            // $doanhnghiep_daidien->cccd = $request->doanhnghiep_daidien_cccd;
            // $doanhnghiep_daidien->img_mattruoc = $request->doanhnghiep_daidien_img_mattruoc;
            // $doanhnghiep_daidien->img_matsau = $request->doanhnghiep_daidien_img_matsau;
            // $doanhnghiep_daidien->chucvu = $request->doanhnghiep_daidien_chucvu;
            // $doanhnghiep_daidien->save();

            //thêm hình ảnh vào publish theo đường dẫn và sử lý lưu tên hình thay thế bằng năm tháng ngày giờ phút giây
            // if ($cccd_img_matruoc = $request->file('doanhnghiep_daidien_img_mattruoc')) {
            //     $destinationPath = 'assets/backend/img/hoso/';
            //     $profileImage = "dn-" . $user->id;
            //     $cccd_img_matruoc->move($destinationPath, $profileImage);
            //     $user->image = "$profileImage";
            //     $user->save();
            // }
