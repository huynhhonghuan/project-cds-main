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
use App\Models\Khaosat_Chienluoc;
use App\Models\Mohinh_Doanhnghiep_Trucot;
use App\Models\Mohinh_Trucot;
use App\Models\Traloiphieu1;
use App\Models\Traloiphieu2;
use App\Models\Traloiphieu3;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KhaosatController extends Controller
{
    public function getkhoitao()
    {
        $tendanhsach = 'Khởi tạo phiếu khảo sát';
        //cho có thì tạo mới khảo sát
        if (Auth::user()->getdoanhnghiep->getkhaosat->last() == null || Auth::user()->getdoanhnghiep->getkhaosat->last()->trangthai == 2) {

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

    private $ketqua, $doanhnghiep_loaihinh_id, $ketqua_item, $i = 0;

    public final function gethoanthanh($id)
    {
        if ($this->i == 0) {
            $this->ketqua = Khaosat::find($id)->getdanhsachphieu1->getketquaphieu1;
            $this->doanhnghiep_loaihinh_id = Khaosat::find($id)->getdoanhnghiep->doanhnghiep_loaihinh_id;
            $this->i = 1;
        }
        if (count($this->ketqua) > 0) {
            // Sử dụng hàm min của Laravel Collection để tìm phần tử có giá trị nhỏ nhất
            $minPhanTram = $this->ketqua->min('phantram');
            // Tìm phần tử có giá trị phantram bằng giá trị nhỏ nhất
            foreach ($this->ketqua as $key => $kt) {
                if ($kt->phantram == $minPhanTram) {
                    $this->ketqua_item = $kt;
                    unset($this->ketqua[$key]);
                    // dump('ketquaketqua_item:' . $this->ketqua_item);
                    break;
                }
            }
            $mohinh = Mohinh_Doanhnghiep_Trucot::whereRaw(
                'mohinh_trucot_id = ? AND doanhnghiep_loaihinh_id = ?',
                [$this->ketqua_item->mohinh_trucot_id, $this->doanhnghiep_loaihinh_id]
            )->first();
            if ($mohinh != null) {
                $khaosat = Khaosat::find($id);
                $mucdo = 1;
                if ($khaosat) {
                    ($khaosat->tongdiem >= 0 && $khaosat->tongdiem <= 20) ? $mucdo = 1 : '';
                    ($khaosat->tongdiem > 20 && $khaosat->tongdiem <= 64) ? $mucdo = 2 : '';
                    ($khaosat->tongdiem > 64 && $khaosat->tongdiem <= 128) ? $mucdo = 3 : '';
                    ($khaosat->tongdiem > 128 && $khaosat->tongdiem <= 192) ? $mucdo = 4 : '';
                    ($khaosat->tongdiem > 192 && $khaosat->tongdiem <= 256) ? $mucdo = 5 : '';
                    ($khaosat->tongdiem == 320) ? $mucdo = 6 : '';
                }

                $chienluoc = Khaosat_Chienluoc::insert([
                    'khaosat_id' => $id,
                    'mucdo_id' => $mucdo,
                    'mohinh_id' => $mohinh->mohinh_id,
                    'user_id' => null,
                    'trangthai' => 1,
                ]);

                $khaosat = Khaosat::find($id);
                $khaosat->update([
                    'trangthai' => 2 // đã đề xuất
                ]);
                return redirect()->route('doanhnghiep.chienluoc.xem', [$id]);
            } else {
                $this->gethoanthanh($id);
            }
        } else {
            Toastr::warning('Chưa có chiến lược đề xuất được cho doanh nghiệp của bạn!', 'warning');
        }
        return redirect()->route('doanhnghiep.home');
    }

    public function postxoa(Request $request)
    {
        try {
            $request->validate([
                'khaosat_id' => 'required|exists:khaosat,id'
            ]);
            Khaosat::destroy($request->khaosat_id);
            Toastr::success('Xóa khảo sát thành công', 'success');
            return redirect()->route('doanhnghiep.home');
        } catch (Exception $e) {
            dd($e);
            Toastr::warning('Xóa khảo sát thất bại', 'warning');
            $khaosat = Auth::user()->getdoanhnghiep->getkhaosat->last();
            $solankhaosat = count(Auth::user()->getdoanhnghiep->getkhaosat);
            return redirect()->route('doanhnghiep.khaosat.xem', ['id' => $khaosat->id, 'solankhaosat' => $solankhaosat]);
        }
    }
}
