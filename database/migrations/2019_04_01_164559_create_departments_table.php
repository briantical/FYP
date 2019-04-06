<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';            
            $table->string('deptID')->unique();
            $table->string('deptName');
            $table->string('deptDescription');            
        });

        Artisan::call( 'db:seed', [
            '--class' => 'DepartmentTableSeeder',
            '--force' => true ]
         );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department');
        Artisan::call( 'db:seed', [
            '--class' => 'DepartmentTableSeeder',
            '--force' => true ]
        );
    }
}
