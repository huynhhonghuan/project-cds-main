<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Http\Controllers\Controller;
use App\Models\Ketquaphieu1;
use App\Models\Khaosat;
use App\Models\Mohinh_Trucot;
use App\Models\Mucdo;
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
        $khaosat1 = Auth::user()->getdoanhnghiep->getkhaosat;
        //Biểu đồ tròn
        $trucot1 = Mohinh_Trucot::all();
        $trucot_labels = $trucot1->pluck('tentrucot');

        //Biểu đồ đường
        $mucdo1 = Mucdo::all();
        $mucdo_labels = $mucdo1->pluck('tenmucdo');
        $mucdo_labels->prepend('Chưa bắt đầu');

        $colors = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 172, 255, 0.2)'
        ];

        $trucot = [];
        $mucdo = [];
        $khaosat = [];

        foreach ($khaosat1 as $key => $it) {
            // lấy giá trị trụ cột
            if ($it->getdanhsachphieu1->getketquaphieu1 != null)
                $trucot = [
                    $it->getdanhsachphieu1->getketquaphieu1[0]->phantram,
                    $it->getdanhsachphieu1->getketquaphieu1[1]->phantram,
                    $it->getdanhsachphieu1->getketquaphieu1[2]->phantram,
                    $it->getdanhsachphieu1->getketquaphieu1[3]->phantram,
                    $it->getdanhsachphieu1->getketquaphieu1[4]->phantram,
                    $it->getdanhsachphieu1->getketquaphieu1[5]->phantram,
                ];
            //tính toán giá trị mức độ
            if ($it->trangthai != 0) {
                $it->tongdiem == 0 ? $mucdo = [0] : '';
                ($it->tongdiem > 0 && $it->tongdiem <= 64) ? $mucdo = [0, $it->tongdiem] : '';
                ($it->tongdiem > 64 && $it->tongdiem <= 128) ? $mucdo = [0, 64, $it->tongdiem] : '';
                ($it->tongdiem > 128 && $it->tongdiem <= 192) ? $mucdo = [0, 64, 128, $it->tongdiem] : '';
                ($it->tongdiem > 192 && $it->tongdiem <= 256) ? $mucdo = [0, 64, 128, 192, $it->tongdiem] : '';
                ($it->tongdiem == 320) ? $mucdo = [0, 64, 128, 192, 256, 320] : '';
            }
            $khaosat[] = [
                'id' => $it->id,
                'lan' => $key + 1,
                'trangthai' => $it->trangthai,
                'tongdiem' => $it->tongdiem,
                'soluongdanhgia' => count($it->getdanhgia),
                'colors' => $colors,
                'trucot_labels' => $trucot_labels,
                'trucot' => $trucot,
                'mucdo_labels' => $mucdo_labels,
                'mucdo' => $mucdo,
            ];
            $trucot = [];
            $mucdo = [];
        }
        dd($khaosat);
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
