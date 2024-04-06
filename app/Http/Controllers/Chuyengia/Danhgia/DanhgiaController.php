<?php

namespace App\Http\Controllers\Chuyengia\Danhgia;

use App\Http\Controllers\Controller;
use App\Models\Cauhoiphieu1;
use App\Models\Cauhoiphieu2;
use App\Models\Cauhoiphieu3;
use App\Models\Chuyengia_Danhgia;
use App\Models\Doanhnghiep;
use App\Models\Khaosat;
use App\Models\Khaosat_Chienluoc;
use App\Models\Mohinh;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhgiaController extends Controller
{
    public function getdanhsach()
    {
        $tendanhsach = 'Danh sách đánh giá của chuyên gia';
        $danhsach = Doanhnghiep::orderBy('updated_at', 'desc')->get();
        return view('trangquanly.chuyengia.danhgia.danhsach', compact('tendanhsach', 'danhsach'));
    }
    public function getxemkhaosat($id)
    {
        $khaosat = Khaosat::find($id);
        $tendanhsach = 'Xem chi tiết khảo sát chuyển đổi số';
        if ($khaosat != null && ($khaosat->trangthai == 1 || $khaosat->trangthai == 2)) {
            return view('trangquanly.chuyengia.danhgia.xemkhaosat', compact('khaosat', 'tendanhsach'));
        } else if ($khaosat != null && $khaosat->trangthai == 0) {
            Toastr::warning('Khảo sát chưa hoàn thành!', 'Warning');
            return redirect()->route('chuyengia.danhgia.danhsach');
        } else {
            Toastr::warning('Chưa khảo sát!', 'Warning');
            return redirect()->route('chuyengia.danhgia.danhsach');
        }
    }
    public function getphieu1($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 1';
        $danhsach = Cauhoiphieu1::all();
        $phieu1 = Khaosat::find($id)->getdanhsachphieu1->getdanhgiaphieu1;
        return view('trangquanly.chuyengia.danhgia.phieu1', compact('tendanhsach', 'danhsach', 'phieu1'));
    }
    public function getphieu2($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 2';
        $danhsach = Cauhoiphieu2::all();
        $phieu2 = Khaosat::find($id)->getdanhsachphieu2->getdanhgiaphieu2;
        return view('trangquanly.chuyengia.danhgia.phieu2', compact('tendanhsach', 'danhsach', 'phieu2'));
    }
    public function getphieu3($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 3';
        $danhsach = Cauhoiphieu3::all();
        $phieu3 = Khaosat::find($id)->getdanhsachphieu3->getdanhgiaphieu3;
        return view('trangquanly.chuyengia.danhgia.phieu3', compact('tendanhsach', 'danhsach', 'phieu3'));
    }
    public function getphieu4($id)
    {
        $tendanhsach = 'Khảo sát phiếu số 4';
        $phieu4 = Khaosat::find($id)->getdanhsachphieu4->getdanhgiaphieu4;
        return view('trangquanly.chuyengia.danhgia.phieu4', compact('tendanhsach', 'phieu4'));
    }
    public function getxemchienluoc($id)
    {
        $khaosat = Khaosat::find($id);
        $tendanhsach = 'Xem chi tiết chiến lược chuyển đổi số';
        if ($khaosat != null && $khaosat->trangthai == 2) {
            $danhsach = $khaosat->getchienluoc->getmohinh;
            return view('trangquanly.chuyengia.danhgia.xemchienluoc', compact('danhsach', 'tendanhsach'));
        } else if ($khaosat != null && $khaosat->trangthai == 0) {
            Toastr::warning('Chưa có chiến lược đề xuất!', 'Warning');
            return redirect()->route('chuyengia.danhgia.danhsach');
        } else {
            Toastr::warning('Chưa có chiến lược đề xuất!', 'Warning');
            return redirect()->route('chuyengia.danhgia.danhsach');
        }
    }
    public function getxemdanhgia($id)
    {
        $khaosat = Khaosat::find($id);
        $tendanhsach = 'Xem chi tiết đánh giá';
        if ($khaosat != null && $khaosat->trangthai == 2) {
            $danhsach  = $khaosat;
            return view('trangquanly.chuyengia.danhgia.xemdanhgia', compact('danhsach', 'tendanhsach'));
        } else if ($khaosat != null && $khaosat->trangthai == 0) {
            Toastr::warning('Chưa có đánh giá và góp!', 'Warning');
            return redirect()->route('chuyengia.danhgia.danhsach');
        } else {
            Toastr::warning('Chưa có đánh giá và góp!', 'Warning');
            return redirect()->route('chuyengia.danhgia.danhsach');
        }
    }
    public function posthemdanhgia(Request $request)
    {
        // dd($request);
        try {
            $request->validate([
                'khaosat_id' => 'required|exists:khaosat,id',
                'danhgia' => 'string',
                'dexuat' => 'string'
            ]);
            $chuyengia_danhgia = Chuyengia_Danhgia::where('khaosat_id', '=', $request->khaosat_id)->where('chuyengia_id', '=', Auth::user()->id)->first();
            // dd($chuyengia_danhgia);
            if ($chuyengia_danhgia == null)
                Chuyengia_Danhgia::create([
                    'chuyengia_id' => Auth::user()->id,
                    'khaosat_id' => $request->khaosat_id,
                    'danhgia' => $request->danhgia,
                    'dexuat' => $request->dexuat
                ]);
            else {
                Toastr::warning('Đã thêm đánh giá!', 'warning');
                return redirect()->route('chuyengia.danhgia.danhsach');
            }
            Toastr::success('Thêm đánh giá thành công', 'success');
            return redirect()->route('chuyengia.danhgia.danhsach');
        } catch (Exception $e) {
            Toastr::warning('Thêm đánh giá không thành công', 'warning');
            return redirect()->route('chuyengia.danhgia.danhsach');
        }
    }
    public function getlaythongtindanhgia(Request $request)
    {
        $khaosat_id = $request->input('khaosat_id');
        $chuyengia_id = $request->input('chuyengia_id');
        $danhgia = Chuyengia_Danhgia::where('khaosat_id', '=', $khaosat_id)->where('chuyengia_id', '=', $chuyengia_id)->first();
        return response()->json([
            'id' => $danhgia->id,
            'danhgia' => $danhgia->danhgia,
            'dexuat' => $danhgia->dexuat
        ]);
    }

    public function postsuadanhgia(Request $request)
    {
        // dd($request);
        try {
            $request->validate([
                'chuyengia_danhgia_id_sua' => 'required|exists:chuyengia_danhgia,id',
                'danhgia_sua' => 'string',
                'dexuat_sua' => 'string'
            ]);
            $chuyengia_danhgia = Chuyengia_Danhgia::find($request->chuyengia_danhgia_id_sua);
            $chuyengia_danhgia->update([
                'danhgia' => $request->danhgia_sua,
                'dexuat' => $request->dexuat_sua
            ]);
            Toastr::success('Sửa đánh giá thành công', 'success');
            return redirect()->route('chuyengia.danhgia.danhsach');
        } catch (Exception $e) {
            // dd($e);
            Toastr::warning('Sửa đánh giá không thành công', 'warning');
            return redirect()->route('chuyengia.danhgia.danhsach');
        }
    }
    public function postxoadanhgia(Request $request)
    {
        try {
            $request->validate([
                'chuyengia_danhgia_id_xoa' => 'required|exists:chuyengia_danhgia,id',
            ]);
            Chuyengia_Danhgia::destroy($request->chuyengia_danhgia_id_xoa);
            Toastr::success('Xóa đánh giá thành công', 'success');
            return redirect()->route('chuyengia.danhgia.danhsach');
        } catch (Exception $e) {
            // dd($e);
            Toastr::warning('Xóa đánh giá không thành công', 'warning');
            return redirect()->route('chuyengia.danhgia.danhsach');
        }
    }
}
