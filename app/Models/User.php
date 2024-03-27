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
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'password',
        'image',
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
        'id' => 'integer',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

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

    public function getvt()
    {
        return $this->hasOne(User_Vaitro::class, 'user_id', 'id')->whereNotIn('vaitro_id', ['ad', 'ctv', 'hhdn']);
    }

    public function getDoanhNghiep()
    {
        return $this->hasOne(Doanhnghiep::class);
    }
    public function getChuyenGia()
    {
        return $this->hasOne(Chuyengia::class);
    }
    public function getHiepHoiDoanhNghiep()
    {
        return $this->hasOne(Hiephoidoanhnghiep::class);
    }

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
    public function Check_Khach(): bool
    {
        return in_array(
            $this->getVaiTro[0]->id,
            [
                'kh',
            ],
        );
    }
}
