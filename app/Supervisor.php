<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $table = 'supervisor';
    protected $primaryKey ="supervisorID";
    public $incrementing = false;
    protected $keyType = "string";
}
