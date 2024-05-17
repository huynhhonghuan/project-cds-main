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
        'nganhnghe_id',
        'tentiengviet',
        'tentienganh',
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
        'hoivien',
        'namgianhap',
        'hosonangluc',
        'gianhang'
    ];

    protected $casts = [
        'ngaylap' => 'date',
        'hoivien' => 'boolean'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getNganhNghe()
    {
        return $this->belongsTo(NganhNghe::class, 'nganhnghe_id', 'id');
    }

    public function getLoaiHinh()
    {
        return $this?->getNganhNghe?->getLoaiHinh();
    }

    public function getLinhVuc()
    {
        return $this?->getLoaiHinh?->getLinhVuc();
    }

    public function getThanhTich()
    {
        return $this->hasMany(ThanhTich::class, 'doanhnghiep_id', 'id');
    }

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
