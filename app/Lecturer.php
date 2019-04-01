<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $table = 'lecturer';
    protected $primaryKey ="lecturerID";
    public $incrementing = false;
    protected $keyType = "string";
}
