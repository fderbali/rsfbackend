<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demands', function (Blueprint $table) {
            $table->foreign('training_id')->references('id')->on('trainings');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('estimate_id')->references('id')->on('estimate');
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign('training_id')->references('id')->on('trainings');
        });
        Schema::table('evaluations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('trainings', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('estimates', function (Blueprint $table) {
            $table->foreign('demand_id')->references('id')->on('demands');
        });
        Schema::table('announces', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
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
    }
}
