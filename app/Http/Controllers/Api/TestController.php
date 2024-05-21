<?php

namespace App\Http\Controllers\Api;

use App\Exports\Taikhoan\Doanhnghiep;
use App\Http\Controllers\Controller;
use App\Http\Resources\LinhVucResource;
use App\Http\Resources\Tintuc as ResourcesTintuc;
use App\Http\Resources\TinTucCollection;
use App\Http\Services\ImageService;
use App\Models\Doanhnghiep as ModelsDoanhnghiep;
use App\Models\Linhvuc;
use App\Models\Tintuc;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $doanhnghiep = ModelsDoanhnghiep::with('getUser')->get();
        return view("trangchu.test", compact('doanhnghiep'));
    }

    public function upload(Request $request)
    {
        $user = User::find($request->id);
        $file = $request->file('file');
        $path = 'assets/backend/img/hoso';
        $saveFileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $saveFileName);
        if (env('APP_ENV') == 'production') {
            $saveFileName = (new ImageService())->saveImageToHost($path,  $path . '/' . $saveFileName, "");
        }
        $user->image = $saveFileName;

        $user->save();

        return response()->json(['success' => 'Lưu ảnh thành công']);
    }
}
