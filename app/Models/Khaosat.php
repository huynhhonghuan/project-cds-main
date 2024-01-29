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
        'danhsachphieu1_id',
        'danhsachphieu2_id',
        'danhsachphieu3_id',
        'danhsachphieu4_id',
    ];
}
