<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinator', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';                      
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->default('avatar.png');
            $table->boolean('active')->default(false);
            $table->string('activation_token'); 
            $table->unsignedInteger('userID');            
            $table->string('lecturerID')->unique();
            $table->string('lecturerDescription');
            $table->string('coordinatorID')->primary();                               
            $table->string('deptID');            
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
        Schema::dropIfExists('coordinator');
    }
}
