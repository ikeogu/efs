<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('student_id');
            $table->integer('subject_id')->nullable();
            $table->integer('subject_id1')->nullable();
            $table->integer('subject_id2')->nullable();
            $table->integer('subject_id3')->nullable();
            $table->integer('term_id');
            $table->integer('s5_class_id');
            $table->integer('aveg');
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
        Schema::dropIfExists('sub_subjects');
    }
}
