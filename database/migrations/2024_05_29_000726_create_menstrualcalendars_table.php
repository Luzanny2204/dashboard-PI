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
        Schema::create('menstrualcalendars', function (Blueprint $table) {
            $table->id();
            $table->date('last_period');
            $table->string('duration');
            $table->longText('symptoms');
            $table->string('cervical_flux');
            $table->string('sexual_activity');
            $table->bigInteger('user_id')->nullable()->unsigned();//estado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menstrualcalendars');
    }
};
