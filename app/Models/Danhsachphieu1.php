<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhsachphieu1 extends Model
{
    use HasFactory;

    protected $table = 'danhsachphieu1';
    protected $fillable = [
        'id',
        'khaosat_id',
        'tendanhgia',
        'diem',
        'soluonghoanthanh',
        'trangthai',
    ];

    public function getdanhgiaphieu1()
    {
        return $this->hasMany(Danhgiaphieu1::class, 'danhsachphieu1_id', 'id');
    }
    public function getkhaosat()
    {
        return $this->belongsTo(Khaosat::class, 'khaosat_id', 'id');
    }
    public function getketquaphieu1()
    {
        return $this->hasMany(Ketquaphieu1::class, 'danhsachphieu1_id', 'id');
    }
}
