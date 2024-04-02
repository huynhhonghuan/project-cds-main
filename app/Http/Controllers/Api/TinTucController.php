<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Http\Resources\ThuVienResource;
use App\Http\Resources\TinTucResource;
use App\Http\Resources\VideoResource;
use App\Models\Linhvuc;
use App\Models\Slide;
use App\Models\Thuvien;
use App\Models\Tintuc;
use App\Models\Video;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $tinTucs = [];
        if ($linhVucId = $request->input('linhVucId')) {
            $tinTucs = $this->getTinTucByLinhVuc($linhVucId);
        } else if ($tukhoa = $request->input('tuKhoa')) {
            $tinTucs = $this->timKiemTin($tukhoa);
        } else if ($type = $request->input('type')) {
            if ($type == 'xem-nhieu') {
                $tinTucs = $this->getTinXemNhieu();
            } else if ($type == 'lien-quan' && $tinTucId = $request->input('tinTucId')) {
                $tinTucs = $this->getTinLienQuan($tinTucId);
            }
        }
        return TinTucResource::collection($tinTucs);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $tintuc = Tintuc::with(['getLinhvuc', 'getUser'])->where('id', $request->input('id'))->first();
        $tintuc->luotxem += 1;
        $tintuc->save();
        return new TinTucResource($tintuc);
    }

    public function slide()
    {
        return SliderResource::collection(Slide::all());
    }

    public function thuvien(Request $request)
    {
        if ($request->has('loai')) {
            $loai = $request->input('loai');
            return ThuVienResource::collection(Thuvien::where('loai', $loai)->get());
        } else if ($request->has('id')) {
            $id = $request->input('id');
            return new ThuVienResource(Thuvien::find($id));
        }
    }

    public function video()
    {
        return VideoResource::collection(Video::all());
    }

    private function getTinTucByLinhVuc($linhVucId)
    {
        return  Tintuc::with(['getLinhvuc', 'getUser'])
            ->where('linhvuc_id', $linhVucId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    private function getTinXemNhieu()
    {
        return  Tintuc::with(['getLinhvuc', 'getUser'])
            ->orderByDesc('luotxem')
            ->take(3)
            ->orderByDesc('created_at')
            ->get();
    }

    private function getTinLienQuan($id)
    {
        $linhVucId = Tintuc::find($id)->linhvuc_id;
        $tinLienQuan = Tintuc::with(['getLinhvuc', 'getUser'])
            ->where('linhvuc_id', $linhVucId)
            ->whereNotIn('id', [$id])
            ->orderByDesc('created_at')
            ->take(3)
            ->get();
        return $tinLienQuan;
    }

    private function timKiemTin($tuKhoa)
    {
        return Tintuc::with(['getLinhvuc', 'getUser'])
            ->where('tieuDe', 'LIKE', '%' . $tuKhoa . '%')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
