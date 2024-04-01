<?php

namespace App\Http\Controllers\Hiephoidoanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HiephoidoanhnghiepController extends Controller
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
        return view('trangquanly.hiephoidoanhnghiep.home');
    }
    //profile
    public function profile()
    {
        return view('trangquanly.hiephoidoanhnghiep.profile');
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
            return redirect()->route('hiephoidoanhnghiep.profile');
        } else {
            Toastr::warning('Đổi mật khẩu thất bại!', 'Warning');
            return redirect()->route('hiephoidoanhnghiep.profile');
        }
    }
}
