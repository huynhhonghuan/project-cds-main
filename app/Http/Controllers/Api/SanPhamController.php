<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SanPhamAnhResource;
use App\Http\Resources\SanPhamResource;
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
        $sanPhams = SanPham::orderBy('doanhnghiep_id')->orderBy('created_at', 'DESC')->get();
        return SanPhamResource::collection($sanPhams);
    }

    public function getSanPhamRandom(Request $request)
    {
        $count = $request->input('count', 20);
        return SanPhamResource::collection(SanPham::inRandomOrder()->limit($count)->get());
    }

    public function getSanPhamMoiNhat()
    {
        return SanPhamResource::collection(SanPham::orderByDesc('created_at')->limit(20)->get());
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
        $sanpham = new Sanpham();
        $user_id = auth()->id();
        $doanhnghiep_id = Doanhnghiep::where('user_id', $user_id)->firstOrFail()->id;

        DB::transaction(function () use ($request, $doanhnghiep_id, $sanpham) {
            $sanpham->doanhnghiep_id = $doanhnghiep_id;
            $sanpham->tensanpham = $request->tenSanPham;
            $sanpham->gia = $request->gia;
            $sanpham->mota = $request->moTa;
            $sanpham->save();

            if ($request->hasFile('hinhAnhs')) {
                foreach ($request->file('hinhAnhs') as $hinhAnh) {
                    $path = 'assets/backend/img/sanpham';
                    $fileName =  uniqid() . "."  . $hinhAnh->getClientOriginalExtension();
                    $hinhAnh->move($path, $fileName);
                    if (env('APP_ENV') == 'production') {
                        $fileName = $this->saveImageToHost($path,  $path . '/' . $fileName, $request->bearerToken());
                    }
                    $hinhanhModel = new SanPhamAnh();
                    $hinhanhModel->sanpham_id = $sanpham->id;
                    $hinhanhModel->hinhanh = $fileName;
                    $hinhanhModel->save();
                }
            }
        });
        $sanPhams = Sanpham::where('doanhnghiep_id', $doanhnghiep_id)->orderByDesc('created_at')->get();
        return SanPhamResource::collection($sanPhams);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'tenSanPham' => ['required', 'string'],
            'gia' => ['required', 'string'],
            'moTa' => ['required', 'string'],
        ]);
        $doanhnghiep = Doanhnghiep::where('user_id', auth('api')->id())->firstOrFail();
        $sanpham = Sanpham::where('id', $request->id)->where('doanhnghiep_id', $doanhnghiep->id)->firstOrFail();
        $sanpham->tensanpham = $request->tenSanPham;
        $sanpham->gia = $request->gia;
        $sanpham->mota = $request->moTa;
        $sanpham->save();
        $sanPhams = Sanpham::where('doanhnghiep_id',  $doanhnghiep->id)->orderByDesc('created_at')->get();
        return SanPhamResource::collection($sanPhams);
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
        $sanpham = Sanpham::where('id', $id)->where('doanhnghiep_id', $doanhnghiep_id)->firstOrFail();
        $sanpham->delete();
        $sanPhams = Sanpham::where('doanhnghiep_id',  $doanhnghiep_id)->orderByDesc('created_at')->get();
        return SanPhamResource::collection($sanPhams);
    }

    public function deleteanhsanpham($id)
    {
        $anhsp = SanPhamAnh::findOrFail($id);
        $anhsp->delete();
        return response()->json(['message' => 'success']);
    }

    public function createanhsanpham(Request $request)
    {
        $sanpham = Sanpham::findOrFail($request->id);
        $hinhAnh = $request->file('hinhAnh');
        if ($request->hasFile('hinhAnh')) {
            $path = 'assets/backend/img/sanpham';
            $fileName =  uniqid() . "."  . $hinhAnh->getClientOriginalExtension();
            $hinhAnh->move($path, $fileName);
            if (env('APP_ENV') == 'production') {
                $fileName = $this->saveImageToHost($path,  $path . '/' . $fileName, $request->bearerToken());
            }
            $hinhanhModel = new SanPhamAnh();
            $hinhanhModel->sanpham_id = $sanpham->id;
            $hinhanhModel->hinhanh = $fileName;
            $hinhanhModel->save();
        }
        return new SanPhamAnhResource($hinhanhModel);
    }
}
