<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name', 100);
            $table->string('session', 100);
            $table->string('description', 100);
            $table->integer('status')->unsigned();
            $table->integer('fee_h')->nullable();
            $table->integer('fee_y')->nullable();
            $table->integer('fee_e')->nullable();
            
            $table->date('resumption_date')->nullable();
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
        Schema::dropIfExists('terms');
    }
}
