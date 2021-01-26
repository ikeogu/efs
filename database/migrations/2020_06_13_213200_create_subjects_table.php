<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('description')->nullable();
            $table->integer('home_work')->nullable();
            $table->integer('class_work')->nullable();
            $table->integer('friday_test')->nullable();
            $table->integer('holiday_assignment')->nullable();
            $table->string('level');
            $table->integer('summative_test')->nullable();
            $table->integer('cat_1')->nullable();
            $table->integer('cat_2')->nullable();
            $table->integer('exam')->nullable();
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
        Schema::dropIfExists('subjects');
    }
}
