<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostType>
 */
class PostTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'tr' => fake()->words(2, true),
                'en' => fake()->words(2, true),
                'ar' => fake()->words(2, true),
            ],
            'description' => [
                'tr' => fake()->sentence(),
                'en' => fake()->sentence(),
                'ar' => fake()->sentence(),
            ],
        ];
    }
}
