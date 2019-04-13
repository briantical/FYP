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
	    	['courseID'=>'BITE', 'courseYear'=>date("Y")],
	    	['courseID'=>'BCS', 'courseYear'=>date("Y")],
	    	['courseID'=>'BSW', 'courseYear'=>date("Y")],
	    	['courseID'=>'BIS', 'courseYear'=>date("Y")],
	    	['courseID'=>'BIST', 'courseYear'=>date("Y")],
	    ];
	    Course::insert($courses);
    }
}
