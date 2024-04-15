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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->foreignId('programming_language_id')->constrained()->onDelete('cascade');
            $table->integer('question_number');
            $table->text('question');
            $table->text('code_snippet')->nullable();
            $table->text('choice_1');
            $table->text('choice_2');
            $table->text('choice_3');
            $table->text('choice_4');
            $table->tinyInteger('correct_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
