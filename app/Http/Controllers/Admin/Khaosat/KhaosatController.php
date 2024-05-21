<?php

namespace App\Http\Controllers\Admin\Khaosat;

use App\Http\Controllers\Controller;
use App\Imports\KhaosatImport;
use App\Models\Cauhoiphieu1;
use App\Models\Cauhoiphieu2;
use App\Models\Cauhoiphieu3;
use App\Models\Doanhnghiep;
use App\Models\Khaosat;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KhaosatController extends Controller
{

    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách khảo sát của doanh nghiệp';
        $danhsach  = Doanhnghiep::with('getkhaosat')->get();
        return view('trangquanly.admin.khaosat.danhsach', compact('danhsach', 'tendanhsach'));
    }

    public function getxemkhaosat($id)
    {
        $khaosat = Khaosat::find($id);
        $tendanhsach = 'Xem chi tiết khảo sát chuyển đổi số';
        if ($khaosat != null && ($khaosat->trangthai == 1 || $khaosat->trangthai == 2)) {
            return view('trangquanly.admin.khaosat.xemkhaosat', compact('khaosat', 'tendanhsach'));
        } else if ($khaosat != null && $khaosat->trangthai == 0) {
            Toastr::warning('Khảo sát chưa hoàn thành!', 'Warning');
            return redirect()->route('admin.khaosat.danhsach');
        } else {
            Toastr::warning('Chưa khảo sát!', 'Warning');
            return redirect()->route('admin.khaosat.danhsach');
        }
    }
    public function getphieu1($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 1';
        $danhsach = Cauhoiphieu1::all();
        $phieu1 = Khaosat::find($id)->getdanhsachphieu1->getdanhgiaphieu1;
        return view('trangquanly.admin.khaosat.khaosat.phieu1', compact('tendanhsach', 'danhsach', 'phieu1'));
    }
    public function getphieu2($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 2';
        $danhsach = Cauhoiphieu2::all();
        $phieu2 = Khaosat::find($id)->getdanhsachphieu2->getdanhgiaphieu2;
        return view('trangquanly.admin.khaosat.khaosat.phieu2', compact('tendanhsach', 'danhsach', 'phieu2'));
    }
    public function getphieu3($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 3';
        $danhsach = Cauhoiphieu3::all();
        $phieu3 = Khaosat::find($id)->getdanhsachphieu3->getdanhgiaphieu3;
        return view('trangquanly.admin.khaosat.khaosat.phieu3', compact('tendanhsach', 'danhsach', 'phieu3'));
    }
    public function getphieu4($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 4';
        $phieu4 = Khaosat::find($id)->getdanhsachphieu4->getdanhgiaphieu4;
        return view('trangquanly.admin.khaosat.khaosat.phieu4', compact('tendanhsach', 'phieu4'));
    }

    public function postnhap(Request $request)
    {
        try {
            foreach ($request->file('khaosat_excel') as $item) {
                Excel::import(new KhaosatImport, $item);
            }
            Toastr::success('Thêm khảo sát của doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.khaosat.danhsach');
        } catch (Exception $e) {
            dd($e);
            Toastr::warning('Thêm khảo sát của doanh nghiệp không thành công', 'Warning');
            return redirect()->route('admin.khaosat.danhsach');
        }
    }
}
