<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoiThoai extends Model
{
    use HasFactory;

    protected $table = 'hoithoai';
    protected $fillable = [
        'id',
        'chuyengia_id',
        'doanhnghiep_id',
    ];

    public function getTinNhans()
    {
        return $this->hasMany(TinNhan::class, 'hoithoai_id', 'id');
    }

    public function getChuyenGiaUser()
    {
        return $this->belongsTo(User::class, 'chuyengia_id', 'id');
    }

    public function getDoanhNghiepUser()
    {
        return $this->belongsTo(User::class, 'doanhnghiep_id', 'id');
    }
}
