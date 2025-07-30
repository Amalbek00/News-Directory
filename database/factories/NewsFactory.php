<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
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
            'announcement' => $this->faker->paragraph(2),
            'text' => $this->faker->paragraph(6),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'author_id' => Author::inRandomOrder()->first()?->id,
        ];
    }
}
