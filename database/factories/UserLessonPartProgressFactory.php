<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserLessonPartProgress>
 */
class UserLessonPartProgressFactory extends Factory
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
            'user_id' => \App\Models\User::factory(),
            'completed_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
