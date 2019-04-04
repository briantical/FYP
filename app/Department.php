<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $primaryKey ="deptID";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
       'deptID','deptName','deptDescription'
    ];
}