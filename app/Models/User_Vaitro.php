<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Vaitro extends Model
{
    use HasFactory;

    protected $fillable=['user_id','vaitro_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vaitro(){
        return $this->belongsTo(Vaitro::class);
    }
}
