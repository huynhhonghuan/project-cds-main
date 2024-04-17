<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaiVietResource;
use App\Http\Resources\BinhLuanBaiVietResource;
use App\Http\Resources\SanPhamResource;
use App\Models\BaiViet;
use App\Models\BaiViet_Anh;
use App\Models\BaiViet_BinhLuan;
use App\Models\BaiViet_DanhMuc;
use App\Models\BaiViet_Thich;
use App\Models\Doanhnghiep;
use App\Models\SanPham;
use App\Models\SanPhamAnh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    //
    public function index()
    {
        $sanPhams = SanPham::all()->orderByDesc('created_at')->get();

        return SanPhamResource::collection($sanPhams);
    }

    public function getSanPhamByDoanhNghiep($id)
    {
        $sanPhams = SanPham::where('doanhnghiep_id', $id)->orderByDesc('created_at')->get();
        return SanPhamResource::collection($sanPhams);
    }

    public function detail($id)
    {
        return new SanPhamResource(SanPham::findOrFail($id));
    }

    public function create(Request $request)
    {
        $request->validate([
            'tenSanPham' => ['required', 'string'],
            'gia' => ['required', 'string'],
            'moTa' => ['required', 'string'],
        ]);
        DB::transaction(function () use ($request) {
            $sanpham = new SanPham();
            $user_id = auth()->id();
            $doanhnghiep_id = Doanhnghiep::where('user_id', $user_id)->firstOrFail()->id;

            $sanpham->doanhnghiep_id = $doanhnghiep_id;
            $sanpham->tensanpham = $request->tenSanPham;
            $sanpham->gia = $request->gia;
            $sanpham->mota = $request->moTa;
            $sanpham->save();

            $hinhAnhs = $request->file('hinhAnhs');
            if ($request->hasFile('hinhAnhs')) {
                foreach ($hinhAnhs as $hinhanh) {
                    $path = 'assets/backend/img/sanpham';
                    $fileName =  uniqid() . "."  . $hinhanh->getClientOriginalExtension();
                    $hinhanh->move($path, $fileName);
                    if (env('APP_ENV') == 'production') {
                        $fileName = $this->saveImageToHost($path,  $path . '/' . $fileName, $request->bearerToken());
                    }
                    $hinhanhModel = new SanPhamAnh();
                    $hinhanhModel->sanpham_id = $sanpham->id;
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

    public function editBaiViet($id)
    {
        // $baiviet = BaiViet::find($id);
        // $baiviet->noidung = "Nội dung mới";
        // $baiviet->save();
        // return response()->json(['message' => 'success']);
    }

    public function delete($id)
    {
        $user_id = auth()->id();
        $doanhnghiep_id = Doanhnghiep::where('user_id', $user_id)->firstOrFail()->id;
        $sanpham = SanPham::where('id', $id)->where('doanhnghiep_id', $doanhnghiep_id)->firstOrFail();
        $sanpham->delete();
        return response()->json(['message' => 'success']);
    }
}
