<?php

namespace App\Http\Controllers\Chuyengia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChuyengiaController extends Controller
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
    //home page
    public function home()
    {
        return view('trangquanly.chuyengia.home');
    }
    //profile
    public function profile(){
        return view('trangquanly.chuyengia.profile');
    }
}
