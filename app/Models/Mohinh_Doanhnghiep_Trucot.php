<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mohinh_Doanhnghiep_Trucot extends Model
{
    use HasFactory;
    protected $table = 'mohinh_doanhnghiep_trucot';
    protected $fillable = [
        'id',
        'mohinh_id',
        'mohinh_trucot_id',
        'doanhnghiep_loaihinh_id',
    ];

    public function getMoHinh()
    {
        return $this->belongsTo(Mohinh::class, 'mohinh_id', 'id');
    }
    public function getTruCot()
    {
        return $this->belongsTo(Mohinh_Trucot::class, 'mohinh_trucot_id', 'id');
    }
    public function getLoaiHinh()
    {
        return $this->belongsTo(Doanhnghiep_Loaihinh::class, 'doanhnghiep_loaihinh_id', 'id');
    }
}
