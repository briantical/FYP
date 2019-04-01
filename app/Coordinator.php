<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    protected $table = 'coordinator';
    protected $primaryKey ="coordinatorID";
    public $incrementing = false;
    protected $keyType = "string";
}
