<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(3, true);
        $slug =  Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'is_random' => true
            // 'rating' => fake()->randomFloat(1, 0, 10)
        ];
    }
}
