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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
            $table->string('lesson_number');
            $table->string('lesson_title');
            $table->text('lesson_description');
            $table->string('lesson_video');
            $table->text('lesson_example_code');
            $table->text('lesson_output');
            $table->text('lesson_explanation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
