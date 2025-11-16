<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            'title' => [
                'tr' => fake()->sentence(),
                'en' => fake()->sentence(),
                'ar' => fake()->sentence(),
            ],
            'content' => [
                'tr' => fake()->paragraphs(3, true),
                'en' => fake()->paragraphs(3, true),
                'ar' => fake()->paragraphs(3, true),
            ],
            'excerpt' => [
                'tr' => fake()->sentence(),
                'en' => fake()->sentence(),
                'ar' => fake()->sentence(),
            ],
            'slug' => [
                'tr' => fake()->slug(),
                'en' => fake()->slug(),
                'ar' => fake()->slug(),
            ],
            'post_type_id' => \App\Models\PostType::factory(),
            'category_id' => \App\Models\Category::factory(),
            'user_id' => \App\Models\User::factory(),
            'status' => fake()->randomElement(['draft', 'published', 'archived']),
            'is_published' => fake()->boolean(),
            'is_featured' => fake()->boolean(),
        ];
    }
}
