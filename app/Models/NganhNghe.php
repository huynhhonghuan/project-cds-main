<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NganhNghe extends Model
{
    use HasFactory;
    protected $table = 'nganhnghe';
    protected $fillable = [
        'id',
        'loaihinh_id',
        'tennganhnghe',
    ];

    public function getLoaiHinh()
    {
        return $this->belongsTo(Doanhnghiep_Loaihinh::class, 'loaihinh_id', 'id');
    }
}
