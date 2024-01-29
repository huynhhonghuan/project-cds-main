<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doanhnghiep_Daidien extends Model
{
    use HasFactory;

    protected $table ='doanhnghiep_daidien';
    protected $fillable =[
        'id',
        'doanhnghiep_id',
        'tendaidien',
        'email',
        'sdt',
        'diachi',
        'cccd',
        'img_mattruoc',
        'img_matsau',
        'chucvu',
    ];
}
