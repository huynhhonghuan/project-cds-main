<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Chuyengia_Danhgia extends Model
{
    use HasFactory;

    protected $table = 'chuyengia_danhgia';
    protected $fillable = [
        'id',
        'chuyengia_id',
        'khaosat_id',
        'danhgia',
        'dexuat',
    ];

    public function getKhaosat()
    {
        return $this->belongsTo(Khaosat::class, 'khaosat_id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'chuyengia_id', 'id');
    }

    //Lấy thông tin doanh nghiệp từ bảng chuyengia_danhgia - khaosat - doanhnghiep
    public function getDoanhnghiep(): HasOneThrough // one to one to one
    {
        return $this->hasOneThrough(
            Doanhnghiep::class,
            Khaosat::class,
            'id', //id cho 2 bảng doanhnghiep và khaosat
            'doanhnghiep_id', //khóa ngoại liên quan
            'khaosat_id' //khóa ngoại liên quan
        );
    }
}
