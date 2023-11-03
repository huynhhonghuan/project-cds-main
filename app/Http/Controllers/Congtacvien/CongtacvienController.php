<?php

namespace App\Http\Controllers\Congtacvien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CongtacvienController extends Controller
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
        return view('trangquanly.congtacvien.home');
    }
    //profile
    public function profile(){
        return view('trangquanly.congtacvien.profile');
    }
}
