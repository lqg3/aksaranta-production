<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // First create admin user
            AdminUserSeeder::class,
            
            // Then create course structure (in dependency order)
            CourseSeeder::class,
            LessonSeeder::class,
            LessonPartSeeder::class,
            QuizSeeder::class,
            
            // Finally create user progress data
            UserLessonProgressSeeder::class,
            UserLessonPartProgressSeeder::class,
        ]);
    }
}
