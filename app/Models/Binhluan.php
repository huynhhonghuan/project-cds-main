<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    use HasFactory;

    protected $table = 'binhluan';
    protected $fillable = [
        'id',
        'user_id',
        'tintuc_id',
        'ten',
        'noidung',
        'ngaydang',
        'binhluan_id',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getPhanHois()
    {
        return $this->hasMany(Binhluan::class);
    }
}
