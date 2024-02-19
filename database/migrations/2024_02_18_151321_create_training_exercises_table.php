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
        Schema::create('training_exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('train_id');
            $table->foreign('train_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->string('name');
            $table->integer('sets');
            $table->string('reps');
            $table->integer('weight');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_exercises');
    }
};
