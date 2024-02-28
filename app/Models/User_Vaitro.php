<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Vaitro extends Model
{
    use HasFactory;

    protected $table = 'user_vaitro';

    protected $fillable = ['user_id', 'vaitro_id', 'cap_vaitro_id', 'duyet_user_id'];

    public function nguoiduyet()
    {
        return $this->belongsTo(User::class, 'duyet_user_id');
    }

    public function vaitro()
    {
        return $this->belongsTo(Vaitro::class);
    }

    public function getuser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->whereNotIn('vaitro_id', ['ad', 'ctv']);
    }
}
