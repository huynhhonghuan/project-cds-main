<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet_Thich extends Model
{
    use HasFactory;

    protected $table = 'baiviet_thich';

    protected $fillable = [
        'id',
        'baiviet_id',
        'user_id'
    ];

    public function getBaiViet()
    {
        return $this->belongsTo(BaiViet::class, 'baiviet_id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
