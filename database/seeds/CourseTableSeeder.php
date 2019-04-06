<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->delete();
	    $courses = [
	    	['courseID'=>'BITE', 'courseYear'=>date("Y"), 'coordinatorID'=>'null'],
	    	['courseID'=>'BCS', 'courseYear'=>date("Y"), 'coordinatorID'=>'null'],
	    	['courseID'=>'BSW', 'courseYear'=>date("Y"), 'coordinatorID'=>'null'],
	    	['courseID'=>'BIS', 'courseYear'=>date("Y"), 'coordinatorID'=>'null'],
	    	['courseID'=>'BIST', 'courseYear'=>date("Y"), 'coordinatorID'=>'null'],
	    ];
	    Course::insert($courses);
    }
}
