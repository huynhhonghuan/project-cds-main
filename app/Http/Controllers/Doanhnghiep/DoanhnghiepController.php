<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Khaosat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $khaosat = Auth::user()->getdoanhnghiep->getkhaosat;
        // $chienluoc = $khaosat->getchienluoc;
        return view('trangquanly.doanhnghiep.home', compact('khaosat'));
    }
    //profile doanh nghiệp
    public function profile()
    {
        return view('trangquanly.doanhnghiep.profile');
    }

    public function khaosat()
    {
    }
}
