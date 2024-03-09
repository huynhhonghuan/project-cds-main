<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhsachphieu4 extends Model
{
    use HasFactory;
    protected $table = 'danhsachphieu4';
    protected $fillable = [
        'id',
        'khaosat_id',
        'tendanhgia',
        'diem',
        'soluonghoanthanh',
        'trangthai',
    ];

    public function getdanhgiaphieu4()
    {
        return $this->hasOne(Danhgiaphieu4::class, 'danhsachphieu4_id', 'id');
    }
}
