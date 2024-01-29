<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traloiphieu1 extends Model
{
    use HasFactory;

    protected $table ='traloiphieu1';
    protected $fillable =[
        'id',
        'danhgiaphieu1_id',
        'cauhoiphieu1_id',
        'diem',
        'trangthai',
    ];
}
