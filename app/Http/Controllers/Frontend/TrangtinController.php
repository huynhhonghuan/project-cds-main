<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Slide;
use App\Models\Tintuc;
use App\Models\Video;
use App\Models\Thuvien;
use App\Models\Binhluan;
use App\Models\Doanhnghiep;
use App\Models\Sanpham;
use App\Models\Sanpham_Anh;

class TrangtinController extends Controller
{
    public function __construct()
    {

    }

    public function Index(Request $request)
    {
        $slides = DB::table('slides')->paginate(3);
        $tinmoi = DB::table('tintuc')
            ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
            ->select('tintuc.id as IdTin', 'tintuc.*', 'linhvuc.tenlinhvuc')
            // ->orderBy('created_at', 'desc')
            ->where('tintuc.id', 1)
            ->paginate(1);
        $tinmoi3 = DB::table('tintuc')
            ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
            ->select('tintuc.id as IdTin', 'tintuc.*', 'linhvuc.tenlinhvuc')
            // ->orderBy('created_at', 'desc')
            ->where('tintuc.id', 2)
            ->paginate(1);
        $tinmoi2 = DB::table('tintuc')
            ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
            ->select('tintuc.id as IdTin', 'tintuc.*', 'linhvuc.tenlinhvuc')
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        $videos = DB::table('videos')->paginate(3);
        return view('trangchu.home', compact('slides', 'tinmoi','tinmoi2', 'tinmoi3','videos'));
    }
    public function AllTin(Request $request) {
        $tinmoi = DB::table('tintuc')
            ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
            ->select('tintuc.id as IdTin', 'tintuc.*', 'linhvuc.tenlinhvuc')
            ->get();
        return view('trangchu.tintuc', compact('tinmoi'));
    }
    public function TinTheoLV($LinhVuc)
    {
        if ($LinhVuc == 'NongNghiep') {
            $tinmoi = DB::table('tintuc')
                ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
                ->select('tintuc.id as IdTin', 'tintuc.*', 'tintuc.linhvuc_id')
                ->where('tintuc.linhvuc_id', 'nn')
                ->paginate(50);
            $laybanner = DB::table('tintuc')
            ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
            ->select('tintuc.id as IdTin', 'tintuc.*', 'tintuc.linhvuc_id')
            ->where('tintuc.linhvuc_id', 'nn')
            ->paginate(1);
            $tinnoibat =  DB::table('tintuc')
                ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
                ->where('tintuc.linhvuc_id', 'nn')
                ->select('tintuc.id as IdTin', 'tintuc.*', 'linhvuc.*')
                ->orderBy('Luotxem', 'desc')
                ->limit(5)
                ->get();
            return view('trangchu.tinlinhvuc')->with('tinmoi', $tinmoi)->with('laybanner', $laybanner)->with('tinnoibat', $tinnoibat)->with('title', "Tin tức nông nghiệp");
        }
        if ($LinhVuc == 'CongNghiep') {
            $tinmoi = DB::table('tintuc')
                ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
                ->select('tintuc.id as IdTin', 'tintuc.*', 'tintuc.linhvuc_id')
                ->where('tintuc.linhvuc_id', 'cn')
                ->paginate(50);
            $laybanner = DB::table('tintuc')
                ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
                ->select('tintuc.id as IdTin', 'tintuc.*', 'tintuc.linhvuc_id')
                ->where('tintuc.linhvuc_id', 'cn')
                ->paginate(1);
            $tinnoibat =  DB::table('tintuc')
                ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
                ->where('tintuc.linhvuc_id', 'cn')
                ->select('tintuc.id as IdTin', 'tintuc.*', 'linhvuc.*')
                ->orderBy('luotxem', 'desc')
                ->limit(5)
                ->get();
                return view('trangchu.tinlinhvuc')->with('tinmoi', $tinmoi)->with('laybanner', $laybanner)->with('tinnoibat', $tinnoibat)->with('title', "Tin tức công nghiệp");
            }
        if ($LinhVuc == 'TMDV') {
            $tinmoi = DB::table('tintuc')
                ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
                ->select('tintuc.id as IdTin', 'tintuc.*', 'tintuc.linhvuc_id')
                ->where('tintuc.linhvuc_id', 'tmdv')
                ->paginate(50);
            $laybanner = DB::table('tintuc')
                ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
                ->select('tintuc.id as IdTin', 'tintuc.*', 'tintuc.linhvuc_id')
                ->where('tintuc.linhvuc_id', 'tmdv')
                ->paginate(1);
            $tinnoibat =  DB::table('tintuc')
                ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
                ->where('tintuc.linhvuc_id', 'tmdv')
                ->select('tintuc.id as IdTin', 'tintuc.*', 'linhvuc.*')
                ->orderBy('luotxem', 'desc')
                ->limit(5)
                ->get();
                return view('trangchu.tinlinhvuc')->with('tinmoi', $tinmoi)->with('laybanner', $laybanner)->with('tinnoibat', $tinnoibat)->with('title', "Tin tức thương mại - dịch vụ");
            }
    }
    public function TinDetail($id){
        $TinTuc = DB::table('tintuc')->where('tintuc.id',$id)->first();
        $luotxem = $TinTuc->luotxem + 1;
        DB::table('tintuc')->where('tintuc.id',$id)->update(['luotxem'=>$luotxem]);
        $comments = DB::table('binhluan')->where('tintuc_id',$TinTuc->id)->get();
        $laybanner = DB::table('tintuc')
                ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
                ->select('tintuc.id as IdTin', 'tintuc.*', 'tintuc.linhvuc_id')
                ->where('tintuc.linhvuc_id', 'tmdv')
                ->paginate(1);
        $News = DB::table('tintuc')
            ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
            ->select('tintuc.id as IdTin', 'tintuc.*', 'linhvuc.tenlinhvuc')
            ->orderBy('luotxem', 'desc')
            ->paginate(6);
        return view('trangchu.tindetail')->with('laybanner', $laybanner)->with('TinTuc',$TinTuc)->with('comments',$comments)->with('News',$News);
    }
    public function AllVideo(Request $request) {
        $AllVideo = Video::all();
        return view('trangchu.video', compact('AllVideo'));
    }
    public function thuvien(Request $request) {
        $thuviens = Thuvien::all();
        return view('trangchu.thuvien', compact('thuviens'));
    }

