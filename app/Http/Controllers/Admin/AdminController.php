<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function profile()
    {
        return view('trangquanly.admin.profile');
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
