<?php

namespace App\Http\Controllers\Admin\Bocauhoi;

use App\Exports\Phieu1Export;
use App\Http\Controllers\Controller;
use App\Imports\CauhoiImport;
use App\Imports\Phieu1;
use App\Imports\Phieu2;
use App\Imports\Phieu3;
use App\Models\Cauhoiphieu1;
use App\Models\Cauhoiphieu2;
use App\Models\Cauhoiphieu3;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BocauhoiController extends Controller
{
    public function getxuat()
    {
        return Excel::download(new Phieu1Export, 'cauhoiphieu1.xlsx');
    }

    public function postnhap(Request $request)
    {
        try {
            Excel::import(new CauhoiImport, $request->file('excel_file'));
            Toastr::success('Thêm bộ câu hỏi chuyển đổi số thành công', 'Success');
        } catch (Exception $e) {
            Toastr::warning('Thêm bộ câu hỏi chuyển đổi số KHÔNG thành công!', 'Warning');
        }
        return redirect()->route('admin.home');
    }

    public function getdanhsachphieu1()
    {
        $tendanhsach = 'Phiếu khảo sát 01';
        $danhsach = Cauhoiphieu1::all();
        $soluong = Cauhoiphieu1::whereNull('cauhoiphieu1_id')->get();
        // dd($soluong);
        return view('trangquanly.admin.bocauhoi.danhsachphieu1', compact('tendanhsach', 'danhsach'));
    }
    public function getdanhsachphieu2()
    {
        $tendanhsach = 'Phiếu khảo sát 02';
        $danhsach = Cauhoiphieu2::all();
        return view('trangquanly.admin.bocauhoi.danhsachphieu2', compact('tendanhsach', 'danhsach'));
    }
    public function getdanhsachphieu3()
    {
        $tendanhsach = 'Phiếu khảo sát 3';
        $danhsach = Cauhoiphieu3::all();
        return view('trangquanly.admin.bocauhoi.danhsachphieu3', compact('tendanhsach', 'danhsach'));
    }
    public function getdanhsachphieu4()
    {
        $tendanhsach = 'Phiếu khảo sát 04';
        return view('trangquanly.admin.bocauhoi.danhsachphieu4', compact('tendanhsach'));
    }
}
