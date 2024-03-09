<?php

namespace App\Models;

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

}
