<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doanhnghiep extends Model
{
    use HasFactory;

    protected $table = 'doanhnghiep';
    protected $fillable = [
        'id',
        'user_id',
        'doanhnghiep_loaihinh_id',
        'tentiengviet',
        'tentienganh',
        // 'email',
        'thanhpho',
        'huyen',
        'xa',
        'diachi',
        'mathue',
        'fax',
        'soluongnhansu',
        'ngaylap',
        'mota',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }

    public function getLoaiHinh()
    {
        return $this->belongsTo(Doanhnghiep_Loaihinh::class, 'doanhnghiep_loaihinh_id', 'id');
    }

    public function getDaiDien()
    {
        return $this->hasOne(Doanhnghiep_Daidien::class);
    }
    public function getSdt()
    {
        return $this->hasOne(Doanhnghiep_Sdt::class);
    }
}
