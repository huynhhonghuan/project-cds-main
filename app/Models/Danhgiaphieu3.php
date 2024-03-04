<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhgiaphieu3 extends Model
{
    use HasFactory;
    protected $table ='danhgiaphieu3';
    protected $fillable =[
        'id',
        'danhsachphieu3_id',
        'cauhoiphieu3_id',
        'diem',
        'trangthai',
    ];
}
