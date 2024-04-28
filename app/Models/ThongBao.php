<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;
    protected $table = 'thongbao';
    protected $fillable = [
        'id',
        'user_id',
        'tieude',
        'noidung',
        'daxem',
        'loai',
        'loai_id',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }
}
