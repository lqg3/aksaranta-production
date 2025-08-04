<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_name'        =>fake()->realText(15),
            'course_description' =>fake()->realText(50),
            'slug'               =>fake()->slug(),
            'instructor'         =>fake()->name(),
            'image_url'          =>'https://blogs.bl.uk/.a/6a00d8341c464853ef0282e13e90d2200b-580wi',
        ];
    }
}
