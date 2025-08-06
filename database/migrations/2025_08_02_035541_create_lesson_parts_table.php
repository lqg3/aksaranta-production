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

            $table->foreignId('lesson_id')->constrained('lessons')->onDelete('cascade');

            $table->string('part_name');
            $table->text('part_description')->nullable();
            $table->string('part_video_url')->nullable();
            $table->longText('part_content')->nullable(); // gunakan longText karena HTML bisa panjang
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
