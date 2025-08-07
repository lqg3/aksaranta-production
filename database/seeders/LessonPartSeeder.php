<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LessonPart;
use App\Models\Lesson;

class LessonPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all lessons and create 2-4 lesson parts per lesson
        Lesson::all()->each(function ($lesson) {
            LessonPart::factory()
                ->count(rand(2, 4))
                ->create(['lesson_id' => $lesson->id]);
        });
    }
}