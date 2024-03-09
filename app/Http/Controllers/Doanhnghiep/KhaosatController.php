<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Cauhoiphieu1;
use App\Models\Cauhoiphieu2;
use App\Models\Cauhoiphieu3;
use App\Models\Danhgiaphieu1;
use App\Models\Danhgiaphieu2;
use App\Models\Danhgiaphieu3;
use App\Models\Danhgiaphieu4;
use App\Models\Danhsachphieu1;
use App\Models\Danhsachphieu2;
use App\Models\Danhsachphieu3;
use App\Models\Danhsachphieu4;
use App\Models\Denghiphieu3;
use App\Models\Ketquaphieu1;
use App\Models\Khaosat;
use App\Models\Mohinh_Trucot;
use App\Models\Traloiphieu1;
use App\Models\Traloiphieu2;
use App\Models\Traloiphieu3;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KhaosatController extends Controller
{
    public function getkhoitao()
    {
        $tendanhsach = 'Khởi tạo phiếu khảo sát';
        //cho có thì tạo mới khảo sát
        if (Auth::user()->getdoanhnghiep->getkhaosat->last() == null || Auth::user()->getdoanhnghiep->getkhaosat->last()->trangthai == 1) {

            //Tạo mới khảo sát
            $khaosat =  Khaosat::create([
                'thoigiantao' => date('Y-m-d'),
                'doanhnghiep_id' => Auth::user()->getdoanhnghiep->id,
            ]);

            //danh sách phiếu 1 2 3 4
            $danhsachphieu1 = Danhsachphieu1::create([
                'khaosat_id' => $khaosat->id,
            ]);
            $danhsachphieu2 = Danhsachphieu2::create([
                'khaosat_id' => $khaosat->id,
            ]);
            $danhsachphieu3 = Danhsachphieu3::create([
                'khaosat_id' => $khaosat->id,
            ]);
            $danhsachphieu4 = Danhsachphieu4::create([
                'khaosat_id' => $khaosat->id,
            ]);

            //đánh giá phiếu 1 2 3 4
            foreach (Cauhoiphieu1::all() as $item) {
                if ($item->traloi == 1)
                    Danhgiaphieu1::create([
                        'cauhoiphieu1_id' => $item->id,
                        'danhsachphieu1_id' => $danhsachphieu1->id,
                    ]);
            }
            foreach (Cauhoiphieu2::all() as $item) {
                if ($item->cauhoiphieu2_id != null)
                    Danhgiaphieu2::create([
                        'cauhoiphieu2_id' => $item->id,
                        'danhsachphieu2_id' => $danhsachphieu2->id,
                    ]);
            }
            foreach (Cauhoiphieu3::all() as $item) {
                Danhgiaphieu3::create([
                    'cauhoiphieu3_id' => $item->id,
                    'danhsachphieu3_id' => $danhsachphieu3->id,
                ]);
            }

            //Khởi tạo 6 trụ cột cho kết quả khảo sát phiếu 1
            $mohinh_trucot = Mohinh_Trucot::all();
            foreach ($mohinh_trucot as $item) {
                Ketquaphieu1::create([
                    'danhsachphieu1_id' => $danhsachphieu1->id,
                    'mohinh_trucot_id' => $item->id
                ]);
            }

            Denghiphieu3::create([
                'danhsachphieu3_id' => $danhsachphieu3->id,
            ]);

            Danhgiaphieu4::create([
                'danhsachphieu4_id' => $danhsachphieu4->id,
            ]);
            $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat) + 1;
            return view('trangquanly.doanhnghiep.khaosat.xem', compact('tendanhsach', 'khaosat', 'solankhaosat'));
        } else {
            $khaosat = Auth::user()->getdoanhnghiep->getkhaosat->last();
            $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
            return view('trangquanly.doanhnghiep.khaosat.xem', compact('tendanhsach', 'khaosat', 'solankhaosat'));
        }
    }
    public function getxem($id, $solankhaosat)
    {
        $tendanhsach = 'Khảo sát chuyển đổi số';
        $khaosat = Khaosat::find($id);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.doanhnghiep.khaosat.xem', compact('tendanhsach', 'khaosat', 'solankhaosat'));
    }
    public function getphieu1($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 1';
        $danhsach = Cauhoiphieu1::all();
        $phieu1 = Khaosat::find($id)->getdanhsachphieu1->getdanhgiaphieu1;
        // dd($phieu1[0]);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.doanhnghiep.khaosat.phieu1', compact('tendanhsach', 'danhsach', 'phieu1'));
    }

    public function getphieu2($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 2';
        $danhsach = Cauhoiphieu2::all();
        $phieu2 = Khaosat::find($id)->getdanhsachphieu2->getdanhgiaphieu2;
        // dd($phieu2);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.doanhnghiep.khaosat.phieu2', compact('tendanhsach', 'danhsach', 'phieu2'));
    }

    public function getphieu3($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 3';
        $danhsach = Cauhoiphieu3::all();
        $phieu3 = Khaosat::find($id)->getdanhsachphieu3->getdanhgiaphieu3;
        // dd($phieu3);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.doanhnghiep.khaosat.phieu3', compact('tendanhsach', 'danhsach', 'phieu3'));
    }

    public function getphieu4($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 4';
        $phieu4 = Khaosat::find($id)->getdanhsachphieu4->getdanhgiaphieu4;
        // dd($phieu4);
        // $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return view('trangquanly.doanhnghiep.khaosat.phieu4', compact('tendanhsach', 'phieu4'));
    }
    public function postphieu4(Request $request, $id)
    {
        $request->validate([
            'noidungnhucau'  => 'required|string',
            'noidungdexuat'  => 'required|string',
        ]);

        $danhgiaphieu4 = Danhgiaphieu4::find($id);
        $danhgiaphieu4->update([
            'noidungnhucau'  => $request->noidungnhucau,
            'noidungdexuat'  => $request->noidungdexuat,
            'trangthai'  => 1
        ]);

        $danhsachphieu4 = Danhsachphieu4::find($danhgiaphieu4->danhsachphieu4_id);
        $danhsachphieu4->update([
            'soluonghoanthanh' => 2,
            'trangthai' => 1
        ]);

        Toastr::success('Lưu phiếu 4 thành công', 'Success');

        $khaosat = Auth::user()->getdoanhnghiep->getkhaosat->last();
        $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
        return redirect()->route('doanhnghiep.khaosat.xem', ['id' => $khaosat->id, 'solankhaosat' => $solankhaosat]);
    }
}
