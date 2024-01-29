<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiephoidoanhnghiep extends Model
{
    use HasFactory;

    protected $table ='hiephoidoanhnghiep';
    protected $fillable =[
        'id',
        'user_id',
        'tentiengviet',
        'tentienganh',
        'email',
        'sdt',
        'diachi',
        'mota',
    ];
}
