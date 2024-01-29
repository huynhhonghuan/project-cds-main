<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mohinh extends Model
{
    use HasFactory;
    protected $table ='mohinh';
    protected $fillable =[
        'id',
        'tenmohinh',
        'noidung',
        'hinhanh',
        'mohinh_trucot_id',
        'doanhnghiep_loaihinh_id',
    ];
}
