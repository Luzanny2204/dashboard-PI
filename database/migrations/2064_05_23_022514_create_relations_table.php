<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Relaciones segunda parte
        Schema::table('users', function ($table){
            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });
        Schema::table('positions', function ($table){
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });
        Schema::table('teams', function ($table){
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });
        Schema::table('databiologies', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
        Schema::table('menstrualcalendars', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
        Schema::table('users_has_teams', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade');
        });
        Schema::table('nutritionists', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
        Schema::table('psicologies', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relations');
    }
};
