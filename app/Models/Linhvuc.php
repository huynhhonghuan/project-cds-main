<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linhvuc extends Model
{
    use HasFactory;

    protected $table='linhvuc';
    //đặt lại tên trường khóa chính và kiểu khi tạo database tự chỉnh
    protected $primaryKey ='id';
    protected $keyType='string';

    // public function getUser_Linhvuc()
    // {
    //     return $this->morphOne(Tintuc::class,'getUser_Linhvuc');
    // }
}
