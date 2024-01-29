<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhgiaphieu4 extends Model
{
    use HasFactory;

    protected $table ='danhgiaphieu4';
    protected $fillable =[
        'id',
        'danhsachphieu4_id',
        'tendanhgia',
        'noidungnhucau',
        'noidungdexuat',
        'trangthai',
    ];
}
