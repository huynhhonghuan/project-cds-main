<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        
    }

    public function getdanhsach(Request $request)
    {
        $videos = Video::all();
  
        return view('trangquanly.admin.video.danhsach', compact('videos'))->with('tendanhsach', 'Danh sách Video');
    }
    // Thêm Video
    public function getthem()
    {
        $videos = DB::table('videos')->get();
        return view('trangquanly.admin.video.them', compact('videos'));
    }
    public function postthem(Request $request)
    {
        //kiểm tra dữ liệu từ form
        $request->validate([
            'tieude' => 'required',
            'file' => 'required',
        ]);

        //nhận tất cả giá trị từ request của form
        $input = $request->all();
        //truy xuất để biết quyền của user
        $role = Auth::user()->getVaiTro->first();
        //nếu là admin thì bài báo đã được duyệt
        if ($role == 'ad') {
            $input['status'] = 1;
        }
        $input['user_id'] = 1;

        //Thêm dữ liệu vào csdl
        Video::create($input);

        Toastr::success('Thêm thành công:)', 'Success');
        return redirect()->route('admin.video.danhsach');
    }
    //-------------------------------------------------
    // Sửa Video
    public function getsua($id)
    {
        //tìm tin tức theo id
        $videos = Video::find($id);
        return view('trangquanly.admin.video.sua', compact('videos'));
    }
    public function postsua(Request $request, $id)
    {
        //kiểm tra dữ liệu từ form
        $request->validate([
            'tieude' => 'required',
            'file' => 'required'
        ]);

        $videos = [
            'tieude'=> $request->tieude,
            'file'=> $request->file,
        ];

        Video::where('id', $id)->update($videos);

        Toastr::success('Sửa thành công:)', 'Success');
        return redirect()->route('admin.video.danhsach');
    }
    // // Xóa Video
    public function postxoa(Request $request)
    {
        //xóa dữ liệu trong csdl
        Video::destroy($request->id);

        Toastr::success('Xóa video thành công :)', 'Success');
        return redirect()->back();
    }
    // //duyệt bài báo
    public function getduyet($id)
    {
        //tìm tin tức theo id
        $videos = Video::find($id);

        //nếu 1 thì set = 0 và ngược lại
        $videos->duyet == 1 ? $input['duyet'] = 0 : $input['duyet'] = 1;

        $videos->duyet = $input['duyet'];

        //Tintuc::where('id',$id)->update($tintuc);
        $videos->save();

        Toastr::success('Duyệt thành công:)', 'Success');
        return redirect()->route('admin.video.danhsach');
    }

}
