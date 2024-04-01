<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuvien extends Model
{
    use HasFactory;
    protected $table = 'thuvien';
    protected $fillable = [
        'tieude',
        'kyhieu',
        'namphathanh',
        'loai',
        'file',
    ];
}
