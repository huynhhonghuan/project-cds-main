<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function getConversation(Request $request)
    {
        $user_id = auth()->id();
        $to_user_id = $request->to_user_id;
        $conversation = Conversation::whereIn('id', function ($query) use ($to_user_id) {
            $query->select('conversation_id')
                ->from('conversation_thamgia')
                ->where('user_id', $to_user_id);
        })->with('getThamGia')->whereHas('getThamGia', function ($query) use ($user_id) {
            $query->where('user_id',  $user_id);
        })->first();

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
        return [
            'conversation_id' => $conversation->id,
            'toUser' => new UserResource(User::find($to_user_id)),
            'user' => new UserResource(User::find($user_id))
        ];
    }
}
