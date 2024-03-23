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
  
        return view('trangquanly.admin.banner.danhsach', compact('videos'))->with('tendanhsach', 'Danh sách Video');
    }
    // Thêm banner
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
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'file' => 'required',
            'user_id',

        ]);

        //nhận tất cả giá trị từ request của form
        $input = $request->all();
        //truy xuất để biết quyền của user
        $role = Auth::user()->getVaiTro->first();
        //nếu là admin thì bài báo đã được duyệt
        if ($role == 'ad') $input['status'] = 1;

        //thêm hình ảnh vào publish theo đường dẫn và sử lý lưu tên hình thay thế bằng năm tháng ngày giờ phút giây
        if ($image = $request->file('hinhanh')) {
            $destinationPath = 'assets/frontend/img/slide/';
            $profileImage = date('YmdHis') . "." .  $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['hinhanh'] = "$profileImage";
        }
        //Thêm dữ liệu vào csdl
        Slide::create($input);

        Toastr::success('Thêm thành công:)', 'Success');
        return redirect()->route('admin.banner.danhsach');
    }
    //-------------------------------------------------
    // Sửa Banner
    public function getsua($id)
    {
        //tìm tin tức theo id
        $slides = Slide::find($id);
        return view('trangquanly.admin.banner.sua', compact('slides'));
    }
    public function postsua(Request $request, $id)
    {
        //kiểm tra dữ liệu từ form
        $request->validate([
            'tenbanner' => 'required',
        ]);

        //kiểm tra nếu thêm mới hình ảnh thì lấy ảnh đó
        if (!empty($request->hinhanh)) {
            //set up để lưu tên hình ảnh và lưu ảnh đó vào publish theo đường dẫn
            $image = $request->file('hinhanh');
            $destinationPath = 'assets/frontend/img/slide/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            //xóa ảnh cũ ra khỏi danh sách ảnh
            if (!empty($request->hidden_hinhanh))
                unlink('assets/frontend/img/slide/' . $request->hidden_hinhanh);
        } else {
            //lấy tên hình ảnh cũ
            $profileImage = $request->hidden_hinhanh;
        }

        $slides = [
            'hinhanh' => $profileImage,
            'tenbanner'=> $request->tenbanner
        ];

        Slide::where('id', $id)->update($slides);

        Toastr::success('Sửa thành công:)', 'Success');
        return redirect()->route('admin.banner.danhsach');
    }
    // Xóa Banner
    public function postxoa(Request $request)
    {
        //xóa dữ liệu trong csdl
        Slide::destroy($request->id);
        //xóa ảnh khỏi thư mục trangtin trong publish
        unlink('assets/frontend/img/slide/' . $request->hinhanh);

        Toastr::success('Xóa tin tức thành công :)', 'Success');
        return redirect()->back();
    }
    //duyệt bài báo
    public function getduyet($id)
    {
        //tìm tin tức theo id
        $slides = Slide::find($id);

        //nếu 1 thì set = 0 và ngược lại
        $slides->status == 1 ? $input['duyet'] = 0 : $input['duyet'] = 1;

        $slides->status = $input['duyet'];

        //Tintuc::where('id',$id)->update($tintuc);
        $slides->save();

        Toastr::success('Duyệt thành công:)', 'Success');
        return redirect()->route('admin.banner.danhsach');
    }

}
