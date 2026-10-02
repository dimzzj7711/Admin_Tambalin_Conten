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
            //
            'user_id' => \App\Models\User::factory(),
            'title' => fake()->sentence(4),
            'status' => fake()->randomElement(['draft', 'published']),
            'published_at' => fake()->optional()->date(),
            'content' => fake()->paragraph(),
        ];
    }
}
