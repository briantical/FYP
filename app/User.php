<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

use Storage;

class User extends Authenticatable
{
    use Notifiable , HasApiTokens , SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password', 'active', 'activation_token', 'avatar'
    ];
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['avatar_url'];
    
    public function getAvatarUrlAttribute()
    {
        return Storage::url('avatars/'.$this->id.'/'.$this->avatar);
    }

    public function student()
    {
        return $this->hasOne('App\Student','userID');
    }

    public function supervisor()
    {
        return $this->hasOne('App\Supervisor','userID');
    }

    public function coordinator()
    {
        return $this->hasOne('App\Coordinator','userID');
    }

    public function panelist()
    {
        return $this->hasOne('App\Panelist','userID');
    }
}
