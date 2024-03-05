<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khaosat_Chienluoc extends Model
{
    use HasFactory;

    protected $table = 'khaosat_chienluoc';
    protected $fillable = [
        'id',
        'khaosat_id',
        'mucdo_id',
        'mohinh_id',
    ];

    public function getMoHinh()
    {
        return $this->belongsTo(Mohinh::class, 'mohinh_id');
    }

    public function getMucDo()
    {
        return $this->belongsTo(Mucdo::class, 'mucdo_id');
    }
}
