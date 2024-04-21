<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Binhluan;

class BinhluanController extends Controller
{
    public function __construct()
    {
        
    }

    public function getdanhsach(Request $request)
    {
        $binhluan = Binhluan::with(['getUser', 'getTintuc'])->get();
        // dd($binhluan);
        return view('trangquanly.admin.binhluan.danhsach', compact('binhluan'))->with('tendanhsach', 'Danh sách Bình Luận');
    }

    // Xóa Banner
    public function postxoa(Request $request)
    {
        //xóa dữ liệu trong csdl
        Binhluan::destroy($request->id);

        Toastr::success('Xóa bình luận thành công :)', 'Success');
        return redirect()->back();
    }
    
}
