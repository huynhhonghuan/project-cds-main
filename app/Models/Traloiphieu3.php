<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traloiphieu3 extends Model
{
    use HasFactory;

    protected $table ='traloiphieu3';
    protected $fillable =[
        'id',
        'danhgiaphieu3_id',
        'cauhoiphieu3_id',
        'diem',
        'trangthai',
    ];
}
