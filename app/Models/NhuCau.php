<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhuCau extends Model
{
    use HasFactory;
    protected $table = 'nhucau';
    protected $fillable = [
        'id',
        'doanhnghiep_id',
        'nhucau',
        'caithien',
    ];

    public function getDoanhNghiep()
    {
        return $this->belongsTo(Doanhnghiep::class, 'doanhnghiep_id', 'id');
    }
}
