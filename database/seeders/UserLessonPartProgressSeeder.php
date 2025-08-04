<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserLessonPartProgress;
use App\Models\UserLessonProgress;
use App\Models\LessonPart;

class UserLessonPartProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // For each user lesson progress, create progress for most lesson parts in that lesson
        UserLessonProgress::with(['lesson.lessonParts', 'user'])->get()->each(function ($userLessonProgress) {
            $lessonParts = $userLessonProgress->lesson->lessonParts ?? collect();
            
            if ($lessonParts->isNotEmpty()) {
                // Complete 70-100% of lesson parts for each completed lesson
                $completionRate = rand(70, 100) / 100;
                $partsToComplete = $lessonParts->random((int)($lessonParts->count() * $completionRate));
                
                $partsToComplete->each(function ($lessonPart) use ($userLessonProgress) {
                    UserLessonPartProgress::factory()->create([
                        'user_id' => $userLessonProgress->user_id,
                        'lesson_part_id' => $lessonPart->id,
                    ]);
                });
            }
        });
    }
}