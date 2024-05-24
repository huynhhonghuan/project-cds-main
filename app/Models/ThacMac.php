<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThacMac extends Model
{
    use HasFactory;
    protected $table = 'thacmac';
    protected $fillable = [
        'id',
        'user_id',
        'noidung',
        'traloi',
        'ngaytraloi',
    ];

    function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
