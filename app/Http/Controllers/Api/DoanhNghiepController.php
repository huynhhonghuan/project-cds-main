<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoanhNghiepPublicResource;
use App\Http\Resources\DoanhNghiepResource;
use App\Http\Resources\NganhNgheResource;
use App\Http\Resources\ThanhTichResource;
use App\Http\Resources\UserResource;
use App\Http\Services\ImageService;
use App\Http\Services\NotificationService;
use App\Models\Chuyengia;
use App\Models\Doanhnghiep;
use App\Models\Doanhnghiep_Daidien;
use App\Models\Doanhnghiep_Sdt;
use App\Models\NganhNghe;
use App\Models\NhuCau;
use App\Models\ThanhTich;
use App\Models\User;
use App\Models\User_Vaitro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoanhNghiepController extends Controller
{
    public function index()
    {
        return DoanhNghiepResource::collection(Doanhnghiep::where('trangthai', 1)->get());
    }
    public function getDoanhNghiepPage(Request $request)
    {
        $skip = $request->skip;
        $limit = $request->limit;
        $loaihinh_id = $request->loaiHinhId;
        $huyen = $request->huyen;
        $baseQuery = Doanhnghiep::query()
            ->when($loaihinh_id, function ($query, $loaihinh_id) {
                return $query->whereHas('getLoaiHinh', function ($query) use ($loaihinh_id) {
                    $query->where('loaihinh_id', $loaihinh_id);
                });
            })
            ->when($huyen, function ($query, $huyen) {
                return $query->where('huyen', $huyen);
            });

        $countQuery = clone $baseQuery;

        $total = $countQuery->count();
        $member = $countQuery->where('hoivien', 1)->count();
        $doanhnghieps = $baseQuery->skip($skip)->take($limit)->get();
        return [
            'total' => $total,
            'member' => $member,
            'data' => DoanhNghiepResource::collection($doanhnghieps)
        ];
    }
    public function nganhnghe()
    {
        return NganhNgheResource::collection(NganhNghe::all());
    }


    public function createThanhTich(Request $request)
    {
        $request->validate([
            'tenthanhtich' => 'required',
        ]);
        $user = User::findOrFail(auth('api')->id());
        $doanhnghiep = Doanhnghiep::where('user_id', $user->id)->firstOrFail();
        $thanhtich = new ThanhTich();
        $thanhtich->doanhnghiep_id = $doanhnghiep->id;
        $thanhtich->tenthanhtich = request()->tenthanhtich;

        if ($request->hasFile('hinhanh')) {
            $hinhAnh = $request->file('hinhanh');
            $path = 'assets/backend/img/thanhtich';
            $fileName =  uniqid() . "."  . $hinhAnh->getClientOriginalExtension();
            $hinhAnh->move($path, $fileName);
            if (env('APP_ENV') == 'production') {
                $fileName = (new ImageService())->saveImageToHost($path,  $path . '/' . $fileName, $request->bearerToken());
            }
            $thanhtich->hinhanh = $fileName;
        }

        $thanhtich->save();

        return ThanhTichResource::collection(ThanhTich::where('doanhnghiep_id', $doanhnghiep->id)->get());
    }

    public function createHoSoNangLuc(Request $request)
    {
        // $request->validate([
        //     'file' => 'required',
        // ]);
        $doanhnghiep = Doanhnghiep::where('user_id', auth('api')->id())->firstOrFail();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'assets/backend/file/hosonangluc';
            $fileName =  uniqid() . "."  . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            if (env('APP_ENV') == 'production') {
                $fileName = (new ImageService())->saveImageToHost($path,  $path . '/' . $fileName, $request->bearerToken());
            }
            $doanhnghiep->hosonangluc = $fileName;
        }

        $doanhnghiep->save();

        return $doanhnghiep->hosonangluc ? env('APP_IMAGE_URL') . '/assets/backend/file/hosonangluc/' . $doanhnghiep->hosonangluc  : "";
    }

    public function deleteThanhTich($id)
    {
        $thanhtich = ThanhTich::findOrFail($id);
        $thanhtich->delete();
        return response()->json(['success' => true], 200);
    }

    public function postNhuCau(Request $request)
    {
        $request->validate([
            'nhuCau' => 'required',
        ]);
        $user = User::findOrFail(auth('api')->id());
        $doanhnghiep = Doanhnghiep::where('user_id', $user->id)->first();
        $nhucau = new NhuCau();
        $nhucau->doanhnghiep_id = $doanhnghiep->id;
        $nhucau->caithien = request()->caiThien;
        $nhucau->nhucau = request()->nhuCau;
        $nhucau->save();

        // Gửi thông báo
        $linhvuc_id = $doanhnghiep->getNganhNghe->getLoaiHinh->linhvuc_id;
        if ($linhvuc_id) {
            $chuyengias = Chuyengia::where('linhvuc_id', $linhvuc_id)->get();
            foreach ($chuyengias as $chuyengia) {
                $to = $chuyengia->user_id;
                $message = [
                    'tieude' => $doanhnghiep->tentiengviet . ' đã gửi một nhu cầu mới',
                    'noidung' => '',
                    'loai' => 'nhucau',
                    'loai_id' => $doanhnghiep->id,
                ];
                (new NotificationService())->sendNotification($message, $to);
            }
        }
        return response()->json(['success' => true], 200);
    }

    public function register(Request $request)
    {
        // Validate
        if ($request->email) {
            $email_exist = User::where('email', $request->email)->first();
            if ($email_exist) return response()->json(['success' => false, 'message' => 'Email đã đăng ký'], 200);
        }
        $phone_exist = User::where('phone', $request->phone)->first();
        if ($phone_exist) return response()->json(['success' => false, 'message' => 'Số điện thoại đã đăng ký'], 200);
        DB::transaction(function () use ($request) {
            // User
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->status = 'Active';
            $user->save();

            // Role
            $user_vaitro = new User_Vaitro();
            $user_vaitro->user_id = $user->id;
            $user_vaitro->vaitro_id = 'dn';
            $user_vaitro->save();

            // Doanh nghiệp
            $doanhnghiep = new Doanhnghiep();
            $doanhnghiep->user_id = $user->id;
            $doanhnghiep->tentiengviet = $request->tendoanhnghiep;
            $doanhnghiep->mathue = $request->mathue;
            $doanhnghiep->save();

            // Đại diện doanh nghiệp
            $daidien = new Doanhnghiep_Daidien();
            $daidien->doanhnghiep_id = $doanhnghiep->id;
            $daidien->save();
        });
        return response()->json(['success' => true, 'message' => 'success'], 200);
    }

    public function edit(Request $request)
    {
        $doanhnghiep = Doanhnghiep::where('user_id', auth('api')->id())->firstOrFail();
        $doanhnghiep->tentiengviet = $request->tenTiengViet;
        $doanhnghiep->tentienganh = $request->tenTiengAnh;
        $doanhnghiep->tenviettat = $request->tenVietTat;
        $doanhnghiep->ngaylap = $request->ngayLap;
        $doanhnghiep->thanhpho = $request->tinh;
        $doanhnghiep->huyen = $request->huyen;
        $doanhnghiep->xa = $request->xa;
        $doanhnghiep->diachi = $request->diaChi;
        $doanhnghiep->website = $request->website;
        $doanhnghiep->mathue = $request->maThue;
        $doanhnghiep->fax = $request->fax;
        $doanhnghiep->soluongnhansu = $request->soLuongNhanSu;
        $doanhnghiep->mota = $request->moTa;
        $doanhnghiep->nganhnghe_id = $request->nganhNghe;
        $doanhnghiep->sdt = $request->sdt;
        $doanhnghiep->save();
        return new DoanhNghiepResource($doanhnghiep);
    }

    public function editDaiDien(Request $request)
    {
        $doanhnghiep = Doanhnghiep::where('user_id', auth('api')->id())->firstOrFail();
        $daidien = $doanhnghiep->getDaiDien;

        $daidien->tendaidien = $request->tenDaiDien;
        $daidien->email = $request->email;
        $daidien->sdt = $request->sdt;
        $doanhnghiep->thanhpho = $request->tinh;
        $doanhnghiep->huyen = $request->huyen;
        $doanhnghiep->xa = $request->xa;
        $daidien->diachi = $request->diaChi;
        $daidien->cccd = $request->cccd;
        $daidien->chucvu = $request->chucVu;
        $daidien->mota = $request->moTa;

        $daidien->save();
        return new DoanhNghiepResource($doanhnghiep);
    }

    public function detail($id)
    {
        $doanhnghiep = Doanhnghiep::where('id', $id)->firstOrFail();
        return new DoanhNghiepResource($doanhnghiep);
    }

    public function getDoanhNghiepHasWebsite()
    {
        $doanhnghieps = Doanhnghiep::whereNotNull('website')->where('website', '!=', '')->get();
        return DoanhNghiepResource::collection($doanhnghieps);
    }

    private function log($message)
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>" . $message . "</info>");
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)
            ->orWhere('phone', $request->email)
            ->first();

        if (!$user) return response()->json(['error' => 'Sai thông tin đăng nhập'], 404);

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Sai mật khẩu'], 404);
        }

        if (!$token = auth('api')->login($user)) {
            return response()->json(['error' => 'Sai mật khẩu'], 401);
        }

        return $this->responseWithToken($token, $user);
    }

    public function loginemail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) return response()->json(['error' => 'Không tìm thấy user'], 404);
        if (!$token = auth('api')->login($user)) {
            return response()->json(['error' => 'Sai mật khẩu'], 401);
        }

        if ($user->status != "Active") {
            return response()->json(['error' => 'Tài khoản chưa được kích hoạt'], 401);
        }

        return $this->responseWithToken($token, $user);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Đăng xuất thành công'], 200);
    }

    public function profile()
    {
        if (!$user = auth('api')->user()) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $doanhnghiep = Doanhnghiep::where('user_id', $user->id)->first();

        if (!$doanhnghiep)
            return response()->json(['error' => 'Không tìm thấy thông tin doanh nghiệp'], 404);

        return new DoanhNghiepResource($doanhnghiep);
    }

    protected function responseWithToken($token, $user)
    {
        return response()->json([
            'userProfile' => new UserResource($user),
            'accessToken' => $token
        ]);
    }
}
