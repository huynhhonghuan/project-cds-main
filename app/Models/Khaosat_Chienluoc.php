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
        'mohinh_id',
        'user_id',
        'trangthai'
    ];

    public function getmohinh()
    {
        return $this->belongsTo(Mohinh::class, 'mohinh_id');
    }

    // public function getmucdo()
    // {
    //     return $this->belongsTo(Mucdo::class, 'mucdo_id');
    // }
}
