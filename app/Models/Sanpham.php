<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;

    protected $table ='sanpham';
    protected $fillable =[
        'id',
        'doanhnghiep_id',
        'tensanpham',
        'gia',
        'mota'
    ];

    public function getAnh()
    {
        return $this->belongsTo(Sanpham_Anh::class, 'id', 'sanpham_id');
    }
}
