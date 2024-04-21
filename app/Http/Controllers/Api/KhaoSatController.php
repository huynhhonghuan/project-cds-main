<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KhaoSatResource;
use App\Models\Doanhnghiep;
use App\Models\Khaosat;
use Illuminate\Http\Request;

class KhaoSatController extends Controller
{
    public function index(Request $request)
    {
        $doanhNghiep = Doanhnghiep::where('user_id', auth('api')->id())->first();
        if (!$doanhNghiep) {
            return response()->json(['error' => 'Không tìm thấy doanh nghiệp']);
        }

        $type = $request->input('type');

        if ($type == 'all') {
            $khaoSat = Khaosat::with(['getChuyenGia', 'getChuyenGia.getUser', 'getMoHinh', 'getMucDo', 'getKetQuaPhieu1'])
                ->where('doanhnghiep_id', $doanhNghiep->id)
                ->orderByDesc('created_at')
                ->get();
            $result = KhaoSatResource::collection($khaoSat);
        } else if ($type == 'newest') {
            $khaoSat = Khaosat::with(['getChuyenGia', 'getChuyenGia.getUser', 'getMoHinh', 'getMucDo'])
                ->where('doanhnghiep_id', $doanhNghiep->id)
                ->orderByDesc('created_at')
                ->first();
            $khaoSatCount = Khaosat::where('doanhnghiep_id', $doanhNghiep->id)->count();
            $result = (new KhaoSatResource($khaoSat))->toArray($request);
            $result['khaoSatCount'] = $khaoSatCount;
        } else {
            return response()->json(['error' => 'Thiếu tham số']);
        }

        return response()->json($result);
    }
}
