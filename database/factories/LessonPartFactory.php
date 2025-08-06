<?php

namespace Database\Factories;

use App\Models\LessonPart;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonPartFactory extends Factory
{
    protected $model = LessonPart::class;

    public function definition(): array
    {
        return [
            'lesson_id' => Lesson::factory(), // Bisa di-override di seeder
            'part_name' => $this->faker->words(3, true),
            'part_description' => $this->faker->text(150),
            'part_video_url' => $this->faker->optional()->url(),
            'part_content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }
}
