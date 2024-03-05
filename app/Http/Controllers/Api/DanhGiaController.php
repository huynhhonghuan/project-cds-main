<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KhaoSatResource;
use App\Models\Doanhnghiep;
use App\Models\Khaosat;
use Illuminate\Http\Request;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $doanhNghiep = Doanhnghiep::where('user_id', auth('api')->id())->first();
        if (!$doanhNghiep) {
            return response()->json(['error' => 'Không tìm thấy doanh nghiệp']);
        }
        $khaoSatMoiNhat = Khaosat::with(['getChuyenGiaDanhGia.getChuyengia.getUser', 'getChienLuoc.getMoHinh', 'getChienLuoc.getMucDo'])
            ->where('doanhnghiep_id', $doanhNghiep->id)
            ->orderByDesc('created_at')
            ->first();
        $khaoSatCount = Khaosat::where('doanhnghiep_id', $doanhNghiep->id)->count();

        $resource = (new KhaoSatResource($khaoSatMoiNhat))->toArray($request);
        $resource['khaoSatCount'] = $khaoSatCount;
        return response()->json($resource);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
