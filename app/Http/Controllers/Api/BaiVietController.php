<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaiVietResource;
use App\Http\Resources\BinhLuanBaiVietResource;
use App\Models\BaiViet;
use App\Models\BaiViet_Anh;
use App\Models\BaiViet_BinhLuan;
use App\Models\BaiViet_DanhMuc;
use App\Models\BaiViet_Thich;
use App\Models\Doanhnghiep as ModelsDoanhnghiep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaiVietController extends Controller
{

    public function index()
    {
        $baiviets = BaiViet::where('trangthai', 1)->orderByDesc('created_at')->get();
        foreach ($baiviets as $baiviet) {
            $baiviet->liked = $this->getLikedByAuthUserAttribute($baiviet);
        }
        return BaiVietResource::collection($baiviets);
    }
    public function getBaiVietByDoanhNghiep($id)
    {
        $user_id = ModelsDoanhnghiep::findOrFail($id)->user_id;
        $baiviets = BaiViet::where('user_id', $user_id)->where('trangthai', 1)->orderByDesc('created_at')->get();
        foreach ($baiviets as $baiviet) {
            $baiviet->liked = $this->getLikedByAuthUserAttribute($baiviet);
        }
        return BaiVietResource::collection($baiviets);
    }

    public function getBaiVietsByUser($id)
    {
        $baiviets = BaiViet::where('user_id', $id)->where('trangthai', 1)->orderByDesc('created_at')->get();
        foreach ($baiviets as $baiviet) {
            $baiviet->liked = $this->getLikedByAuthUserAttribute($baiviet);
        }
        return BaiVietResource::collection($baiviets);
    }

    private function getLikedByAuthUserAttribute($baiviet)
    {
        $userId = auth('api')->id();
        return BaiViet_Thich::where('user_id', $userId)
            ->where('baiviet_id', $baiviet->id)
            ->exists();
    }

    public function detail($id)
    {
        $baiviet = BaiViet::where('trangthai',  1)->findOrFail($id);
        $baiviet->luotxem = $baiviet->luotxem + 1;
        $baiviet->save();
        $baiviet->liked = $this->getLikedByAuthUserAttribute($baiviet);
        return new BaiVietResource($baiviet);
    }

    public function getBinhLuans($id)
    {
        $baiviet = BaiViet::findOrFail($id);
        return BinhLuanBaiVietResource::collection(BaiViet_BinhLuan::where('baiviet_id', $baiviet->id)
            ->where('binhluancha_id', null)->orderByDesc('created_at')->get());
    }

    public function createBaiViet(Request $request)
    {
        DB::transaction(function () use ($request) {
            $baiviet = new BaiViet();
            $user_id = auth()->id();

            $baiviet->noidung = $request->noiDung;
            $baiviet->user_id = $user_id;
            $baiviet->trangthai = 1;
            $baiviet->save();

            foreach ($request->danhMucs as $danhmuc_id) {
                $model = new BaiViet_DanhMuc();
                $model->baiviet_id = $baiviet->id;
                $model->danhmuc_id = $danhmuc_id;
                $model->save();
            }

            $hinhAnhs = $request->file('hinhAnhs');
            if ($request->hasFile('hinhAnhs')) {
                foreach ($hinhAnhs as $hinhanh) {
                    $path = 'assets/backend/img/baiviet';
                    $fileName =  uniqid() . "."  . $hinhanh->getClientOriginalExtension();
                    $hinhanh->move($path, $fileName);
                    if (env('APP_ENV') == 'production') {
                        $fileName = $this->saveImageToHost($path,  $path . '/' . $fileName, $request->bearerToken());
                    }
                    $hinhanhModel = new BaiViet_Anh();
                    $hinhanhModel->baiviet_id = $baiviet->id;
                    $hinhanhModel->hinhanh = $fileName;
                    $hinhanhModel->save();
                }
            }
            return response()->json(['message' => 'success']);
        });
    }

    private function saveImageToHost($path, $filePath, $token)
    {
        $client = new \GuzzleHttp\Client();
        $url = env('APP_IMAGE_URL') . '/api/store-image';
        $response = $client->request('POST', $url, [
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen($filePath, 'r'),
                ],
                [
                    'name'     => 'path',
                    'contents' => $path,
                ]
            ],
            'headers'  => [
                'Authorization' => 'Bearer ' . $token
            ],
            'Content-Type' => 'multipart/form-data'
        ]);
        return $response->getBody()->getContents();
    }

    public function createBinhLuan($id, Request $request)
    {
        $baiviet = BaiViet::findOrFail($id);
        $user_id = auth()->id();
        $binhluan = new BaiViet_BinhLuan();
        $binhluan->baiviet_id = $baiviet->id;
        $binhluan->user_id = $user_id;
        $binhluan->noidung = $request->noiDung;
        $binhluan->binhluancha_id = $request->binhLuanChaId;
        $binhluan->save();
        // return BinhLuanBaiVietResource::collection($baiviet->getBinhLuans);
        return app(BaiVietController::class)->getBinhLuans($id);
    }

    public function like($id)
    {
        $user_id = auth()->id();
        $baiviet_like = BaiViet_Thich::where('user_id', $user_id)->where('baiviet_id', $id)->first();
        $baiviet = BaiViet::findOrFail($id);
        $isLike = true;
        if ($baiviet_like) {
            $baiviet_like->delete();
            $isLike = false;
            $baiviet->luotthich = $baiviet->luotthich - 1;
        } else {
            $baiviet_like = new BaiViet_Thich();
            $baiviet_like->user_id = $user_id;
            $baiviet_like->baiviet_id = $id;
            $baiviet->luotthich = $baiviet->luotthich + 1;
            $baiviet_like->save();
            $isLike = true;
        }
        $baiviet->save();

        return response()->json(['isLike' => $isLike, 'totalLike' => $baiviet->luotthich]);
    }

    public function editBaiViet($id)
    {
        // $baiviet = BaiViet::find($id);
        // $baiviet->noidung = "Nội dung mới";
        // $baiviet->save();
        // return response()->json(['message' => 'success']);
    }

    public function searchBaiViet(Request $request)
    {
        $baiviets = BaiViet::where('trangthai', 1)->where('noidung', 'like', '%' . $request->search . '%')->orderByDesc('created_at')->get();
        foreach ($baiviets as $baiviet) {
            $baiviet->liked = $this->getLikedByAuthUserAttribute($baiviet);
        }
        return BaiVietResource::collection($baiviets);
    }

    public function deleteBaiViet($id)
    {
        $baiviet = BaiViet::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $baiviet->delete();
        return response()->json(['message' => 'success']);
    }
}
