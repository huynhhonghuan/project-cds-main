<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danhmuc';

    protected $fillable = [
        'id',
        'tendanhmuc',
    ];

    public function getBaiViets()
    {
        return $this->belongsToMany(BaiViet::class, 'baiviet_danhmuc', 'danhmuc_id', 'baiviet_id');
    }
}
