<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTermClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_term_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('s5_class_id');
            $table->unsignedInteger('term_id');
            $table->unsignedInteger('student_id');
            
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
        Schema::dropIfExists('student_term_classes');
    }
}
