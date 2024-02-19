<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Users - User_roles - Roles
    // Từ bảng users chúng ta lấy được name vai trò từ bảng roles mà có 1 bảng trung gian user_roles
    // Sử dụng mối quan hệ belongsToMany
    public function getVaiTro(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Vaitro', 'user_vaitro', 'user_id', 'vaitro_id')->withPivot('cap_vaitro_id', 'duyet_user_id');
    }

    public function getCapVaiTro(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Vaitro', 'user_vaitro', 'user_id', 'cap_vaitro_id');
    }

    // public function getNguoiDuyet(): HasMany
    // {
    //     return $this->hasMany(User_Vaitro::class, 'duyet_user_id');
    // }

    //Kiểm tra tài khoản đăng nhập

    public function Check_Admin(): bool
    {
        return in_array(
            $this->getVaiTro[0]->id,
            [
                'ad',
            ],
        );
    }
    public function Check_Congtacvien(): bool
    {
        return in_array(
            $this->getVaiTro[0]->id,
            [
                'ctv',
            ],
        );
    }
    public function Check_Doanhnghiep(): bool
    {
        return in_array(
            $this->getVaiTro[0]->id,
            [
                'dn',
            ],
        );
    }
    public function Check_Chuyengia(): bool
    {
        return in_array(
            $this->getVaiTro[0]->id,
            [
                'cg',
            ],
        );
    }
    public function Check_Hiephoidoanhnghiep(): bool
    {
        return in_array(
            $this->getVaiTro[0]->id,
            [
                'hhdn',
            ],
        );
    }
}
