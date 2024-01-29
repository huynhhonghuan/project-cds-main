<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuyengia_Danhgia extends Model
{
    use HasFactory;

    protected $table ='chuyengia_danhgia';
    protected $fillable =[
        'id',
        'chuyengia_id',
        'khaosat_id',
        'danhgia',
        'dexuat',
    ];
}
