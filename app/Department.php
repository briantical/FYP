<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    pprotected $table = 'department';
    protected $primaryKey ="departmentID";
    public $incrementing = false;
    protected $keyType = "string";
