<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhsachphieu2 extends Model
{
    use HasFactory;

    protected $table ='danhsachphieu2';
    protected $fillable =[
        'id',
        'khaosat_id',
        'tendanhgia',
        'diem',
        'soluonghoanthanh',
        'trangthai',
    ];

    public function getdanhgiaphieu2()
    {
        return $this->hasMany(Danhgiaphieu2::class, 'danhsachphieu2_id', 'id');
    }
}
