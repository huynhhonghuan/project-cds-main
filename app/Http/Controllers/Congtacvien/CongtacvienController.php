<?php

namespace App\Http\Controllers\Congtacvien;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
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
            return redirect()->route('admin.profile');
        } else {
            Toastr::warning('Đổi mật khẩu thất bại!', 'Warning');
            return redirect()->route('admin.profile');
        }
    }
}
