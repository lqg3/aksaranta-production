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
        Schema::create('user_lesson_part_progress', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestampTz('completed_at');
            $table->unsignedBigInteger('lesson_part_id');
            $table->foreign('lesson_part_id')->references('id')->on('lesson_parts');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_lesson_part_progress');
    }
};
