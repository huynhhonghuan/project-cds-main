<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mucdo;
use App\Models\Mohinh;


class ThongtinCDSController extends Controller
{
    public function __construct()
    {

    }

    public function Index(Request $request)
    {
        $mucdo = Mucdo::all();
        $mohinh = Mohinh::all();

        return view('trangchu.tincds', compact('mucdo', 'mohinh'));
    }

}
