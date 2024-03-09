<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhgiaphieu2 extends Model
{
    use HasFactory;
    protected $table ='danhgiaphieu2';
    protected $fillable =[
        'id',
        'danhsachphieu2_id',
        'cauhoiphieu2_id',
        'diem',
        'trangthai',
    ];

    public function getdanhsachphieu2()
    {
        return $this->belongsTo(Danhsachphieu2::class, 'danhsachphieu2_id', 'id');
    }
}
