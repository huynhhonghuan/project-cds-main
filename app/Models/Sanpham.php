<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = [
        'id',
        'doanhnghiep_id',
        'tensanpham',
        'gia',
        'mota',
    ];

    public function getDoanhNghiep()
    {
        return $this->belongsTo(Doanhnghiep::class, 'doanhnghiep_id', 'id');
    }

    public function getHinhAnhs()
    {
        return $this->hasMany(SanPhamAnh::class, 'sanpham_id', 'id');
    }
    public function getAnh()
    {
        return $this->belongsTo(Sanpham_Anh::class, 'id', 'sanpham_id');
    }
}
