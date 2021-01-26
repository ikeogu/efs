<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('oname');
            $table->string('s_class');
            $table->string('level');

            $table->string('surname');
            $table->string('email');
            $table->string('p_email')->nullable();
            $table->integer('roll_no')->nullable();
            $table->date('dob')->nullable();
            $table->smallInteger('gender')->nullable();
            
            $table->string('identification_mark')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->integer('p_fee')->nullable();
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
        Schema::dropIfExists('students');
    }
}
