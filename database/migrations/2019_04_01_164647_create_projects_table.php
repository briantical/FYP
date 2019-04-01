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
            $table->bigIncrements('id');
            $table->string('projectID')->first();
            $table->string('projectName');
            $table->string('projectDescription');
            $table->string('groupID');
            $table->foreign('groupID')->references('groupID')->on('group')->onDelete('cascade');
            $table->string('supervisorID');
            $table->foreign('supervisorID')->references('supervisorID')->on('supervisor')->onDelete('cascade');
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
