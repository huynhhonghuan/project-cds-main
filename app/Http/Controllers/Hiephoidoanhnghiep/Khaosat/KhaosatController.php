<?php

namespace App\Http\Controllers\Hiephoidoanhnghiep\Khaosat;

use App\Http\Controllers\Controller;
use App\Models\Cauhoiphieu1;
use App\Models\Cauhoiphieu2;
use App\Models\Cauhoiphieu3;
use App\Models\Doanhnghiep;
use App\Models\Khaosat;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class KhaosatController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách đánh giá của chuyên gia';
        $danhsach = Doanhnghiep::orderBy('updated_at', 'desc')->get();
        return view('trangquanly.hiephoidoanhnghiep.khaosat.danhsach', compact('tendanhsach', 'danhsach'));
    }
    public function getxemkhaosat($id)
    {
        $doanhnghiep = Doanhnghiep::find($id);
        $tendanhsach = 'Xem chi tiết khảo sát chuyển đổi số';
        if ($doanhnghiep->getkhaosat->last() != null)
            $khaosat = Khaosat::find($doanhnghiep->getkhaosat->last()->id);
        else
            $khaosat = null;
        if ($khaosat != null && $khaosat->trangthai == 1) {
            return view('trangquanly.hiephoidoanhnghiep.khaosat.xemkhaosat', compact('khaosat'));
        } else if ($khaosat != null && $khaosat->trangthai == 0) {
            Toastr::warning('Khảo sát chưa hoàn thành!', 'Warning');
            return redirect()->route('hiephoidoanhnghiep.khaosat.danhsach');
        } else {
            Toastr::warning('Chưa khảo sát!', 'Warning');
            return redirect()->route('hiephoidoanhnghiep.khaosat.danhsach');
        }
    }
    public function getphieu1($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 1';
        $danhsach = Cauhoiphieu1::all();
        $phieu1 = Khaosat::find($id)->getdanhsachphieu1->getdanhgiaphieu1;
        // dd($phieu1[0]);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.hiephoidoanhnghiep.khaosat.phieu1', compact('tendanhsach', 'danhsach', 'phieu1'));
    }
    public function getphieu2($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 2';
        $danhsach = Cauhoiphieu2::all();
        $phieu2 = Khaosat::find($id)->getdanhsachphieu2->getdanhgiaphieu2;
        // dd($phieu2);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.hiephoidoanhnghiep.khaosat.phieu2', compact('tendanhsach', 'danhsach', 'phieu2'));
    }
    public function getphieu3($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 3';
        $danhsach = Cauhoiphieu3::all();
        $phieu3 = Khaosat::find($id)->getdanhsachphieu3->getdanhgiaphieu3;
        // dd($phieu3);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.hiephoidoanhnghiep.khaosat.phieu3', compact('tendanhsach', 'danhsach', 'phieu3'));
    }
    public function getphieu4($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 4';
        $phieu4 = Khaosat::find($id)->getdanhsachphieu4->getdanhgiaphieu4;
        // dd($phieu4);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.hiephoidoanhnghiep.khaosat.phieu4', compact('tendanhsach', 'phieu4'));
    }
    public function getxemchienluoc($id)
    {
        $doanhnghiep = Doanhnghiep::find($id);
        $tendanhsach = 'Xem chi tiết chiến lược chuyển đổi số';
        if ($doanhnghiep->getkhaosat->last() != null)
            $khaosat = Khaosat::find($doanhnghiep->getkhaosat->last()->id);
        else
            $khaosat = null;
        if ($khaosat != null && $khaosat->trangthai == 1) {
            $danhsach = Khaosat::find($id)->getchienluoc->getmohinh;
            return view('trangquanly.hiephoidoanhnghiep.khaosat.xemchienluoc', compact('danhsach', 'tendanhsach'));
        } else if ($khaosat != null && $khaosat->trangthai == 0) {
            Toastr::warning('Chưa có chiến lược đề xuất!', 'Warning');
            return redirect()->route('hiephoidoanhnghiep.khaosat.danhsach');
        } else {
            Toastr::warning('Chưa có chiến lược đề xuất!', 'Warning');
            return redirect()->route('hiephoidoanhnghiep.khaosat.danhsach');
        }
    }
    public function getxemdanhgia($id)
    {
        $doanhnghiep = Doanhnghiep::find($id);
        $tendanhsach = 'Xem chi tiết đánh giá';
        if ($doanhnghiep->getkhaosat->last() != null)
            $khaosat = Khaosat::find($doanhnghiep->getkhaosat->last()->id);
        else
            $khaosat = null;
        if ($khaosat != null && $khaosat->trangthai == 1) {
            $danhsach  = $doanhnghiep->getkhaosat->last();
            return view('trangquanly.hiephoidoanhnghiep.khaosat.xemdanhgia', compact('danhsach', 'tendanhsach'));
        } else if ($khaosat != null && $khaosat->trangthai == 0) {
            Toastr::warning('Chưa có đánh giá và góp!', 'Warning');
            return redirect()->route('hiephoidoanhnghiep.khaosat.danhsach');
        } else {
            Toastr::warning('Chưa có đánh giá và góp!', 'Warning');
            return redirect()->route('hiephoidoanhnghiep.khaosat.danhsach');
        }
    }
}
