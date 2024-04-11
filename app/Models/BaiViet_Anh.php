<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet_Anh extends Model
{
    use HasFactory;

    protected $table = 'baiviet_anh';

    protected $fillable = [
        'id',
        'baiviet_id',
        'hinhanh'
    ];

    public function getBaiViet()
    {
        return $this->belongsTo(BaiViet::class, 'baiviet_id');
    }
}
