<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhsachphieu3 extends Model
{
    use HasFactory;

    protected $table = 'danhsachphieu3';
    protected $fillable = [
        'id',
        'khaosat_id',
        'tendanhgia',
        'diem',
        'soluonghoanthanh',
        'trangthai',
    ];

    public function getdanhgiaphieu3()
    {
        return $this->hasMany(Danhgiaphieu3::class, 'danhsachphieu3_id', 'id');
    }

    public function getdenghiphieu3()
    {
        return $this->hasOne(Denghiphieu3::class, 'danhsachphieu3_id', 'id');
    }
}
