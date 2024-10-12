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
            Schema::create('results', function (Blueprint $table) {
                $table->id();
                $table->foreignId('quiz_id');
                $table->foreignId('user_id');
                $table->integer('total');
                $table->integer('correct_answers');
                $table->integer('wrong_answers');
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('quiz_id')->references('id')->on('quizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
