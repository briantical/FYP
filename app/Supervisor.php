<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class Supervisor extends Authenticatable
{
    protected $table = 'supervisor';
    protected $primaryKey ="supervisorID";
    public $incrementing = false;
    protected $keyType = "string";

    use Notifiable , HasApiTokens , SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password', 'active', 'activation_token', 'avatar', 'userID', 'lectureID', 'lectureDescription', 'supervisorID', 'deptID', 'isCoordinator','isSupervisor','isPanelist'
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
     * Get the projects of the supervisor
     */
    public function projects()
    {
        return $this->hasMany('App\Project','supervisorID');
    }

    /**
     * Get the tasks of the supervisor
     */
    public function tasks()
    {
        return $this->hasMany('App\Task','supervisorID');
    }

    /**
     * Get the department that the supervisor belongs to
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
