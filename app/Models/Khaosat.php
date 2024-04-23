<?php

namespace App\Models;

use App\Http\Resources\MoHinhResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Khaosat extends Model
{
    use HasFactory;

    protected $table = 'khaosat';
    protected $fillable = [
        'id',
        'thoigiantao',
        'tongdiem',
        'trangthai',
        'mucdo_id',
        'doanhnghiep_id',
    ];

    public function getdanhsachphieu1()
    {
        return $this->HasOne(Danhsachphieu1::class, 'khaosat_id', 'id');
    }
    public function getdanhsachphieu2()
    {
        return $this->HasOne(Danhsachphieu2::class, 'khaosat_id', 'id');
    }
    public function getdanhsachphieu3()
    {
        return $this->HasOne(Danhsachphieu3::class, 'khaosat_id', 'id');
    }
    public function getdanhsachphieu4()
    {
        return $this->HasOne(Danhsachphieu4::class, 'khaosat_id', 'id');
    }

    public function getchienluoc()
    {
        return $this->hasOne(Khaosat_Chienluoc::class, 'khaosat_id', 'id');
    }
    public function getdanhgia()
    {
        return $this->hasMany(Chuyengia_Danhgia::class, 'khaosat_id', 'id');
    }

    // public function getketqua()
    // {
    //     return $this->hasOne(Ketquaphieu1::class, 'khaosat_id', 'id');
    // }

    public function getdoanhnghiep()
    {
        return $this->belongsTo(Doanhnghiep::class, 'doanhnghiep_id', 'id');
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

    public function getKetQuaPhieu1()
    {
        return $this->hasManyThrough(Ketquaphieu1::class, Danhsachphieu1::class);
    }
}
