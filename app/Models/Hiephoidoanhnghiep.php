<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiephoidoanhnghiep extends Model
{
    use HasFactory;

    protected $table = 'hiephoidoanhnghiep';
    protected $fillable = [
        'id',
        'user_id',
        'tentiengviet',
        'tentienganh',
        'email',
        'thanhpho',
        'huyen',
        'xa',
        'sdt',
        'diachi',
        'mota',
    ];

    public function getDaiDien()
    {
        return $this->hasOne(Hiephoidoanhnghiep_Daidien::class);
    }
}
