<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doanhnghiep_Loaihinh extends Model
{
    use HasFactory;

    protected $table = 'doanhnghiep_loaihinh';
    protected $fillable = [
        'id',
        'linhvuc_id',
        'tenloaihinh',
        'hinhanh',
        'mota'
    ];

    public function getdoanhnghiep()
    {
        return $this->hasMany(Doanhnghiep::class);
    }

    public function getlinhvuc()
    {
        return $this->belongsTo(Linhvuc::class, 'linhvuc_id', 'id');
    }
    public function getmohinh_doanhnghiep_trucot()
    {
        return $this->hasMany(Mohinh_Doanhnghiep_Trucot::class, 'doanhnghiep_loaihinh_id', 'id');
    }
}
