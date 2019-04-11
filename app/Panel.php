<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Panel extends Pivot
{
    protected $table = 'panel';
    protected $primaryKey ="panelID";
    public $incrementing = true;
    protected $keyType = "string";

    use SoftDeletes;

    protected $fillable = [
       'id','projectID','panelistID'
    ];
}
