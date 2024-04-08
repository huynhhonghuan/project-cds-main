<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'baiviet';
    protected $fillable = [
        'id',
        'user_id',
        'noidung',
        'luotxem',
        'luotthich',
        'trangthai',
    ];
    protected $appends = ['liked'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getBinhLuans()
    {
        return $this->hasMany(BaiViet_BinhLuan::class, 'baiviet_id', 'id');
    }

    public function getHinhAnhs()
    {
        return $this->hasMany(BaiViet_Anh::class, 'baiviet_id', 'id');
    }

    public function getDanhMucs()
    {
        return $this->belongsToMany(DanhMuc::class, 'baiviet_danhmuc', 'baiviet_id', 'danhmuc_id');
    }

    public function likes()
    {
        return $this->hasMany(BaiViet_Thich::class, 'baiviet_id', 'id');
    }
}
