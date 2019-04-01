<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey ="studentNumber";
    public $incrementing = false;
    protected $keyType = "string";
}
