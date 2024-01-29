<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


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
            'locked',
            'unlock'
        ]);
    }
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $email    = $request->email;
        $password = $request->password;

        // tài khoản đang hoạt động - Active
        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 'Active'])) {

            // truy xuất để biết quyền của user
            // $user = User::with('getRoles')->where('id', Auth::user()->id)->get();
            // $role = $user[0]->getRoles[0]->id;

            //đăng nhập vơi quyền admin
            if (Auth::user()->Check_Admin()) {
                Toastr::success('Đăng nhập thành công', 'Success');
                return redirect()->route('admin.home');
            }
            //đăng nhập với quyền cộng tác viên
            else if (Auth::user()->Check_Congtacvien()) {
                Toastr::success('Login successfully :)', 'Success');
                return redirect()->route('congtacvien.home');
            }
            //đăng nhập với quyền doanh nghiệp
            else if (Auth::user()->Check_Doanhnghiep()) {
                Toastr::success('Login successfully :)', 'Success');
                return redirect()->route('doanhnghiep.home');
            }
            //đăng nhập với quyền chuyên gia
            else if (Auth::user()->Check_Chuyengia()) {
                Toastr::success('Login successfully :)', 'Success');
                return redirect()->route('chuyengia.home');
            }
            // đăng nhập với quyền hiệp hội doanh nghiệp
            else if (Auth::user()->Check_Hiephoidoanhnghiep()) {
                Toastr::success('Login successfully :)', 'Success');
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
