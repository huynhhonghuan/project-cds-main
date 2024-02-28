<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuyengia extends Model
{
    use HasFactory;

    protected $table = 'chuyengia';
    protected $fillable = [
        'id',
        'user_id',
        'linhvuc_id',
        'tenchuyengia',
        // 'email',
        'sdt',
        'thanhpho',
        'huyen',
        'xa',
        'diachi',
        'cccd',
        'img_mattruoc',
        'img_matsau',
        'mota',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }

    public function getLinhVuc()
    {
        return $this->belongsTo(Linhvuc::class, 'linhvuc_id', 'id');
    }
}
