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
use App\Models\Khaosat;
use App\Models\Traloiphieu1;
use App\Models\Traloiphieu2;
use App\Models\Traloiphieu3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KhaosatController extends Controller
{
    public function getkhoitao()
    {
        $tendanhsach = 'Khởi tạo phiếu khảo sát';
        //cho có thì tạo mới khảo sát
        if (Auth::user()->getdoanhnghiep->getkhaosat->last() == null) {

            //Tạo mới khảo sát
            $khaosat = new Khaosat();
            $khaosat->thoigiantao = date('Y-m-d');
            $khaosat->doanhnghiep_id = Auth::user()->getdoanhnghiep->id;
            $khaosat->save();

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
            $danhgiaphieu1 = Danhgiaphieu1::create([
                'danhsachphieu1_id' => $danhsachphieu1->id,
            ]);
            $danhgiaphieu2 = Danhgiaphieu2::create([
                'danhsachphieu2_id' => $danhsachphieu2->id,
            ]);
            $danhgiaphieu3 = Danhgiaphieu3::create([
                'danhsachphieu3_id' => $danhsachphieu3->id,
            ]);
            $danhgiaphieu4 = Danhgiaphieu4::create([
                'danhsachphieu4_id' => $danhsachphieu4->id,
            ]);

            //đề nghị phiếu 3
            Denghiphieu3::create([
                'danhsachphieu3_id' => $danhsachphieu3->id,
            ]);

            //trả lời phiếu 1 2 3 4
            foreach (Cauhoiphieu1::all() as $item) {
                if ($item->traloi == 1)
                    Traloiphieu1::create([
                        'cauhoiphieu1_id' => $item->id,
                        'danhgiaphieu1_id' => $danhgiaphieu1->id,
                    ]);
            }
            foreach (Cauhoiphieu2::all() as $item) {
                if ($item->cauhoiphieu2_id != null)
                    Traloiphieu2::create([
                        'cauhoiphieu2_id' => $item->id,
                        'danhgiaphieu2_id' => $danhgiaphieu2->id,
                    ]);
            }
            foreach (Cauhoiphieu3::all() as $item) {
                Traloiphieu3::create([
                    'cauhoiphieu3_id' => $item->id,
                    'danhgiaphieu3_id' => $danhgiaphieu3->id,
                ]);
            }

            $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
            return view('trangquanly.doanhnghiep.khaosat.khoitao', compact('tendanhsach', 'khaosat', 'solankhaosat'));
        } else {
            $khaosat = Auth::user()->getdoanhnghiep->getkhaosat->last();
            $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
            return view('trangquanly.doanhnghiep.khaosat.khoitao', compact('tendanhsach', 'khaosat', 'solankhaosat'));
        }
    }
}
