<?php

namespace App\Http\Controllers\Doanhnghiep;

use App\Exports\Taikhoan\Doanhnghiep;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BaiViet_Anh;
use Illuminate\Support\Facades\Auth;
use App\Models\Sanpham;
use App\Models\Sanpham_Anh;
use App\Models\ThongBao;

class ChatController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $conversations = self::getConversationsOfUser();
        return view("trangchu.conversation", compact('conversations'));
    }

    public function message($conversation_id)
    {
        $user_id = Auth::user()->id;
        $conversation = Conversation::where('id', $conversation_id)
            ->whereIn('id', function ($query) use ($user_id) {
                $query->select('conversation_id')
                    ->from('conversation_thamgia')
                    ->where('user_id',  $user_id);
            })->firstOrFail();
        // dd($conversation);
        foreach ($conversation->getThamGia as $thamgia) {
            if ($thamgia->user_id !=  $user_id) {
                $him = $thamgia->getUser;
            } else {
                $me = $thamgia->getUser;
            }
        }
        $conversations = self::getConversationsOfUser();
        return view('trangchu.room', compact(['conversations', 'conversation_id', 'him', 'me']));
    }

    public function chatToUser($to_user_id)
    {
        $user_id = Auth::user()->id;
        $conversation = Conversation::whereIn('id', function ($query) use ($to_user_id) {
            $query->select('conversation_id')
                ->from('conversation_thamgia')
                ->where('user_id', $to_user_id);
        })->with('getThamGia')->whereHas('getThamGia', function ($query) use ($user_id) {
            $query->where('user_id',  $user_id);
        })->first();
        // dd($conversation);
        if ($conversation == null) {
            $conversation = new Conversation();
            $conversation->save();
            $conversation->getThamGia()->create([
                'conversation_id' => $conversation->id,
                'user_id' => $to_user_id
            ]);
            $conversation->getThamGia()->create([
                'conversation_id' => $conversation->id,
                'user_id' =>  $user_id
            ]);
        }

        return redirect()->route('chat.message', $conversation->id);
    }

    public function deleteConversation($conversation_id)
    {
        $user_id = Auth::user()->id;
        $conversation = Conversation::where('id', $conversation_id)
            ->whereIn('id', function ($query) use ($user_id) {
                $query->select('conversation_id')
                    ->from('conversation_thamgia')
                    ->where('user_id',  $user_id);
            })->firstOrFail();
        $conversation->delete();
        return response()->json(['message' => 'success']);
    }

    private static function getConversationsOfUser()
    {
        $user_id = Auth::user()->id;
        $hoithoais = Conversation::whereIn('id', function ($query) use ($user_id) {
            $query->select('conversation_id')
                ->from('conversation_thamgia')
                ->where('user_id', $user_id);
        })->with('getThamGia')->get();
        // dd($hoithoais);
        $conversations = array();
        foreach ($hoithoais as $hoithoai) {
            $conversations[] = [
                'conversation_id' => $hoithoai->id,
                'user' => $hoithoai->getThamGia->where('user_id', '!=', $user_id)->first()
            ];
        }
        return $conversations;
    }
}
