<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('trangquanly.admin.dashboard.home');
    }
    //profile
    public function profile(){
        return view('trangquanly.admin.profile');
    }
}
