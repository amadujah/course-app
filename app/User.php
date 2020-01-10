<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    const ADMIN_TYPE = 'theme';
    const DEFAULT_TYPE = 'default';

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function isAdmin()
    {
        return $this->admin;
    }
}
