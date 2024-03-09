<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhgiaphieu1 extends Model
{
    use HasFactory;

    protected $table = 'danhgiaphieu1';
    protected $fillable = [
        'id',
        'danhsachphieu1_id',
        'cauhoiphieu1_id',
        'diem',
        'trangthai',
    ];

    public function getcauhoiphieu1()
    {
        return $this->belongsTo(Cauhoiphieu1::class, 'cauhoiphieu1_id', 'id');
    }
    public function getdanhsachphieu1()
    {
        return $this->belongsTo(Danhsachphieu1::class, 'danhsachphieu1_id', 'id');
    }
}
