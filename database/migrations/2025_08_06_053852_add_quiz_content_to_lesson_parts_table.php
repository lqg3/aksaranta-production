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
        Schema::table('lesson_parts', function (Blueprint $table) {
            $table->json('quiz_content')->nullable()->after('part_content');
        });
    }

    public function down(): void
    {
        Schema::table('lesson_parts', function (Blueprint $table) {
            $table->dropColumn('quiz_content');
        });
    }

};
