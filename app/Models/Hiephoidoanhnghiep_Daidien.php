<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiephoidoanhnghiep_Daidien extends Model
{
    use HasFactory;

    protected $table ='hiephoidoanhnghiep_daidien';
    protected $fillable =[
        'id',
        'hiephoidoanhnghiep_id',
        'tendaidien',
        'email',
        'sdt',
        'diachi',
        'mota',
    ];
}
