<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TaiKhoanController extends Controller
{
    // Lấy thông tin tài khoản
    public function profile()
    {
        $user = auth()->user();
        return new UserResource($user);
    }

    // Đổi mật khẩu
    public function changepassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string'
        ]);
        $user = auth()->user();
        if (!Hash::check($request->currentPassword, $user->password)) {
            return response()->json(['error' => 'Mật khẩu sai'], 403);
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return response()->json(['success' => 'Đổi mật khẩu thành công']);
    }

    // Đổi mật khẩu
    public function savedevicetoken(Request $request)
    {
        $request->validate([
            'deviceToken' => 'required|string',
        ]);
        $user = auth()->user();
        $user->device_token =  $request->deviceToken;
        $user->save();
        return response()->json(['success' => 'Luu device token thanh cong']);
    }

    // Đổi tên hiển thị
    public function changename(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $user = auth()->user();

        $user->name = $request->name;
        $user->save();
        return response()->json(['success' => 'Đổi tên hiển thị thành công']);
    }

    // Đổi avatar
    public function avatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image']
        ]);
        $user = auth()->user();

        $file = $request->file('avatar');
        $path = 'assets/backend/img/hoso';
        $saveFileName = 'avatar-' . auth()->id() . '-' . $file->getClientOriginalExtension();
        $file->move($path, $saveFileName);
        $user->image = $saveFileName;
        $user->save();
        return response()->json(['success' => 'Lưu ảnh thành công']);
    }
}
