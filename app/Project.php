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
}