<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khaosat_Chienluoc extends Model
{
    use HasFactory;

    protected $table ='khaosat_chienluoc';
    protected $fillable =[
        'id',
        'khaosat_id',
        'mucdo_id',
        'mohinh_id',
    ];

}
