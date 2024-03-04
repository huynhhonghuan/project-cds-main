<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BinhLuanResource;
use App\Models\Binhluan;
use App\Models\Tintuc;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function index()
    {
        if (!$tinTucId = request()->input('tinTucId')) {
            return response()->json(['error' => 'Không tìm thấy tin tức']);
        }

        $binhLuans = Binhluan::with(['getUser', 'getPhanHois.getUser'])
            ->where('tintuc_id', $tinTucId)
            ->where('binhluan_id', null)
            ->orderBy('ngaydang', 'desc')
            ->get();
        return BinhLuanResource::collection($binhLuans);
    }
    public function store(Request $request)
    {
        $request->validate([
            'noiDung' => 'string|required',
            'tinTucId' => 'required|exists:tintuc,id'
        ]);

        $model = new Binhluan([
            'user_id' => auth()->id(),
            'tintuc_id' => $request->tinTucId,
            'noidung' => $request->noiDung,
            'binhluan_id' => $request->binhLuanChaId,
            'ngaydang' => Carbon::now(),
        ]);
        $model->save();
        return response()->json(['success' => 'Lưu bình luận thành công']);
    }
}
