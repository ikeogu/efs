<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class S5ClassStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::disableForeignKeyConstraints();
        Schema::create('s5_class_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('s5_class_id');
            $table->unsignedInteger('student_id');

            // $table->foreign('s5_class_id')
            //         ->references('id')->on('s5_classes')->onDelete('cascade');

            // $table->foreign('student_id')
            //         ->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('s5_class_student');
        Schema::enableForeignKeyConstraints();
    }
}
