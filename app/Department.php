<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $primaryKey ="deptID";
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps = false;

    protected $fillable = [
       'deptID','deptName','deptDescription'
    ];

    /**
     * Get the supervisors for the department.
     */
    public function supervisors()
    {
        return $this->hasMany('App\Supervisor', 'deptID');
    }

    /**
     * Get the coordinators for the department.
     */
    public function coordinators()
    {
        return $this->hasMany('App\Coordinator', 'deptID');
    }

    /**
     * Get the panelists for the department post.
     */
    public function panelists()
    {
        return $this->hasMany('App\Panelist', 'deptID');
    }
}