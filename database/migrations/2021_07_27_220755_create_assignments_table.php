<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('assignments', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->string('instruction');
        //     $table->string('body')->nullable();
        //      $table->string('file')->nullable();
        //      $table->integer('s5_class_id');
        //     $table->integer('term_id');
        //     $table->integer('subject_id');
        //     $table->integer('status');
        //     $table->integer('views')->nullable();
        //     $table->integer('teacher_id');
        //     $table->date('dead_line');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}