<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::table('terms', function (Blueprint $table) {
            $table->integer('h_cat1')->nullable();
            $table->integer('h_cat2')->nullable();
            $table->integer('y_summative')->nullable();
            $table->integer('e_summative')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('terms', function (Blueprint $table) {
            $table->integer('h_cat1')->nullable();
            $table->integer('h_cat2')->nullable();
            $table->integer('y_summative')->nullable();
            $table->integer('e_summative')->nullable();
        });
    }
}
