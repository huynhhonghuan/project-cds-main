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
        'website',
        'xa',
        'diachi',
        'sdt',
        'mathue',
        'sdt',
        'fax',
        'soluongnhansu',
        'ngaylap',
        'mota',
    ];

    protected $casts = [
        'ngaylap' => 'date',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getLoaiHinh()
    {
        return $this->belongsTo(Doanhnghiep_Loaihinh::class, 'doanhnghiep_loaihinh_id', 'id');
    }

    // public function getLinhVuc()
    // {
    //     return $this->hasOneThrough(Linhvuc::class, Doanhnghiep_Loaihinh::class, 'id', 'id', 'doanhnghiep_loaihinh_id', 'linhvuc_id');
    // }

    public function getDaiDien()
    {
        return $this->hasOne(Doanhnghiep_Daidien::class);
    }
    // public function getSdt()
    // {
    //     return $this->hasOne(Doanhnghiep_Sdt::class);
    // }

    public function getkhaosat()
    {
        return $this->hasMany(Khaosat::class, 'doanhnghiep_id', 'id');
    }
    public function getSdts()
    {
        return $this->hasMany(Doanhnghiep_Sdt::class);
    }

    public function getNhuCau()
    {
        return $this->hasMany(NhuCau::class);
    }
}
