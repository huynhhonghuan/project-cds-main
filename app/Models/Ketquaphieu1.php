<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketquaphieu1 extends Model
{
    use HasFactory;

    protected $table = 'ketquaphieu1';
    protected $fillable = [
        'id',
        'danhsachphieu1_id',
        'mohinh_trucot_id',
        'phantram',
    ];

    public function getTruCot()
    {
        return $this->belongsTo(Mohinh_Trucot::class, 'mohinh_trucot_id', 'id');
    }
}
