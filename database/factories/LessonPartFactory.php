<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LessonPart>
 */
class LessonPartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lesson_id' => \App\Models\Lesson::factory(),
            'part_name' => fake()->words(3, true),
            'part_type' => fake()->randomElement(['video', 'reading', 'quiz']),
            'part_description' => fake()->text(200), // Limit to 200 characters to be safe
            'part_video_url' => fake()->optional()->url(),
            'part_content' => json_encode([
                'content' => fake()->sentences(2), // Shorter content
                'exercises' => fake()->words(3) // Fewer words
            ]),
            'order' => fake()->numberBetween(1, 3)
        ];
    }
}
