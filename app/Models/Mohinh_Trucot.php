<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mohinh_Trucot extends Model
{
    use HasFactory;

    protected $table ='mohinh_trucot';
    protected $fillable =[
        'id',
        'tentrucot',
        'noidung',
        'ghichu',
    ];
}
