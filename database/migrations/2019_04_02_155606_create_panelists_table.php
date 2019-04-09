<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panelist', function (Blueprint $table) {
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
            $table->integer('userID')->unsigned()->nullable();            
            $table->string('lecturerID')->unique();
            $table->string('lecturerDescription');
            $table->string('panelistID')->primary();                               
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
        Schema::dropIfExists('panelist');
    }
}
