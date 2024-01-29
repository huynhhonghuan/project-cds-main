<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mohinh_Lotrinh extends Model
{
    use HasFactory;

    protected $table ='mohinh_lotrinh';
    protected $fillable =[
        'id',
        'tenlotrinh',
        'thoigian',
        'nhansu',
        'taichinh',
        'noidung',
        'luuy',
    ];
}
