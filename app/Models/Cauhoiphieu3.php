<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cauhoiphieu3 extends Model
{
    use HasFactory;
    protected $table ='cauhoiphieu3';
    protected $fillable =[
        'id',
        'tencauhoi',
    ];
}
