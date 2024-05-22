<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation_ThamGia extends Model
{
    use HasFactory;
    protected $table = 'conversation_thamgia';
    protected $fillable = [
        'id',
        'conversation_id',
        'user_id',
    ];

    public function getConversation()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
