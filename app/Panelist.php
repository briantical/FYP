<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

use Avatar;
use Storage;

class Panelist extends Authenticatable
{
    protected $table = 'panel';
    protected $primaryKey ="panelistID";
    public $incrementing = false;
    protected $keyType = "string";

    use Notifiable , HasApiTokens , SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password', 'active', 'activation_token', 'avatar', 'userID', 'lecturerID', 'lecturerDescription', 'panelistID', 'deptID', 'isCoordinator','isSupervisor','isPanelist'
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
     * Get the department that the panelist belongs to
     */
    public function department()
    {
        return $this->belongsTo('App\Department','deptID');
    }

    /**
     * The projects handled by the panelist.
     */
    public function projects()
    {        
        return $this->belongsToMany('App\Project')->using('App\Panel');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}
