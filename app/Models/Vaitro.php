<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaitro extends Model
{
    use HasFactory;

    //đặt lại tên trường khóa chính và kiểu khi tạo database tự chỉnh
    protected $table ='vaitro';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = ['id','tenvaitro'];
}
