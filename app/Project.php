<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $primaryKey ="projectID";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
       'projectID','projectName','projectDescription','groupID','supervisorID','projectStartDate','projectEndDate','isComplete','isStarted'
    ];

    /**
     * Get the group that owns the project.
     */
    public function group()
    {
        return $this->belongsTo('App\Group', 'groupID');
    }

    /**
     * Get the supervisor that supervisors this project.
     */
    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor','supervisorID');
    }

    /**
     * The tasks that belong to the project.
     */
    public function tasks()
    {
        //return $this->belongsToMany('App\Task','assignment','projectID','taskID');
        return $this->belongsToMany('App\Task')->using('App\Assignment');
    }

    /**
     * The panelists for the project.
     */
    public function panelists()
    {
        //return $this->belongsToMany('App\Task','assignment','projectID','taskID');
        return $this->belongsToMany('App\Panelist')->using('App\Panel');
    }
}