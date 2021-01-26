<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id');
            $table->bigInteger('subject_id');
            $table->bigInteger('term_id');
            $table->bigInteger('s5_class_id');
            $table->string('subname');
            $table->double('HW', 15, 8)->nullable();
            $table->double('CW', 15, 8)->nullable();
            $table->double('FT', 15, 8)->nullable();
            $table->double('HA', 15, 8)->nullable();
            $table->double('summative_test', 15, 8)->nullable();
            $table->double('CAT1', 15, 8)->nullable();
            $table->double('CAT2', 15, 8)->nullable();
            $table->double('MSC', 15, 8)->nullable();
            $table->double('Exam', 15, 8)->nullable();
            $table->double('TCA', 15, 8)->nullable();
            $table->double('GT', 15, 8)->nullable();
            
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
        Schema::dropIfExists('subject_marks');
    }
}
