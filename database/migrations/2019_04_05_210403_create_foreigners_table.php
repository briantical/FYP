<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supervisor', function(Blueprint $table) {
            $table->foreign('deptID')->references('deptID')->on('department')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('coordinator', function(Blueprint $table) {
            $table->foreign('deptID')->references('deptID')->on('department')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('project', function(Blueprint $table) {
            $table->foreign('groupID')->references('groupID')->on('group')->onDelete('cascade');
            $table->foreign('supervisorID')->references('supervisorID')->on('supervisor')->onDelete('cascade');
        });

        Schema::table('group', function(Blueprint $table) {
             $table->foreign('courseID')->references('courseID')->on('course')->onDelete('cascade');
        });

        Schema::table('task', function(Blueprint $table) {
            $table->foreign('supervisorID')->references('supervisorID')->on('supervisor')->onDelete('cascade');
        });

        Schema::table('course', function(Blueprint $table) {
            $table->foreign('coordinatorID')->references('coordinatorID')->on('coordinator')->onDelete('cascade');
        });

        Schema::table('student', function(Blueprint $table) {
            $table->foreign('courseID')->references('courseID')->on('course')->onDelete('cascade');
            $table->foreign('groupID')->references('groupID')->on('group')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('panel', function(Blueprint $table) {
            $table->foreign('projectID')->references('projectID')->on('project')->onDelete('cascade');
            $table->foreign('panelistID')->references('panelistID')->on('panelist')->onDelete('cascade');
        });

        Schema::table('panelist', function(Blueprint $table) {
            $table->foreign('deptID')->references('deptID')->on('department')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('assignment', function(Blueprint $table) {
           //$table->foreign('taskID')->references('taskID')->on('task')->onDelete('cascade');
           //$table->foreign('projectID')->references('projectID')->on('project')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreigners');
    }
}
