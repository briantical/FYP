<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Panel extends Pivot
{
    protected $table = 'panel';
    protected $primaryKey ="panelID";
    public $incrementing = true;
    protected $keyType = "string";

    protected $fillable = [
       'id','projectID','panelistID'
    ];
}
