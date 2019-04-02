<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id');            
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->default('avatar.png');
            $table->boolean('active')->default(false);
            $table->string('activation_token'); 
            $table->string('userID')->unique();           
            $table->string('lecturerID');
            $table->string('lecturerDescription');
            $table->string('supervisorID');                               
            $table->string('deptID');
            $table->foreign('deptID')->references('deptID')->on('department')->onDelete('cascade');
            $table->boolean('isCoordinator')->default(false);
            $table->boolean('isSupervisor')->default(false);
            $table->boolean('isPanelist')->default(false);            
            $table->rememberToken();            
            $table->softDeletes();            
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
        Schema::dropIfExists('supervisor');
    }
}
