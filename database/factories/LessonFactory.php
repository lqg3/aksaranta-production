<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => \App\Models\Course::factory(),
            'lesson_name' => fake()->name(),
            'order' => function (array $attributes) {
                $courseId = $attributes['course_id'] ?? \App\Models\Course::factory()->create()->id;
                return \App\Models\Lesson::where('course_id', $courseId)->count() + 1;
            },
        ];
    }
}
