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
        // dd($doanhnghiep[0]->getloaihinh->getlinhvuc);
        foreach ($danhsach as $value) {
            if ($value->getloaihinh->getlinhvuc->id != Auth::user()->getchuyengia->getlinhvuc->id) {
                unset($value);
            }
        }
        return view('trangquanly.chuyengia.taikhoan.danhsach', compact('danhsach'));
    }
}
