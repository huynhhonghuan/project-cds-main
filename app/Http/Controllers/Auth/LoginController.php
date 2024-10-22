<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            // 'locked',
            // 'unlock'
        ]);
    }

    public function username()
    {
        $identity = request()->get('email');
        if (is_numeric($identity))
            $fieldName = 'phone';
        elseif (filter_var($identity, FILTER_VALIDATE_EMAIL))
            $fieldName = 'email';
        else
            $fieldName = 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }

    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);


        $email    = $request->email; // email hoặc số điện thoại
        $password = $request->password;

        // tài khoản đang hoạt động - Active
        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 'Active']) || Auth::attempt(['phone' => $email, 'password' => $password, 'status' => 'Active'])) {

            //đăng nhập vơi quyền admin
            if (Auth::user()->Check_Admin()) {
                Toastr::success('Đăng nhập thành công quyền admin', 'Success');
                return redirect()->route('admin.home');
            }
            //đăng nhập với quyền cộng tác viên
            else if (Auth::user()->Check_Congtacvien()) {
                Toastr::success('Đăng nhập thành công quyền cộng tác viên', 'Success');
                return redirect()->route('congtacvien.home');
            }
            //đăng nhập với quyền doanh nghiệp
            else if (Auth::user()->Check_Doanhnghiep()) {
                Toastr::success('Đăng nhập thành công quyền doanh nghiệp', 'Success');
                return redirect()->route('doanhnghiep.home');
            }
            //đăng nhập với quyền chuyên gia
            else if (Auth::user()->Check_Chuyengia()) {
                Toastr::success('Đăng nhập thành công quyền chuyên gia', 'Success');
                return redirect()->route('chuyengia.home');
            }
            // đăng nhập với quyền hiệp hội doanh nghiệp
            else if (Auth::user()->Check_Hiephoidoanhnghiep()) {
                Toastr::success('Đăng nhập thành công quyền hiệp hội', 'Success');
                return redirect()->route('hiephoidoanhnghiep.home');
            }
        }
        //tài khoản không hoạt động
        else if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 'Inactive'])) {
            Toastr::error('Tài khoản chưa được kích hoạt! Vui lòng liên hệ Admin :)', 'Error');
            return redirect('home');
        }
        // //Đăng nhập không thành công quay trở lại trang login
        else {
            Toastr::error('Tài khoản hoặc mật khẩu không chính xác!', 'Error');
            return redirect('login');
        }
    }
    public function logout()
    {
        //Hủy bỏ Auth
        Auth::logout();
        Toastr::success('Đăng xuất thành công', 'Success');
        return redirect('login');
    }
}
