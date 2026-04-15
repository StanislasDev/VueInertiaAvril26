<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(3, true),
            'video_url' => 'mavideo.com/' . rand(10, 250),
            'course_id' => Course::inRandomOrder()->first()->id ?? Course::factory(),
        ];
    }
}
