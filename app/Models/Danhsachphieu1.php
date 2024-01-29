<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhsachphieu1 extends Model
{
    use HasFactory;

    protected $table ='danhsachhieu1';
    protected $fillable =[
        'id',
        'khaosat_id',
        'tendanhgia',
        'diem',
        'soluonghoanthanh',
        'trangthai',
    ];
}
