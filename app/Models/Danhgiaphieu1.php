<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhgiaphieu1 extends Model
{
    use HasFactory;

    protected $table ='danhgiaphieu1';
    protected $fillable =[
        'id',
        'mohinh_trucot_id',
        'danhsachphieu1_id',
        'tendanhgia',
        'diem',
        'trangthai',
    ];
}
