<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cauhoiphieu2 extends Model
{
    use HasFactory;
    protected $table ='cauhoiphieu2';
    protected $fillable =[
        'id',
        'tencauhoi',
        'cap',
    ];
}
