<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id');
            $table->string('taskID')->first();
            $table->string('taskName');
            $table->string('taskDescription');
            $table->string('groupID');
            $table->foreign('groupID')->references('groupID')->on('group')->onDelete('cascade');
            $table->string('supervisorID')->nullable();
            $table->foreign('supervisorID')->references('supervisorID')->on('supervisor')->onDelete('cascade');
            $table->string('coordinatorID')->nullable();
            $table->foreign('coordinatorID')->references('coordinatorID')->on('coordinator')->onDelete('cascade');
            $table->string('studentNumber');
            $table->foreign('studentNumber')->references('studentNumber')->on('student')->onDelete('cascade');
            $table->date('taskStartDate')->default(date('Y-m-d H:i:s'));
            $table->date('taskEndDate');
            $table->boolean('isComplete')->default(false);
            $table->boolean('isStarted')->default(false);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
