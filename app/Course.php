<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    protected $table = 'course';    
    protected $primaryKey ="courseID";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
       'courseID','courseYear','coordinatorID'
    ];

    /**
     * Get the group record associated with the course.
     */
    public function groups()
    {
        return $this->hasMany('App\Group','courseID');
    }

    /**
     * Get the coordinator of course.
     */
    public function coordinator()
    {
        return $this->belongsTo('App\Coordinator', 'coordinatorID');
    }

    /**
     * Get the students records for the course.
     */
    public function students()
    {
        return $this->hasMany('App\Student', 'courseID');
    }
}
