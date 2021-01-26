<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBehaviourChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('behaviour_charts', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('term_id');
            $table->integer('s5_class_id');
            $table->integer('pic')->nullable();
            $table->integer('la')->nullable();
            $table->integer('fift')->nullable();
            $table->integer('cwot')->nullable();
            $table->integer('anc')->nullable();
            $table->integer('efao')->nullable();
            $table->integer('srk')->nullable();
            $table->integer('hwc')->nullable();
            $table->integer('catt')->nullable();
            $table->integer('care')->nullable();
            $table->integer('res')->nullable();
            $table->integer('Hon')->nullable();
            $table->integer('init')->nullable();
            $table->integer('lead')->nullable();
            $table->integer('dressc')->nullable();
            $table->integer('obey')->nullable();
            $table->integer('pol')->nullable();
            $table->integer('team')->nullable();
            $table->integer('soc')->nullable();
            $table->integer('psy')->nullable();
            $table->integer('sport')->nullable();
            $table->integer('notec')->nullable();
            $table->integer('spoken')->nullable();
            $table->integer('mus')->nullable();
            $table->integer('craft')->nullable();
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
        Schema::dropIfExists('behaviour_charts');
    }
}
