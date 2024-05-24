<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    //

    public function getAllConversations()
    {
        $user_id = auth()->id();
        $conversations = Conversation::whereIn('id', function ($query) use ($user_id) {
            $query->select('conversation_id')
                ->from('conversation_thamgia')
                ->where('user_id', $user_id);
        })->get();
        $result = array();
        foreach ($conversations as $conversation) {
            $result[] = [
                'id' => $conversation->id,
                'user' => new UserResource($conversation->getThamGia->where('user_id', '!=', $user_id)->first()?->getUser)
            ];
        }
        return $result;
    }
    public function getConversation(Request $request)
    {
        $user_id = auth()->id();
        $to_user_id = $request->toUserId;
        $conversation = Conversation::whereIn('id', function ($query) use ($to_user_id) {
            $query->select('conversation_id')
                ->from('conversation_thamgia')
                ->where('user_id', $to_user_id);
        })->with('getThamGia')->whereHas('getThamGia', function ($query) use ($user_id) {
            $query->where('user_id',  $user_id);
        })->first();

        if ($conversation == null) {
            DB::transaction(function () use ($to_user_id, $user_id, &$conversation) {
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
            });
        }

        return [
            'conversation_id' => $conversation->id,
            'toUser' => new UserResource(User::find($to_user_id)),
            'user' => new UserResource(User::find($user_id))
        ];
    }

    public function deleteConversation($id)
    {
        $conversation = Conversation::find($id);
        $conversation->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }
}
