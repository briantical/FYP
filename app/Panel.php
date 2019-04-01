<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    protected $table = 'panel';
    protected $primaryKey ="panelID";
    public $incrementing = false;
    protected $keyType = "string";
}
