<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoaiHinhDoanhNghiepResource;
use App\Models\Doanhnghiep_Loaihinh;
use Illuminate\Http\Request;

class LoaiHinhDoanhNghiepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return LoaiHinhDoanhNghiepResource::collection(
            Doanhnghiep_Loaihinh::all()
        );
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
