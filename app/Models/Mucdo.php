<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mucdo extends Model
{
    use HasFactory;

    protected $table ='mucdo';
    protected $fillable =[
        'id',
        'tenmucdo',
        'noidung',
        'diem',
    ];
}
