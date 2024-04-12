<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaiVietResource;
use App\Http\Resources\DanhMucResource;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    //
    public function index()
    {
        return DanhMucResource::collection(DanhMuc::all());
    }

    public function detail($id)
    {
        return new DanhMucResource(DanhMuc::findOrFail($id));
    }

    public function getBaiViets($id)
    {
        return BaiVietResource::collection(DanhMuc::findOrFail($id)->getBaiViets->sortByDesc('created_at'));
    }
}
