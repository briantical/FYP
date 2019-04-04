<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';
    protected $primaryKey ="groupID";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
       'groupID','groupName', 'courseID', 'createdOn'
    ];

    /**
     * Get the course that has the group.
     */
    public function course()
    {
        return $this->belongsTo('App\Course','courseID');
    }

    /**
     * Get the student record associated with the group.
     */
    public function students()
    {
        return $this->hasMany('App\Student','groupID');
    }

    /**
     * Get the project record associated with the group.
     */
    public function project()
    {
        return $this->hasOne('App\Project','groupID');
    }
}
