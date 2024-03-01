<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Doanhnghiep;
use App\Models\Doanhnghiep_Daidien;
use App\Models\Doanhnghiep_Sdt;
use App\Models\User;
use App\Models\User_Vaitro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Prompts\Output\ConsoleOutput;
use Tymon\JWTAuth\Facades\JWTAuth;

class DoanhNghiepController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            //thông tin tài khoản
            'email' => ['required', 'string', 'email', 'unique:users'],
            'name' => ['required', 'string'],
            'password' => ['required', 'min:8'],
            // 'doanhnghiep_img' => ['required', 'image'],

            //thông tin doanh nghiệp
            'doanhnghiep_tentiengviet' => ['required', 'string'],
            'doanhnghiep_tentienganh' => ['required', 'string'],
            'doanhnghiep_tenviettat',
            'doanhnghiep_loaihinh_id' => ['required', 'int'],
            'doanhnghiep_ngaylap' => ['required', 'string'],
            'doanhnghiep_mathue' => ['required', 'string'],
            'doanhnghiep_fax',
            'doanhnghiep_soluongnhansu' => ['required', 'int'],
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
        $user_namecolumn = [
            'name' => 'name',
            'email' => 'email',
            'password' => 'password',
        ];

        //định nghĩa các giá trị truyền vào nhưng không nhận từ Request
        $user_nameobject = [
            'status' => 'Active',
        ];
        $model_user = new User();
        $user = $this->them($model_user, $request, $user_namecolumn, $user_nameobject);

        //Vai trò của tài khoản
        $user_vaitro_nameobject = [
            'user_id' => $user->id,
            'vaitro_id' => 'dn',
            'cap_vaitro_id' => 'ad',
            'duyet_user_id' => 1,
        ];
        $model_user_vaitro = new User_Vaitro();
        $this->them($model_user_vaitro, $request, null, $user_vaitro_nameobject);

        //Thông tin doanh nghiệp
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

        $doanhnghiep = $this->them($model_doanhnghiep, $request, $doanhnghiep_namecolumn, $doanhnghiep_nameobject);

        //Thông tin số điện thoại doanh nghiệp
        foreach ($request->doanhnghiep_sdt as $key => $value) {
            $sdt_inp = collect(json_decode($value, true));
            $model_doanhnghiep_sdt = new Doanhnghiep_Sdt();
            $model_doanhnghiep_sdt->sdt = $sdt_inp['sdt'];
            $model_doanhnghiep_sdt->loaisdt = $sdt_inp['loaiSdt'];
            $model_doanhnghiep_sdt->doanhnghiep_id = $doanhnghiep->id;
            $model_doanhnghiep_sdt->save();
        }

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

        $doanhnghiep_daidien = $this->them($model_doanhnghiep_daidien, $request, $doanhnghiep_daidien_namecolumn, $doanhnghiep_daidien_nameobject);

        $this->luuhinhanh($request, $doanhnghiep_daidien, "dndd_cccd_mt", "doanhnghiep_daidien_img_mattruoc", "img_mattruoc", "assets/backend/img/hoso/");
        $this->luuhinhanh($request, $doanhnghiep_daidien, "dndd_cccd_ms", "doanhnghiep_daidien_img_matsau", "img_matsau", "assets/backend/img/hoso/");

        return response()->json(['success' => 'success'], 200);
    }

    public function profile()
    {
        return response()->json(auth()->user(), 200);
    }

    public function test()
    {
        return response()->json(["success" => "success"], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = auth()->user();

        if ($user->status != "Active") {
            return response()->json(['error' => 'Tài khoản chưa được kích hoạt'], 401);
        }

        return response()->json([
            'userProfile' => new UserResource($user),
            'accessToken' => $token
        ], 200);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Đăng xuất thành công'], 200);
    }

    public function log($message)
    {
        $output = new ConsoleOutput();
        $output->writeln("<info>" . $message . "</info>");
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
}