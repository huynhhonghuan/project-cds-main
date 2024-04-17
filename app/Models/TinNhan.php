<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinNhan extends Model
{
    use HasFactory;

    protected $table = 'tinnhan';
    protected $fillable = [
        'id',
        'user_id',
        'hoithoai_id',
        'noidung',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
