<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'image' => $this->faker->imageUrl,
            'description' => $this->faker->paragraph,
            'category_id' => rand(1, 10),
            'user_id' => rand(1, 10)
        ];
    }
}
