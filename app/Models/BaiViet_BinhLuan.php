<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet_BinhLuan extends Model
{
    use HasFactory;

    protected $table = 'baiviet_binhluan';
    protected $fillable = [
        'id',
        'baiviet_id',
        'user_id',
        'noidung',
        'binhluancha_id',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getBaiViet()
    {
        return $this->belongsTo(BaiViet::class, 'baiviet_id');
    }

    public function getPhanHois()
    {
        return $this->hasMany(BaiViet_BinhLuan::class, 'binhluancha_id', 'id');
    }
}
