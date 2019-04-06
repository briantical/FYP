<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->delete();

	    $departments = [
	    	['deptID'=>'D.BITE', 'deptName'=>'Department of Information Technology', 'deptDescription'=>'Information Technology'],
	    	['deptID'=>'D.BCS', 'deptName'=>'Department of Computer Science', 'deptDescription'=>'Computer Science'],
	    	['deptID'=>'D.BSW', 'deptName'=>'Department of Software Engineering', 'deptDescription'=>'Software Engineering'],
	    	['deptID'=>'D.BIS', 'deptName'=>'Department of Information Science', 'deptDescription'=>'Information Science'],
	    	['deptID'=>'D.BIST', 'deptName'=>'Department of Information Science & Technology', 'deptDescription'=>'Information & Technology'],
	    ];

	    Department::insert($departments);
    }
}
