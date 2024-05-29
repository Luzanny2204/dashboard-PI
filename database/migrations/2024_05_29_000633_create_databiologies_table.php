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
        Schema::create('databiologies', function (Blueprint $table) {
            $table->id();
            $table->string('waist');
            $table->string('quadril');
            $table->string('bust');
            $table->string('endurance');
            $table->string('speed');
            $table->string('flexibility');
            $table->string('temperature');
            $table->string('imc');
            $table->bigInteger('user_id')->nullable()->unsigned();//estado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databiologies');
    }
};
