<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';
    protected $primaryKey ="groupID";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
       'groupID','groupName', 'courseID', 'createdOn'
    ];
}
