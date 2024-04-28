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
            $chuyenGias = Chuyengia::with(['getUser', 'getLinhVuc'])->where('linhvuc_id', $linhvucid)->get();
        } else {
            $chuyenGias = Chuyengia::with(['getUser', 'getLinhVuc'])->get();
        }
        return ChuyenGiaResource::collection($chuyenGias);
    }

    public function show(string $id)
    {
        $chuyenGia = Chuyengia::with(['getUser', 'getLinhVuc'])->find($id);
        return new ChuyenGiaResource($chuyenGia);
    }
}
