<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cauhoiphieu1 extends Model
{
    use HasFactory;
    protected $table ='cauhoiphieu1';
    protected $fillable =[
        'id',
        'tencauhoi',
        'noidung',
        'tieude',
        'cauhoiphieu1_id',
    ];
}
