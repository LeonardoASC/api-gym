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
        Schema::create('nutritions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('mealName');
            $table->string('description')->nullable();
            $table->string('mealTime')->nullable();
            $table->string('ingredients')->nullable();
            $table->string('prepTime')->nullable();
            $table->string('mealType')->nullable();
            $table->string('recipe')->nullable();
            $table->string('difficulty')->nullable();
            $table->string('benefits')->nullable();
            $table->string('portionSize')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutritions');
    }
};
