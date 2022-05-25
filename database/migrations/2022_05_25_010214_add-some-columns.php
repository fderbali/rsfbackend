<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('communication',['french','english']);
        });
        Schema::table('trainings', function (Blueprint $table) {
            $table->enum('language',['french','english']);
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('estimates', function (Blueprint $table) {
            $table->enum('status',['paid','cancelled','pending']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('communication');
        });
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn('language');
        });
        Schema::table('sessions', function (Blueprint $table) {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            $table->dropColumn('user_id');
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        });
        Schema::table('estimates', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
