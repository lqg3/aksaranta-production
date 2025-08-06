<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Course;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all courses and create 3-5 lessons per course
        Course::all()->each(function ($course) {
            Lesson::factory()
                ->count(rand(3, 5))
                ->create(['course_id' => $course->id]);
        });
    }
}