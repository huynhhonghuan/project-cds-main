<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhsachphieu3 extends Model
{
    use HasFactory;

    protected $table ='danhsachhieu3';
    protected $fillable =[
        'id',
        'khaosat_id',
        'tendanhgia',
        'diem',
        'soluonghoanthanh',
        'trangthai',
    ];
}
