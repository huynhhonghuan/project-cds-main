<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Khaosat;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhgiacController extends Controller
{
    public function getxem($id)
    {
        $tendanhsach = 'Đánh giá chuyển đổi số';
        $danhsach = Khaosat::find($id);//->orderBy('updated_at', 'desc')->get(); //->paginate(5);
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        // dd(count($danhsach->getdanhgia));
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.doanhnghiep.danhgia.xem', compact('tendanhsach', 'danhsach','thongbaos'));
    }
}
