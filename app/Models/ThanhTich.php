<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhTich extends Model
{
    use HasFactory;
    protected $table = 'thanhtich';
    protected $fillable = [
        'id',
        'doanhnghiep_id',
        'tenthanhtich',
        'hinhanh',
    ];

    public function getDoanhNghiep()
    {
        return $this->belongsTo(Doanhnghiep::class, 'doanhnghiep_id', 'id');
    }
}
