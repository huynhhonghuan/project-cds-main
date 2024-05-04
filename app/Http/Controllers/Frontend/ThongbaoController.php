<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\ThongBao;

class ThongbaoController extends Controller
{
    public function __construct()
    {
        
    }

    public function getThongbaoUser() {
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();

        return view('trangquanly.chuyengia.home')->with('thongbaos', $thongbaos);
        // return response($thongbaos);
    }
    public function getThongbaoUserDN() {
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();

        return view('trangquanly.doanhnghiep.includes.navbar', compact('thongbaos'));
    }
    
}
