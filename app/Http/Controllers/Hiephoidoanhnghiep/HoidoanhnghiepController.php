<?php

namespace App\Http\Controllers\Hoidoanhnghiep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HoidoanhnghiepController extends Controller
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
    public function index()
    {
        return view('hoidoanhnghiep.home');
    }
    //profile
    public function profile(){
        return view('hoidoanhnghiep.profile');
    }
}
