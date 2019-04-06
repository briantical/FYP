<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';            
            $table->string('projectID')->unique();
            $table->string('projectName');
            $table->string('projectDescription');
            $table->string('groupID');            
            $table->string('supervisorID');           
            $table->date('projectStartDate')->default(date('Y-m-d H:i:s'));
            $table->date('projectEndDate');            
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
        Schema::dropIfExists('project');
    }
}
