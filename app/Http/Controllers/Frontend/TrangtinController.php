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
            ->orderBy('created_at', 'desc')
            ->paginate(4); 
        $videos = DB::table('videos')->paginate(4);    
        return view('trangchu.home', compact('slides', 'tinmoi', 'videos'));
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
            ->select('tintuc.id as IdTin', 'tintuc.*')
            ->orderBy('luotxem', 'desc')
            ->paginate(3);
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

    public function search() {
        $searchText = $_GET['query'];
        $New = Tintuc::where('tieude' ,'LIKE', '%'.$searchText.'%')->get();

        return view('trangchu.search', compact('New', 'searchText'));
    }
    public function binhluan(Request $request) {
        $input = $request->collect();
        $cmt = array();

        if (isset($input['IdCon'])) {
            $cmt['binhluan_id'] = $input['IdCon'];
        }
        $cmt['noidung'] = $input['message'];
        if(Auth::user()->getVaiTro[0]->id == "ad")
            $cmt['user_id'] = 1;
        elseif(Auth::user()->getVaiTro[0]->id == "ctv")
            $cmt['user_id'] = 4;
        elseif(Auth::user()->getVaiTro[0]->id == "dn")
            $cmt['user_id'] = 5;
        elseif(Auth::user()->getVaiTro[0]->id == "hhdn")
            $cmt['user_id'] = 2;
        else
            $cmt['user_id'] = 3;
        $cmt['tintuc_id'] = $input['IdNews'];
        $cmt['ngaydang'] = date('Y-m-d');
        $cmt['ten'] = $input['Name'];
        if (DB::table('binhluan')->insert($cmt)) {
            $alert = "đã thêm bình luận";
        } else {
            $alert = " Bình luận không thành công";
        }
        return redirect()->back()->with('alert', $alert);
    }
}
