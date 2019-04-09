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
            $table->string('taskID')->primary();
            $table->string('taskName');
            $table->string('taskDescription');            
            $table->string('supervisorID')->nullable()->default(null);                            
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
