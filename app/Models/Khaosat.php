<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khaosat extends Model
{
    use HasFactory;

    protected $table ='khaosat';
    protected $fillable =[
        'id',
        'thoigiantao',
        'tongdiem',
        'trangthai',
        'doanhnghiep_id',
    ];
}
