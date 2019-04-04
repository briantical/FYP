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
}
