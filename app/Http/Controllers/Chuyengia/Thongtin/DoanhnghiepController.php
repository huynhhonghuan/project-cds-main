<?php

namespace App\Http\Controllers\Chuyengia\Thongtin;

use App\Http\Controllers\Controller;
use App\Models\Doanhnghiep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoanhnghiepController extends Controller
{
    public function getdanhsach()
    {
        $danhsach = Doanhnghiep::all();
        foreach ($danhsach as $value) {
            if ($value->getloaihinh->getlinhvuc->id != Auth::user()->getchuyengia->getlinhvuc->id) {
                unset($value);
            }
        }
        return view('trangquanly.chuyengia.doanhnghiep.danhsach', compact('danhsach'));
    }
    public function getxemdoanhnghiep($id)
    {
        $user = Doanhnghiep::find($id);
        $user = $user->getuser;
        $tendanhsach = 'Xem thông tin doanh nghiệp';
        return view('trangquanly.chuyengia.doanhnghiep.xem', compact('user', 'tendanhsach'));
    }
}
