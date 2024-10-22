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
        return $this->hasOneThrough(
            Doanhnghiep_Loaihinh::class,
            NganhNghe::class,
            'id', // Foreign key on NganhNghe table
            'id', // Foreign key on LoaiHinh table
            'nganhnghe_id', // Local key on DoanhNghiep table
            'loaihinh_id' // Local key on NganhNghe table
        );
    }

    public function getLinhVuc()
    {
        return $this?->getLoaiHinh?->getlinhvuc();
    }

    public function getThanhTich()
    {
        return $this->hasMany(ThanhTich::class, 'doanhnghiep_id', 'id');
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
    public function getsanpham()
    {
        return $this->hasMany(SanPham::class, 'doanhnghiep_id', 'id');
    }
}
