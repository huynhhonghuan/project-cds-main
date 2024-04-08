<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Khaosat;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function doimatkhau(Request $request, $id)
    {
        $request->validate([
            'password_old' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::find($id);
        if (Hash::check($request->password_old, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            Toastr::success('Đổi mật khẩu thành công', 'Success');
            return redirect()->route('doanhnghiep.profile');
        } else {
            Toastr::warning('Đổi mật khẩu thất bại!', 'Warning');
            return redirect()->route('doanhnghiep.profile');
        }
    }
}