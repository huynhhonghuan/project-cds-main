<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $fillable = [
        'id',
        'user_id',
        'tieude',
        'file',
        'duyet',
    ];
    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
