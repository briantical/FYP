<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';
    protected $primaryKey ="taskID";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
       'taskID','taskName','taskDescription','supervisorID','taskStartDate','taskEndDate','isComplete','isStarted'
    ];

    /**
     * Get the supervisor that owns the task.
     */
    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor','supervisorID');
    }

    /**
     * The projects that belong to the task.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Project','assignment', 'projectID','taskID');
    }
}
