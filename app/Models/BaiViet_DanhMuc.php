<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet_DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'baiviet_danhmuc';
    protected $fillable = [
        'id',
        'danhmuc_id',
        'baiviet_id',
    ];

    public function getBaiViet()
    {
        return $this->belongsTo(BaiViet::class, 'baiviet_id');
    }

    public function getDanhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danhmuc_id');
    }
}
