<?php

namespace App\Http\Controllers\Chuyengia;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\ThongBao;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        // dd($thongbaos);
        return view('trangquanly.chuyengia.home', compact('thongbaos'));
    }
    //profile
    public function profile()
    {
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        return view('trangquanly.chuyengia.profile', compact('thongbaos'));
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
            return redirect()->route('chuyengia.profile');
        } else {
            Toastr::warning('Đổi mật khẩu thất bại!', 'Warning');
            return redirect()->route('chuyengia.profile');
        }
    }
}
