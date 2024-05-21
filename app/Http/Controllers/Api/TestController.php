<?php

namespace App\Http\Controllers\Api;

use App\Exports\Taikhoan\Doanhnghiep;
use App\Http\Controllers\Controller;
use App\Http\Resources\LinhVucResource;
use App\Http\Resources\Tintuc as ResourcesTintuc;
use App\Http\Resources\TinTucCollection;
use App\Http\Services\ImageService;
use App\Imports\Taikhoan\DoanhnghiepImport;
use App\Models\Conversation;
use App\Models\Conversation_ThamGia;
use App\Models\Doanhnghiep as ModelsDoanhnghiep;
use App\Models\Doanhnghiep_Loaihinh;
use App\Models\Khaosat;
use App\Models\Khaosat_Chienluoc;
use App\Models\Linhvuc;
use App\Models\Mohinh;
use App\Models\Mohinh_Doanhnghiep_Trucot;
use App\Models\Mohinh_Trucot;
use App\Models\Tintuc;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function chatIndex()
    {
        // user_id lấy từ session
        $user_id = 891;
        $hoithoais = Conversation::whereIn('id', function ($query) use ($user_id) {
            $query->select('conversation_id')
                ->from('conversation_thamgia')
                ->where('user_id', $user_id);
        })->with('getThamGia')->get();

        $users = array();
        foreach ($hoithoais as $hoithoai) {
            $users[] = $hoithoai->getThamGia->where('user_id', '!=', $user_id)->first()->getUser;
        }

        return view("trangchu.conversation", compact('users'));
    }

    public function index(Request $request)
    {
        $doanhnghiep = ModelsDoanhnghiep::with('getUser')->get();
        return view("trangchu.test", compact('doanhnghiep'));
    }

    public function index2(Request $request)
    {
        $moHinhs = Mohinh::all();
        $trucots = Mohinh_Trucot::all();
        $loaiHinhs = Doanhnghiep_Loaihinh::all();

        foreach ($loaiHinhs as $loaiHinh) {
            foreach ($trucots as $truCot) {
                $model = new Mohinh_Doanhnghiep_Trucot();
                $model->doanhnghiep_loaihinh_id = $loaiHinh->id;
                $model->mohinh_trucot_id = $truCot->id;
                $model->mohinh_id = $moHinhs->random()->id;
                $model->save();
            }
        }
    }
    private function log($message)
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>" . $message . "</info>");
    }

    public function upload(Request $request)
    {
        $user = User::find($request->id);
        $file = $request->file('file');
        $path = 'assets/backend/img/hoso';
        $saveFileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $saveFileName);
        if (env('APP_ENV') == 'production') {
            $saveFileName = (new ImageService())->saveImageToHost($path,  $path . '/' . $saveFileName, "");
        }
        $user->image = $saveFileName;

        $user->save();

        return response()->json(['success' => 'Lưu ảnh thành công']);
    }
}
