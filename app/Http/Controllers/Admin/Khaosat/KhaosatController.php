<?php

namespace App\Http\Controllers\Admin\Khaosat;

use App\Http\Controllers\Controller;
use App\Imports\KhaosatImport;
use App\Models\Doanhnghiep;
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
        // dd($danhsach[1]->getkhaosat->last());
        return view('trangquanly.admin.khaosat.danhsach', compact('danhsach', 'tendanhsach'));
    }
    public function getthem()
    {
    }
    public function postthem(Request $request)
    {
    }
    public function getsua($id)
    {
    }
    public function postsua(Request $request, $id)
    {
    }
    public function postxoa(Request $request)
    {
    }
    public function getduyet($id)
    {
    }
    public function postnhap(Request $request)
    {
        try {
            Excel::import(new KhaosatImport, $request->file('khaosat_excel'));
            Toastr::success('Thêm khảo sát của doanh nghiệp thành công', 'Success');
            return redirect()->route('admin.khaosat.danhsach');
        } catch (Exception $e) {
            // dd($e);
            Toastr::warning('Thêm khảo sát của doanh nghiệp thành công', 'Warning');
            return redirect()->route('admin.khaosat.danhsach');
        }
    }
}
