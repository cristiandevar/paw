<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
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

    public function adminlte_image(){
        return "https://pixabay.com/get/g632ffcbac2fbe3311130478b5a73a155fb51b7305a21028427f0c5c80a9c3400e22f75730f4f84e642a5192104466c8567c45091b5c95ee9ae968010ef1c14c60394b3e354d3f3c45bc5e978c081405a_640.jpg";
    }

    public function adminlte_desc(){
        return "Administrador";
    }

    public function adminlte_profile_url(){
        return "#";
    }
}
