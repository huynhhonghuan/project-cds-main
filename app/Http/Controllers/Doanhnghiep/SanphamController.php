<?php

namespace App\Http\Controllers\Doanhnghiep;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Sanpham;

class SanphamController extends Controller
{
    public function __construct()
    {
        
    }

    public function sanpham(Request $request) {
        $id = Auth::user()->id;
        $sanpham = Sanpham::with(['getAnh'])->get();
        $tendanhsach = 'Danh sách sản phẩm';
        // dd($sanpham);
        return view('trangquanly.doanhnghiep.sanpham.danhsach', compact('sanpham', 'tendanhsach'));
    }

    public function getthem()
    {
        $sanpham = DB::table('sanpham')->get();
        return view('trangquanly.doanhnghiep.sanpham.them', compact('linhvuc'));
    }

    public function postthem(Request $request)
    {
        //kiểm tra dữ liệu từ form
        $request->validate([
            'linhvuc_id' => 'required',
            'tieude' => 'required|string',
            'tomtat' => 'required|string',
            'noidung' => 'required|string',
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'nguon' => 'required'
        ]);

        //nhận tất cả giá trị từ request của form
        $input = $request->all();
        //lấy id của tài khoản
        $input['user_id'] = Auth::user()->id;

        //truy xuất để biết quyền của user
        $role = Auth::user()->getVaiTro->first();
        //nếu là admin thì bài báo đã được duyệt
        if ($role == 'ad') $input['duyet'] = 1;
        //dd($input['duyet']);

        //thêm hình ảnh vào publish theo đường dẫn và sử lý lưu tên hình thay thế bằng năm tháng ngày giờ phút giây
        if ($image = $request->file('hinhanh')) {
            $destinationPath = 'assets/frontend/img/trangtin/';
            $profileImage = $input['linhvuc_id'] . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['hinhanh'] = "$profileImage";
        }

        //Thêm dữ liệu vào csdl
        Sanpham::create($input);

        Toastr::success('Thêm thành công:)', 'Success');
        return redirect()->route('doanhnghiep.sanpham.danhsach');
    }

    public function getsua($id)
    {
        //tìm tin tức theo id
        $sanpham = Sanpham::find($id);
        $linhvuc = DB::table('linhvuc')->get();
        return view('trangquanly.doanhnghiep.sanpham.sua', compact(['sanpham', 'linhvuc']));
    }

    public function postsua(Request $request, $id)
    {
        //kiểm tra dữ liệu từ form
        $request->validate([
            'linhvuc_id' => 'required',
            'tieude' => 'required|string',
            'tomtat' => 'required|string',
            'noidung' => 'required|string',
            'nguon' => 'required',
        ]);

        $input['linhvuc_id'] = $request->linhvuc_id;

        //kiểm tra nếu thêm mới hình ảnh thì lấy ảnh đó
        if (!empty($request->hinhanh)) {
            //set up để lưu tên hình ảnh và lưu ảnh đó vào publish theo đường dẫn
            $image = $request->file('hinhanh');
            $destinationPath = 'assets/frontend/img/trangtin/';
            $profileImage = $input['linhvuc_id'] . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            //xóa ảnh cũ ra khỏi danh sách ảnh
            if (!empty($request->hidden_hinhanh))
                unlink('assets/frontend/img/trangtin/' . $request->hidden_hinhanh);
        } else {
            //lấy tên hình ảnh cũ
            $profileImage = $request->hidden_hinhanh;
        }

        $tintuc = [
            'linhvuc_id' => $request->linhvuc_id,
            'tieude' => $request->tieude,
            'tomtat' => $request->tomtat,
            'noidung' => $request->noidung,
            'hinhanh' => $profileImage,
            'nguon'=> $request->nguon
        ];

        Sanpham::where('id', $id)->update($tintuc);

        Toastr::success('Sửa thành công:)', 'Success');
        return redirect()->route('admin.tintuc.danhsach');
    }



    // Xóa Banner
    public function postxoa(Request $request)
    {
        //xóa dữ liệu trong csdl
        Sanpham::destroy($request->id);

        unlink('assets/backend/img/sanpham/' . $request->hinhanh);
        Toastr::success('Xóa sản phẩm thành công :)', 'Success');
        return redirect()->back();
    }
    
}
