<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';    
    protected $primaryKey ="courseID";
    public $incrementing = false;
    protected $keyType = "string";
}
