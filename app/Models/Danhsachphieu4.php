<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhsachphieu4 extends Model
{
    use HasFactory;
    protected $table ='danhsachhieu4';
    protected $fillable =[
        'id',
        'khaosat_id',
        'tendanhgia',
        'diem',
        'soluonghoanthanh',
        'trangthai',
    ];
}
