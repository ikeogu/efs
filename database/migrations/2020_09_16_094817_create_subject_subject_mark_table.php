<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectSubjectMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('subject_subject_mark', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('subject_mark_id');

            // $table->foreign('subject_id')
            //         ->references('id')->on('subjects')->onDelete('cascade');

            // $table->foreign('subject_mark_id')
            //         ->references('id')->on('subject_marks')->onDelete('cascade');
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
        Schema::dropIfExists('subject_subject_mark');
    }
}
