<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable , HasApiTokens , SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password', 'active', 'activation_token'
    ];
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
