<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

use Avatar;
use Storage;

class Student extends Authenticatable
{
    protected $table = 'student';
    protected $primaryKey ="studentNumber";
    public $incrementing = false;
    protected $keyType = "string";

    use Notifiable , HasApiTokens , SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password', 'active', 'activation_token', 'avatar', 'userID', 'studentNumber', 'registrationNumber', 'courseID', 'groupID'
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
     * Get the group that has the student.
     */
    public function group()
    {
        return $this->belongsTo('App\Group','groupID');
    }

    /**
     * Get the course that the student belongs to
     */
    public function course()
    {
        return $this->belongsTo('App\Course','courseID');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}
