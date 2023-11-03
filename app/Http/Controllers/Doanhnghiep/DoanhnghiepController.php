<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoanhnghiepController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //home doanh nghiệp
    public function home()
    {
        return view('trangquanly.doanhnghiep.home');
    }
    //profile doanh nghiệp
    public function profile(){
        return view('trangquanly.doanhnghiep.profile');
    }

}
