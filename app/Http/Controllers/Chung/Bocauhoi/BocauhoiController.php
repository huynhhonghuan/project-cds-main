<?php

namespace App\Http\Controllers\Chung\Bocauhoi;

use App\Exports\Phieu1Export;
use App\Http\Controllers\Controller;
use App\Imports\CauhoiImport;
use App\Models\Cauhoiphieu1;
use App\Models\Cauhoiphieu2;
use App\Models\Cauhoiphieu3;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class BocauhoiController extends Controller
{
    public function getxuat()
    {
        try {
            return Excel::download(new Phieu1Export, 'cauhoiphieu1.xlsx');
        } catch (Exception $e) {
            Toastr::info('Xuất bộ câu hỏi chuyển đổi số không thành công!', 'Info');
        }
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
        $layout = '';
        if (Auth::user()->getvaitro[0]->id == 'ad') {
            $layout = 'trangquanly.admin.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'dn') {
            $layout = 'trangquanly.doanhnghiep.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'cg') {
            $layout = 'trangquanly.chuyengia.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'hhdn') {
            $layout = 'trangquanly.hiephoidoanhnghiep.layout';
        }
        if ($layout != null)
            return view('trangquanly.chung.bocauhoi.danhsachphieu1', compact('tendanhsach', 'danhsach', 'layout'));
    }
    public function getdanhsachphieu2()
    {
        $tendanhsach = 'Phiếu khảo sát 02';
        $danhsach = Cauhoiphieu2::all();
        $layout = '';
        if (Auth::user()->getvaitro[0]->id == 'ad') {
            $layout = 'trangquanly.admin.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'dn') {
            $layout = 'trangquanly.doanhnghiep.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'cg') {
            $layout = 'trangquanly.chuyengia.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'hhdn') {
            $layout = 'trangquanly.hiephoidoanhnghiep.layout';
        }
        if ($layout != null)
            return view('trangquanly.chung.bocauhoi.danhsachphieu2', compact('tendanhsach', 'danhsach', 'layout'));
    }
    public function getdanhsachphieu3()
    {
        $tendanhsach = 'Phiếu khảo sát 3';
        $danhsach = Cauhoiphieu3::all();
        $layout = '';
        if (Auth::user()->getvaitro[0]->id == 'ad') {
            $layout = 'trangquanly.admin.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'dn') {
            $layout = 'trangquanly.doanhnghiep.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'cg') {
            $layout = 'trangquanly.chuyengia.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'hhdn') {
            $layout = 'trangquanly.hiephoidoanhnghiep.layout';
        }
        if ($layout != null)
            return view('trangquanly.chung.bocauhoi.danhsachphieu3', compact('tendanhsach', 'danhsach', 'layout'));
    }
    public function getdanhsachphieu4()
    {
        $tendanhsach = 'Phiếu khảo sát 04';
        $layout = '';
        if (Auth::user()->getvaitro[0]->id == 'ad') {
            $layout = 'trangquanly.admin.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'dn') {
            $layout = 'trangquanly.doanhnghiep.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'cg') {
            $layout = 'trangquanly.chuyengia.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'hhdn') {
            $layout = 'trangquanly.hiephoidoanhnghiep.layout';
        }
        if ($layout != null)
            return view('trangquanly.chung.bocauhoi.danhsachphieu4', compact('tendanhsach', 'layout'));
    }

    public function getdanhsachphieu1_demo()
    {
        $tendanhsach = 'Phiếu khảo sát 01';
        $danhsach = Cauhoiphieu1::all();
        $soluong = Cauhoiphieu1::whereNull('cauhoiphieu1_id')->get();
        // dd($soluong);
        $layout = '';
        if (Auth::user()->getvaitro[0]->id == 'ad') {
            $layout = 'trangquanly.admin.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'dn') {
            $layout = 'trangquanly.doanhnghiep.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'cg') {
            $layout = 'trangquanly.chuyengia.layout';
        }
        if (Auth::user()->getvaitro[0]->id == 'hhdn') {
            $layout = 'trangquanly.hiephoidoanhnghiep.layout';
        }
        if ($layout != null)
            return view('trangquanly.chung.bocauhoi.danhsachphieu1_demo', compact('tendanhsach', 'danhsach', 'layout'));
    }
}
