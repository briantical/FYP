<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';            
            $table->string('courseID')->primary();
            $table->year('courseYear')->default(date("Y"));
            $table->string('coordinatorID')->nullabe()->default(null);                        
        });

        //Artisan::call( 'db:seed', [
           // '--class' => 'CourseTableSeeder',
            //'--force' => true ]
         //);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
        //Artisan::call( 'db:seed', [
        //    '--class' => 'CourseTableSeeder',
        //    '--force' => true ]
        //);
    }
}
