<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Create quizzes for 50% of lesson parts (randomly selected)
        LessonPart::where('part_type', 'quiz')
            ->orWhere('part_type', 'exercise')
            ->each(function ($lessonPart) {
                if (rand(1, 2) === 1) { // 50% chance
                    Quiz::factory()
                        ->count(rand(1, 3))
                        ->create(['lesson_part_id' => $lessonPart->id]);
                }
            });
    }
}