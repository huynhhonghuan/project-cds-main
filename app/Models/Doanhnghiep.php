<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doanhnghiep extends Model
{
    use HasFactory;

    protected $table = 'doanhnghiep';
    protected $fillable = [
        'id',
        'user_id',
        'doanhnghiep_loaihinh_id',
        'tentiengviet',
        'tentienganh',
        // 'email',
        'diachi',
        'mathue',
        'fax',
        'soluongnhansu',
        'ngaylap',
        'mota',
    ];
}
