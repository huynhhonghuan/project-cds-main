<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuyengia extends Model
{
    use HasFactory;

    protected $table ='chuyengia';
    protected $fillable =[
        'id',
        'user_id',
        'linhvuc_id',
        'tenchuyengia',
        'email',
        'sdt',
        'diachi',
        'cccd',
        'img_mattruoc',
        'img_matsau',
        'mota',
    ];
}
