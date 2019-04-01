<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';            
            $table->bigIncrements('id');
            $table->string('lecturerID')->first();
            $table->string('lecturerDescription');
            $table->string('panelID')->nullable();
            $table->foreign('panelID')->references('panelID')->on('panel')->onDelete('cascade');
            $table->string('courseID');
            $table->string('deptID');
            $table->foreign('deptID')->references('deptID')->on('department')->onDelete('cascade');
            $table->boolean('isCoordinator')->default(false);
            $table->boolean('isSupervisor')->default(false);
            $table->boolean('isPanelist')->default(false);
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
        Schema::dropIfExists('lecturer');
    }
}
