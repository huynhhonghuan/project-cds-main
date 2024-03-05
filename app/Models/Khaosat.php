<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khaosat extends Model
{
    use HasFactory;

    protected $table = 'khaosat';
    protected $fillable = [
        'id',
        'thoigiantao',
        'tongdiem',
        'trangthai',
        'doanhnghiep_id',
    ];

    public function getChienLuoc()
    {
        return $this->hasOne(Khaosat_Chienluoc::class);
    }

    public function getChuyenGiaDanhGia()
    {
        return $this->hasOne(Chuyengia_Danhgia::class);
    }
}
