<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mohinh extends Model
{
    use HasFactory;
    protected $table = 'mohinh';
    protected $fillable = [
        'id',
        'user_id',
        'tenmohinh',
        'noidung',
        'hinhanh',
        // 'mohinh_trucot_id',
        // 'doanhnghiep_loaihinh_id',
    ];

    public function getMoHinh_DoanhNghiep_TruCot()
    {
        return $this->hasMany(Mohinh_Doanhnghiep_Trucot::class, 'mohinh_id', 'id');
    }
    public function getLoTrinh()
    {
        return $this->hasOne(Mohinh_Lotrinh::class, 'mohinh_id', 'id');
    }
    // public function getUser()
    // {
    //     return $this->belongsToMany(Mohinh::class, 'user_id', 'id');
    // }
}