    public function sanpham(Request $request) {
        $doanhnghiepSP = Doanhnghiep::with(['getsanpham'])->get();
        return view('trangchu.sanpham', compact('doanhnghiepSP'));
    }
    public function spdetail(Request $request) {
        $doanhnghiepSP = Doanhnghiep::with(['getsanpham'])->get();
        return view('trangchu.sanphamdetail', compact('doanhnghiepSP'));
    }
    public function search() {
        $searchText = $_GET['query'];
        $New = Tintuc::where('tieude' ,'LIKE', '%'.$searchText.'%')->get();

        return view('trangchu.search', compact('New', 'searchText'));
    }
    public function searchvb() {
        $searchText = $_GET['query'];
        $vanban = Thuvien::where('tieude' ,'LIKE', '%'.$searchText.'%')->get();

        return view('trangchu.searchvb', compact('vanban', 'searchText'));
    }
    public function binhluan(Request $request) {

        $input = $request->all();

        if (isset($input['IdCon'])) {
            $input['binhluan_id'] = $input['IdCon'];
        }
        $input['noidung'] = $input['message'];
        if(isset(auth()->user()->id))
            $input['user_id'] = auth()->user()->id;
        else
            $input['user_id'] = null;

        $input['tintuc_id'] = $input['IdNews'];
        $input['ngaydang'] = date('Y-m-d');
        $input['ten'] = $input['Name'];
        if (Binhluan::create($input)) {
            $alert = "đã thêm bình luận, chờ duyệt";
        } else {
            $alert = " Bình luận không thành công";
        }
        return redirect()->back()->with('alert', $alert);
    }

    public function doanhnghiep(Request $request) {
        $dnghiep = Doanhnghiep::all();
        return view('trangchu.doanhnghiep', compact('dnghiep'));
    }
    
    public function doanhnghiepct($id){
        $dnghiepct = DB::table('doanhnghiep')->where('doanhnghiep.id',$id)->first();
        $dnghiepdd = DB::table('doanhnghiep_daidien')->where('doanhnghiep_daidien.id',$id)->first();
        $dnghiepbd = DB::table('khaosat')->where('khaosat.doanhnghiep_id',$id)->select('tongdiem', 'thoigiantao')->get();
        $data = "";
        foreach($dnghiepbd as $val) {
            $data.= "['".$val->thoigiantao."' , ".$val->tongdiem."], ";
        }
        $chartData = $data;
        $dnghiepimg = Doanhnghiep::find($id)->getUser;
        $sanphamdn = Sanpham::with(['getAnh'])->where('doanhnghiep_id', $id)->get();
        // dd($sanphamdn);
        return view('trangchu.doanhnghiepdetail')->with('dnghiepct', $dnghiepct)->with('dnghiepdd', $dnghiepdd)->with('dnghiepimg', $dnghiepimg)->with('chartData', $chartData)->with('sanphamdn', $sanphamdn);
    }
}
