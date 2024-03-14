<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\Tintuc;

class TrangtinController extends Controller
{
    public function __construct()
    {
        
    }

    public function getslides(Request $request)
    {
        // $request->user()->authorizeRoles(['Admin', 'CTV']);
        $slides = Slide::all();
        $danhsach = Tintuc::with(['getUser', 'getLinhvuc'])->orderBy('updated_at', 'desc')->get();
        $tinmoi = DB::table('tintuc')
            ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
            ->select('tintuc.id as IdTin', 'tintuc.*')
            ->paginate(3); 
        // $tinnoibat =  DB::table('tintucs')
        //     ->leftjoin('linhvuc', 'linhvuc.Id', '=', 'tintucs.LinhVuc_id')
        //     ->select('tintucs.Id as IdTin', 'tintucs.*', 'linhvuc.*')
        //     ->orderBy('LuotXem', 'desc')
        //     ->limit(5)
        //     ->get();
        return view('trangchu.home', compact('slides', 'tinmoi'));
    }
    public function AllTin(Request $request) {
        $AllTin = Tintuc::all(); 
        $tinmoi = DB::table('tintuc')
            ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
            ->select('tintuc.id as IdTin', 'tintuc.*')
            ->paginate(3); 
        return view('trangchu.tintuc', compact('AllTin', 'tinmoi'));
    }
    public function TinTheoLV($LinhVuc)
    {
        if ($LinhVuc == 'NongNghiep') {
            $tinmoi = DB::table('tintuc')
                ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
                ->select('tintuc.id as IdTin', 'tintuc.*', 'tintuc.linhvuc_id')
                ->where('tintuc.linhvuc_id', 'nn')
                ->paginate(3);
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
                ->paginate(3);
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
                ->paginate(3);
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
        $News = DB::table('tintuc')
            ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')
            ->select('tintuc.id as IdTin', 'tintuc.*')
            ->orderBy('luotxem', 'desc')
            ->paginate(3);
        // $News =  DB::table('tintuc')
        // ->leftjoin('linhvuc', 'linhvuc.id', '=', 'tintuc.linhvuc_id')->where('tintuc.linhvuc_id',$TinTuc->linhvuc_id)->where('tintuc.id','!=',$id)
        // ->select('tintuc.id as IdTin', 'tintuc.*', 'linhvuc.*')->orderBy('luotxem', 'desc')->limit(3)->get();
        return view('trangchu.tindetail')->with('TinTuc',$TinTuc)->with('comments',$comments)->with('News',$News);
    }
}
