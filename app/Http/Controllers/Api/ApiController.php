<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        //data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $email    = $request->email;
        $password = $request->password;
        $token = JWTAuth::attempt([
            'email' => $email,
            'password' => $password
        ]);
        if (!empty($token)) {
            return response()->json([
                'status' => true,
                'message' => 'Đăng nhập thành công!',
                'token' => $token,
                'token_type' => 'bearer',
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Đăng nhập thất bại!',
        ]);
    }
    //
    public function profile()
    {
        $user = auth()->user();
        $user->getdoanhnghiep->getdaidien;

        return response()->json([
            'status' => true,
            'message' => 'Thông tin doanh nghiệp',
            'user' => $user,
        ]);
    }
    public function refreshToken()
    {
        $newToken = auth()->refresh();
        return response()->json([
            'status' => true,
            'message' => 'Access Token mới',
            'token' => $newToken
        ]);
    }
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => true,
            'message' => 'Đăng xuất thành công!',
        ]);
    }
}
