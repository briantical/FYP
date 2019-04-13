<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

use Avatar;
use Storage;

class Coordinator extends Authenticatable
{
    protected $table = 'coordinator';
    protected $primaryKey ="coordinatorID";
    public $incrementing = false;
    protected $keyType = "string";

    use Notifiable , HasApiTokens , SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password', 'active', 'activation_token', 'avatar', 'userID', 'lecturerID', 'lecturerDescription', 'coordinatorID', 'deptID', 'isCoordinator','isSupervisor','isPanelist'
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

    /**
     * Get the course record associated with the coordinator.
     */
    public function course()
    {
        return $this->hasOne('App\Course','coordinatorID');
    }

    /**
     * Get the department that the coordinator belongs to
     */
    public function department()
    {
        return $this->belongsTo('App\Department','deptID');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}
