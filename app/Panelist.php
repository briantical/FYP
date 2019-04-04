<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class Panelist extends Authenticatable
{
    protected $table = 'panel';
    protected $primaryKey ="panelistID";
    public $incrementing = false;
    protected $keyType = "string";

    use Notifiable , HasApiTokens , SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password', 'active', 'activation_token', 'avatar', 'userID', 'lectureID', 'lectureDescription', 'panelistID', 'deptID', 'isCoordinator','isSupervisor','isPanelist'
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
}
