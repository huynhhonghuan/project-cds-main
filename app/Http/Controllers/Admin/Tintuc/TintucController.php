<?php

namespace App\Http\Controllers\Admin\Tintuc;

use App\Exports\Taikhoan\Doanhnghiep;
use App\Http\Controllers\Controller;
use App\Models\Tintuc;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewsNoti;
use App\Http\Services\NotificationService;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class TintucController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getdanhsach()
    {
        //$danhsach = Tintuc::with('getUser_Linhvuc')->orderBy('updated_at','desc')->get();
        $danhsach = Tintuc::with(['getUser', 'getLinhvuc'])->orderBy('updated_at', 'desc')->get();
        return view('trangquanly.admin.tintuc.danhsach', compact('danhsach'))->with('tendanhsach', 'Danh sách tin tức tổng hợp');
    }
    public function getdanhsachnongnghiep()
    {
        //$danhsach = Tintuc::with('getUser_Linhvuc')->orderBy('updated_at','desc')->get();
        $danhsach = Tintuc::with(['getUser', 'getLinhvuc'])->where('linhvuc_id', 'nn')->orderBy('updated_at', 'desc')->get();
        //dd( $danhsach);
        return view('trangquanly.admin.tintuc.danhsach', compact('danhsach'))->with('tendanhsach', 'Danh sách tin tức nông nghiệp');
    }
    public function getdanhsachcongnghiep()
    {
        //$danhsach = Tintuc::with('getUser_Linhvuc')->orderBy('updated_at','desc')->get();
        $danhsach = Tintuc::with(['getUser', 'getLinhvuc'])->where('linhvuc_id', 'cn')->orderBy('updated_at', 'desc')->get();
        //dd( $danhsach);
        return view('trangquanly.admin.tintuc.danhsach', compact('danhsach'))->with('tendanhsach', 'Danh sách tin tức công nghiệp');
    }
    public function getdanhsachthuongmaidichvu()
    {
        //$danhsach = Tintuc::with('getUser_Linhvuc')->orderBy('updated_at','desc')->get();
        $danhsach = Tintuc::with(['getUser', 'getLinhvuc'])->where('linhvuc_id', 'tmdv')->orderBy('updated_at', 'desc')->get();
        //dd( $danhsach);
        return view('trangquanly.admin.tintuc.danhsach', compact('danhsach'))->with('tendanhsach', 'Danh sách tin tức thương mại và dịch vụ');
    }

    public function getthem()
    {
        $linhvuc = DB::table('linhvuc')->get();
        return view('trangquanly.admin.tintuc.them', compact('linhvuc'));
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
        Tintuc::create($input);
        
        Toastr::success('Thêm thành công:)', 'Success');
        return redirect()->route('admin.tintuc.danhsach');
    }

    //duyệt bài báo
    public function getduyet($id)
    {
        $user = User::all();
        // dd($user);
        //tìm tin tức theo id
        $tintuc = Tintuc::find($id);
        // dd($tintuc);
        //nếu 1 thì set = 0 và ngược lại
        $tintuc->duyet == 1 ? $input['duyet'] = 0 : $input['duyet'] = 1;

        $tintuc->duyet = $input['duyet'];

        //Tintuc::where('id',$id)->update($tintuc);
        $tintuc->save();
        $message = [
            'greeting' => 'Xin chào !',
            'body' => 'Có tin tức mới liên quan đến lĩnh vực của doanh nghiệp.', 
            'actionText' => 'Bấm vào đây để xem tin !',
            'actionUrl' => 'http://127.0.0.1:8000/tin/'.$id,
            'lastline' => 'Cảm ơn!'
        ];

        // $tinnhan = [
        //     'tieude' => 'Có tin tức mới !',
        //     'noidung' => $tintuc->tieude,
        //     'loai' => 'tin',
        //     'loai_id' => $id
        // ];
        // $user_id = 11;
        // dd($user_id);
        // (new NotificationService())->sendNotification($tinnhan, $user_id);
        Notification::send($user, new NewsNoti($message));
        Toastr::success('Duyệt thành công:)', 'Success');
        return redirect()->route('admin.tintuc.danhsach');
    }

    public function getsua($id)
    {
        //tìm tin tức theo id
        $tintuc = Tintuc::find($id);
        $linhvuc = DB::table('linhvuc')->get();
        return view('trangquanly.admin.tintuc.sua', compact(['tintuc', 'linhvuc']));
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

        Tintuc::where('id', $id)->update($tintuc);

        Toastr::success('Sửa thành công:)', 'Success');
        return redirect()->route('admin.tintuc.danhsach');
    }

    public function postxoa(Request $request)
    {
        //xóa dữ liệu trong csdl
        Tintuc::destroy($request->id);
        //xóa ảnh khỏi thư mục trangtin trong publish
        unlink('assets/frontend/img/trangtin/' . $request->hinhanh);

        Toastr::success('Xóa tin tức thành công :)', 'Success');
        return redirect()->back();
    }
}
