<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamAnh extends Model
{
    use HasFactory;
    protected $table = 'sanpham_anh';
    protected $fillable = [
        'id',
        'sanpham_id',
        'hinhanh',
    ];

}
