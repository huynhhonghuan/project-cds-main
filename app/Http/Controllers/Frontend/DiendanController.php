<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BaiViet;
use App\Models\BaiViet_Thich;


class DiendanController extends Controller
{
    public function __construct()
    {

    }

    public function Index(Request $request)
    {
        $baiviets = Baiviet::with(['getUser', 'getHinhAnhs','getBinhLuans', 'likes','getDanhMucs'])->get();
        // dd($baivietthich);
        return view('trangchu.diendan', compact('baiviets'));
    }

    public function like($id) {
        $liker = auth()->user()->id;
        $idnd = $id;

        $input =  BaiViet_Thich::where('user_id', $liker)->where('baiviet_id', $idnd)->first();

        // BaiViet_Thich::create($input);
        if($input) {
            $input->delete();
            return redirect()->route('diendan')->with('error', "Bạn hủy thích nội dung này");
        } else {
            $input = new BaiViet_Thich();
            $input->user_id = $liker;
            $input->baiviet_id = $idnd;

            if($input->save()) {
                return redirect()->route('diendan')->with('success', "Bạn đã thích nội dung này");
            } else {
                return response()->json([
                    'message' => 'Lỗi rồi',
                ], 201);
            }
        }

    }

    public function unlike(BaiViet $baiviet) {

    }
}
