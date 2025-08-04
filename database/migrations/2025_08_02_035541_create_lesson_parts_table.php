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
        Schema::create('lesson_parts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('lesson_id');
            $table->foreigvn('lesson_id')->references('id')->on('lessons');            
            $table->string('part_name');
            $table->string('part_type');
            $table->text('part_description');
            $table->text('part_video_url')->nullable();
            $table->json('part_content')->nullable();
            $table->smallInteger('order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_parts');
    }
};
