<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function post()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function alacarte()
    {
        return $this->hasMany(Alacarte::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function room()
    {
        return $this->hasOne(Room::class);
    }

    public function logo()
    {
        return $this->hasOne(Logo::class);
    }
}
