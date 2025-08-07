<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lesson_part_id' => \App\Models\LessonPart::factory(),
            'quiz_type' => fake()->randomElement(['multiple_choice', 'true_false', 'fill_blank', 'matching']),
            'quiz_content' => json_encode([
                'question' => fake()->sentence() . '?',
                'options' => fake()->words(4),
                'correct_answer' => fake()->word(),
                'explanation' => fake()->sentence()
            ]),
        ];
    }
}
