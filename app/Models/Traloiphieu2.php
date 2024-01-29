<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traloiphieu2 extends Model
{
    use HasFactory;
    protected $table ='traloiphieu2';
    protected $fillable =[
        'id',
        'danhgiaphieu2_id',
        'cauhoiphieu2_id',
        'diem',
        'trangthai',
    ];
}
