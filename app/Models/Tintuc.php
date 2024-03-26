<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    use HasFactory;
    protected $table = 'tintuc';
    protected $fillable = [
        'linhvuc_id',
        'user_id',
        'tieude',
        'tomtat',
        'hinhanh',
        'noidung',
        'luotxem',
        'duyet',
        'nguon'
    ];

    // public function getUser_Linhvuc()
    // {
    //     return $this->morphTo();
    // }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getLinhvuc()
    {
        return $this->belongsTo(Linhvuc::class, 'linhvuc_id');
    }
}
