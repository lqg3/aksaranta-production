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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('video_url');
            $table->unsignedBigInteger('lesson_part_id');
            $table->foreign('lesson_part_id')->references('id')->on('lesson_parts')->onDelete('cascade');
            $table->text('video_description')->nullable();
            $table->smallInteger('order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
