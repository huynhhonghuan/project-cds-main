<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Auth;

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
    public function getRoles(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
    }

    //Kiểm tra tài khoản đăng nhập có phải là Admin
    // public function Check_Admin(): bool
    // {
    //     $user =User::with('getRoles')->where('id', Auth::user()->id)->get();
    //     $role = $user[0]->getRoles[0]->id;
    //     if($role == "ad")
    //         return true;
    //     return false;
    // }

    // //Kiểm tra tài khoản đăng nhập có phải là Cộng tác viên
    // public function Check_Congtacvien(): bool
    // {
    //     $user =User::with('getRoles')->where('id', Auth::user()->id)->get();
    //     $role = $user[0]->getRoles[0]->id;
    //     if($role == "ctv")
    //         return true;
    //     return false;
    // }

    // //Kiểm tra tài khoản đăng nhập có phải là Doanh nghiệp
    // public function Check_Doanhnghiep(): bool
    // {
    //     $user =User::with('getRoles')->where('id', Auth::user()->id)->get();
    //     $role = $user[0]->getRoles[0]->id;
    //     if($role == "dn")
    //         return true;
    //     return false;
    // }

    // //Kiểm tra tài khoản đăng nhập có phải là Chuyên gia
    // public function Check_Chuyengia(): bool
    // {
    //     $user =User::with('getRoles')->where('id', Auth::user()->id)->get();
    //     $role = $user[0]->getRoles[0]->id;
    //     if($role == "cg")
    //         return true;
    //     return false;
    // }

    // //Kiểm tra tài khoản đăng nhập có phải là Hội doanh nghiệp
    // public function Check_Hoidoanhnghiep(): bool
    // {
    //     $user =User::with('getRoles')->where('id', Auth::user()->id)->get();
    //     $role = $user[0]->getRoles[0]->id;
    //     if($role == "hdn")
    //         return true;
    //     return false;
    // }

    // public function getUser_Linhvuc()
    // {
    //     return $this->morphOne(Tintuc::class,'getUser_Linhvuc');
    // }

    public function Check_Admin(): bool
    {
        return in_array(
            $this->getRoles[0]->id,
            [
                'ad',
            ],
        );
    }
    public function Check_Congtacvien(): bool
    {
        return in_array(
            $this->getRoles[0]->id,
            [
                'ctv',
            ],
        );
    }
    public function Check_Doanhnghiep(): bool
    {
        return in_array(
            $this->getRoles[0]->id,
            [
                'dn',
            ],
        );
    }
    public function Check_Chuyengia(): bool
    {
        return in_array(
            $this->getRoles[0]->id,
            [
                'cg',
            ],
        );
    }
    public function Check_Hiephoidoanhnghiep(): bool
    {
        return in_array(
            $this->getRoles[0]->id,
            [
                'hhdn',
            ],
        );
    }

}
