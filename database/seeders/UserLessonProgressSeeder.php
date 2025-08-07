<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserLessonProgress;
use App\Models\User;
use App\Models\Lesson;

class UserLessonProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some test users first (excluding admin)
        $users = User::factory()->count(10)->create();
        
        // Get all lessons
        $lessons = Lesson::all();
        
        // Create realistic progress data - each user completes 30-70% of lessons
        $users->each(function ($user) use ($lessons) {
            $completionRate = rand(30, 70) / 100;
            $lessonsToComplete = $lessons->random((int)($lessons->count() * $completionRate));
            
            $lessonsToComplete->each(function ($lesson) use ($user) {
                UserLessonProgress::factory()->create([
                    'user_id' => $user->id,
                    'lesson_id' => $lesson->id,
                ]);
            });
        });
    }
}