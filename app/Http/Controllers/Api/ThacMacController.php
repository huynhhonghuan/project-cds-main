<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ThacMacResource;
use App\Models\ThacMac;
use Illuminate\Http\Request;

class ThacMacController extends Controller
{
    public function getThacMacOfUser()
    {
        $user_id = auth()->id();
        $thacMacs = ThacMac::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return ThacMacResource::collection($thacMacs);
    }

    public function createThacMac(Request $request)
    {
        $thacMac = new ThacMac();
        $thacMac->user_id = auth()->id();
        $thacMac->noidung = $request->noiDung;
        $thacMac->save();
        return new ThacMacResource($thacMac);
    }

    public function deleteThacMac($id)
    {
        $user_id = auth()->id();
        $thacMac = ThacMac::where('user_id', $user_id)->where('id', $id)->firstOrFail();
        $thacMac->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }
}
