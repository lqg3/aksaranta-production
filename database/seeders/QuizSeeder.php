<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\LessonPart;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Untuk setiap LessonPart, buat minimal 1 Quiz (bisa 1-3)
        LessonPart::all()->each(function ($lessonPart) {
            Quiz::factory()
                ->count(rand(1, 3))
                ->create([
                    'lesson_part_id' => $lessonPart->id
                ]);
        });
    }
}
