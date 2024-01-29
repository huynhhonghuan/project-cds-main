<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doanhnghiep_Sdt extends Model
{
    use HasFactory;

    protected $table ='doanhnghiep_sdt';
    protected $fillable =[
        'id',
        'doanhnghiep_id',
        'sdt',
        'loaisdt',
    ];
}
