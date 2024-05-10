<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChuyenGiaResource;
use App\Models\Chuyengia;
use Illuminate\Http\Request;

class ChuyenGiaController extends Controller
{
    public function index(Request $request)
    {
        $chuyenGias = [];
        if ($linhvucid = $request->input('linhvucid')) {
            $chuyenGias = Chuyengia::where('linhvuc_id', $linhvucid)->get();
        } else {
            $chuyenGias = Chuyengia::all();
        }
        return ChuyenGiaResource::collection($chuyenGias);
    }

    public function show(string $id)
    {
        $chuyenGia = Chuyengia::find($id);
        return new ChuyenGiaResource($chuyenGia);
    }
}
