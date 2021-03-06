<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'birthdate',
        'generation',
        'phone_number',
        'gender',
        'role',
        'self_description',
        'username',
        'key_user',
        'status',
        'photo_profil',
        'password_key',
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

    public function posts()
    {
        return $this->hasMany('App\Posts');
    }

    public function works()
    {
        return $this->hasMany('App\Works','users_id');
    }

    public function getPhotoProfil()
    {
        if(!$this->photo_profil)
        {
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->photo_profil);
    }
}
