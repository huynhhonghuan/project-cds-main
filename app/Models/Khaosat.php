<?php

namespace App\Models;

use App\Http\Resources\MoHinhResource;
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

    public function getChuyenGia()
    {
        return $this->hasOneThrough(Chuyengia::class, Chuyengia_Danhgia::class, 'khaosat_id', 'id', 'id', 'chuyengia_id');
    }

    public function getMoHinh()
    {
        return $this->hasOneThrough(Mohinh::class, Khaosat_Chienluoc::class, 'khaosat_id', 'id', 'id', 'mohinh_id');
    }

    public function getMucDo()
    {
        return $this->hasOneThrough(Mucdo::class, Khaosat_Chienluoc::class, 'khaosat_id', 'id', 'id', 'mucdo_id');
    }
}
