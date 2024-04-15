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
        Schema::create('getting_started_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('getting_started_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('getting_started_steps');
    }
};
