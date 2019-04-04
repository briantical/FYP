<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Assignment extends Pivot
{
    protected $table = 'assignment';
    protected $primaryKey =["taskID", "supervisorID"];
    public $incrementing = true;
    protected $keyType = "string";

    protected $fillable = [
       'id','taskID','supervisorID'
    ];   
}
