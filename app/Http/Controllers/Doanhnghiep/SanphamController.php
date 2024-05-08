<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Exports\Taikhoan\Doanhnghiep;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BaiViet_Anh;
use Illuminate\Support\Facades\Auth;
use App\Models\Sanpham;
use App\Models\Sanpham_Anh;
use App\Models\ThongBao;

class SanphamController extends Controller
{
    public function __construct()
    {
        
    }

    public function sanpham(Request $request) {
        $user_id = Auth::user()->id;
        $doanhnghiep_id = DB::table('doanhnghiep')->where('user_id', $user_id)->select('doanhnghiep.id')->value('id');
        // dd($doanhnghiep_id);
        $sanpham = Sanpham::with(['getAnh'])->where('doanhnghiep_id', $doanhnghiep_id)->get();
        $tendanhsach = 'Danh sách sản phẩm';

        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        // dd($sanpham);
        return view('trangquanly.doanhnghiep.sanpham.danhsach', compact('sanpham', 'tendanhsach','thongbaos'));
    }

    public function getthem()
    {
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        $sanpham = DB::table('sanpham')->get();
        return view('trangquanly.doanhnghiep.sanpham.them', compact('sanpham','thongbaos'));
    }

    public function postthem(Request $request)
    {
        //kiểm tra dữ liệu từ form
        $request->validate([
            'tensanpham' => 'required',
            'gia' => 'required',
            'mota' => 'required',
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user_id = Auth::user()->id;
        $doanhnghiep_id = DB::table('doanhnghiep')->where('user_id', $user_id)->select('doanhnghiep.id')->value('id');
        
        $sanpham = new Sanpham();
        $sanpham->tensanpham = $request->tensanpham;
        $sanpham->gia = $request->gia;
        $sanpham->mota = $request->mota;
        $sanpham->doanhnghiep_id = $doanhnghiep_id;
        $sanpham->save();
        // //Thêm dữ liệu vào csdl
        // Sanpham::create($input);
        //thêm hình ảnh vào publish theo đường dẫn và sử lý lưu tên hình thay thế bằng năm tháng ngày giờ phút giây
        if ($image = $request->file('hinhanh')) {
            $destinationPath = 'assets/backend/img/sanpham/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            // $input['hinhanh'] = "$profileImage";

            // $sanpham_id = $input->id;
            $hinhanhsp = new Sanpham_Anh();
            $hinhanhsp->sanpham_id = $sanpham->id;
            $hinhanhsp->hinhanh = $profileImage;
            $hinhanhsp->save();
        }
        $hinhanh = BaiViet_Anh::all();
        Toastr::success('Thêm thành công:)', 'Success');
        return redirect()->route('doanhnghiep.sanpham.danhsach', compact('hinhanh'));
    }

    public function getsua($id)
    {
        //tìm tin tức theo id
        $user_id = Auth::user()->id;
        $thongbaos = ThongBao::where("user_id" , $user_id)->orderBy('created_at', 'desc')->get();
        $sanpham = Sanpham::with(['getAnh'])->find($id);
        // $sanpham = DB::table('sa')
        // dd($sanpham);
        return view('trangquanly.doanhnghiep.sanpham.sua', compact('sanpham','thongbaos'));
    }

    public function postsua(Request $request, $id)
    {
        //kiểm tra dữ liệu từ form
        $request->validate([
            'tensanpham' => 'required',
            'gia' => 'required',
            'mota' => 'required',
        ]);

        //kiểm tra nếu thêm mới hình ảnh thì lấy ảnh đó
        if (!empty($request->hinhanh)) {
            //set up để lưu tên hình ảnh và lưu ảnh đó vào publish theo đường dẫn
            $image = $request->file('hinhanh');
            $destinationPath = 'assets/backend/img/sanpham/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            //xóa ảnh cũ ra khỏi danh sách ảnh
            if (!empty($request->hidden_hinhanh))
                unlink('assets/backend/img/sanpham/' . $request->hidden_hinhanh);
        } else {
            //lấy tên hình ảnh cũ
            $profileImage = $request->hidden_hinhanh;
        }
        $user_id = Auth::user()->id;
        $doanhnghiep_id = DB::table('doanhnghiep')->where('user_id', $user_id)->select('doanhnghiep.id')->value('id');
        

        $sanpham = [
            'tensanpham' => $request->tensanpham,
            'gia' => $request->gia,
            'mota'=> $request->mota,
            'doanhnghiep_id' => $doanhnghiep_id
        ];
        $sanpham_anh = [
            'hinhanh' => $profileImage
        ];

        Sanpham::where('id', $id)->update($sanpham);
        Sanpham_Anh::where('sanpham_id', $id)->update($sanpham_anh);

        Toastr::success('Sửa thành công:)', 'Success');
        return redirect()->route('doanhnghiep.sanpham.danhsach');
    }

    // Xóa Banner
    public function postxoa(Request $request)
    {
        //xóa dữ liệu trong csdl
        Sanpham::destroy($request->id);

        unlink('assets/backend/img/sanpham/'.$request->hinhanh);
        Toastr::success('Xóa sản phẩm thành công :)', 'Success');
        return redirect()->back();
    }
    
}
