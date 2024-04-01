<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Thuvien;

class ThuvienController extends Controller
{
    public function __construct()
    {
        
    }

    public function getdanhsach(Request $request)
    {
        $thuviens = Thuvien::all();
  
        return view('trangquanly.admin.thuvien.danhsach', compact('thuviens'))->with('tendanhsach', 'Danh sách Văn bản');
    }

    public function getloaithuvien($phanloai)
    {
        if ($phanloai == 1) {
            $thuviens = DB::table('thuvien')->select('thuvien.*')->where('thuvien.loai', '1')->paginate(50);
            $laycre = DB::table('thuvien')->select('thuvien.*')->where('thuvien.loai', '1')->paginate(1);
            return view('trangchu.thuvien')->with('thuviens', $thuviens)->with('laycre', $laycre);
        } 
        if ($phanloai == 0) {
            $thuviens = DB::table('thuvien')->select('thuvien.*')->where('thuvien.loai', '0')->paginate(50);
            $laycre = DB::table('thuvien')->select('thuvien.*')->where('thuvien.loai', '0')->paginate(1);
            return view('trangchu.thuvien')->with('thuviens', $thuviens)->with('laycre', $laycre);
        } 
    }

    public function download(Request $request, $file) {
        return response()->download(public_path(asset('assets/frontend/file/'.$file)));
    }
    // Thêm Video
    public function getthem()
    {
        $thuviens = DB::table('thuvien')->get();
        return view('trangquanly.admin.thuvien.them', compact('thuviens'));
    }
    public function postthem(Request $request)
    {
        //kiểm tra dữ liệu từ form
        $request->validate([
            'tieude' => 'required',
            'file' => 'required|mimes:pdf, docx',
            'namphathanh' => 'required',
            'kyhieu' => 'required',
            'loai' => 'required',
        ]);

        //nhận tất cả giá trị từ request của form
        $input = $request->all();
        //thêm hình ảnh vào publish theo đường dẫn và sử lý lưu tên hình thay thế bằng năm tháng ngày giờ phút giây
        if ($file = $request->file('file')) {
            $destinationPath = 'assets/frontend/file/';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }
        //Thêm dữ liệu vào csdl
        Thuvien::create($input);
        Toastr::success('Thêm thành công:)', 'Success');
        return redirect()->route('admin.thuvien.danhsach');
    }
    // //-------------------------------------------------
    // // Sửa Video
    // public function getsua($id)
    // {
    //     //tìm tin tức theo id
    //     $videos = Video::find($id);
    //     return view('trangquanly.admin.video.sua', compact('videos'));
    // }
    // public function postsua(Request $request, $id)
    // {
    //     //kiểm tra dữ liệu từ form
    //     $request->validate([
    //         'tieude' => 'required',
    //         'file' => 'required'
    //     ]);

    //     $videos = [
    //         'tieude'=> $request->tieude,
    //         'file'=> $request->file,
    //     ];

    //     Video::where('id', $id)->update($videos);

    //     Toastr::success('Sửa thành công:)', 'Success');
    //     return redirect()->route('admin.video.danhsach');
    // }
    // // // Xóa Video
    // public function postxoa(Request $request)
    // {
    //     //xóa dữ liệu trong csdl
    //     Video::destroy($request->id);

    //     Toastr::success('Xóa video thành công :)', 'Success');
    //     return redirect()->back();
    // }
}
